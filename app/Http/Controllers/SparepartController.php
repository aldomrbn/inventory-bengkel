<?php

namespace App\Http\Controllers;

use App\Models\Sparepart;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SparepartController extends Controller
{
    private function currentUser()
    {
        return Auth::user();
    }

    private function currentWorkshopId(): ?int
    {
        return $this->currentUser()?->workshop_id;
    }

    private function applyWorkshopScope(Builder $query, ?int $workshopId): Builder
    {
        if (!is_null($workshopId)) {
            return $query->where('workshop_id', $workshopId);
        }

        return $query;
    }

    // Menampilkan halaman utama (fokus daftar stok & fitur pencarian per bengkel)
    public function index(Request $request)
    {
        $search = $request->input('search');
        $workshopId = $this->currentWorkshopId();

        $spareparts = $this->applyWorkshopScope(Sparepart::with('category'), $workshopId)
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('code', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->get();

        return view('spareparts.index', compact('spareparts', 'search'));
    }

    // Form tambah barang sesuai kategori bengkel aktif
    public function create()
    {
        $workshopId = $this->currentWorkshopId();
        $categories = $this->applyWorkshopScope(Category::query(), $workshopId)->get();

        return view('spareparts.create', compact('categories'));
    }

    // Simpan barang baru ke database sesuai bengkel admin yang login
    public function store(Request $request)
    {
        $workshopId = $this->currentWorkshopId();

        $data = $request->all();
        if (!is_null($workshopId)) {
            $data['workshop_id'] = $workshopId;
        }

        Sparepart::create($data);

        return redirect()->route('spareparts.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    // Form transaksi masuk/keluar + riwayat arus stok & rekap item/pcs per bengkel
    public function transactionForm(Request $request)
    {
        $workshopId = $this->currentWorkshopId();
        $spareparts = $this->applyWorkshopScope(Sparepart::query(), $workshopId)->get();
        $type = $request->input('type');
        $tanggal = $request->input('tanggal');

        $baseQuery = $this->applyWorkshopScope(
            Transaction::with(['details.sparepart', 'user']),
            $workshopId
        )
            ->when($type, function ($query, $type) {
                return $query->where('type', strtoupper($type));
            })
            ->when($tanggal, function ($query, $tanggal) {
                return $query->whereDate('created_at', $tanggal);
            });

        $rekapTransactions = (clone $baseQuery)->get();

        $userIds = $rekapTransactions->pluck('user_id')->filter()->unique();
        $usersById = $userIds->isNotEmpty()
            ? User::whereIn('id', $userIds)->pluck('name', 'id')
            : collect();

        $totalMasukPcs    = 0;
        $totalKeluarPcs   = 0;
        $jumlahItemMasuk  = 0;
        $jumlahItemKeluar = 0;
        $jumlahItemLog    = 0;
        $totalSemuaPcs    = 0;

        foreach ($rekapTransactions as $trx) {
            $isMasuk = strtoupper((string) $trx->type) === 'IN';

            foreach ($trx->details as $detail) {
                $qty = (int) ($detail->qty ?? 0);
                $jumlahItemLog++;
                $totalSemuaPcs += $qty;

                if ($isMasuk) {
                    $totalMasukPcs += $qty;
                    $jumlahItemMasuk++;
                } else {
                    $totalKeluarPcs += $qty;
                    $jumlahItemKeluar++;
                }
            }
        }

        $transactions = $baseQuery
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('spareparts.transaksi', compact(
            'spareparts',
            'transactions',
            'usersById',
            'type',
            'tanggal',
            'totalMasukPcs',
            'totalKeluarPcs',
            'jumlahItemMasuk',
            'jumlahItemKeluar',
            'jumlahItemLog',
            'totalSemuaPcs'
        ));
    }

    // Proses simpan transaksi multi-item & rincian harga serta update stok otomatis
    public function storeTransaction(Request $request)
    {
        $workshopId = $this->currentWorkshopId();
        $user = $this->currentUser();

        DB::beginTransaction();
        try {
            $transactionData = [
                'type' => $request->type,
                'note' => $request->note,
            ];

            if (!is_null($workshopId)) {
                $transactionData['workshop_id'] = $workshopId;
            }

            if ($user) {
                $transactionData['user_id'] = $user->id;
            }

            // 1. Simpan Header Transaksi Utama
            $transaction = Transaction::create($transactionData);

            // Validasi jika tidak ada sparepart yang dipilih
            if (!$request->has('spareparts') || empty($request->spareparts)) {
                throw new \Exception("Pilih minimal satu sparepart untuk melakukan transaksi.");
            }

            // 2. Looping setiap baris barang yang dipilih
            foreach ($request->spareparts as $index => $sparepartId) {
                $qty = $request->qtys[$index];

                $sparepartQuery = $this->applyWorkshopScope(Sparepart::query(), $workshopId);
                $sparepart = $sparepartQuery->findOrFail($sparepartId);

                // Cek jika barang keluar tapi stok kurang
                if ($request->type === 'OUT' && $sparepart->stock < $qty) {
                    throw new \Exception("Stok untuk sparepart {$sparepart->name} tidak mencukupi (Sisa: {$sparepart->stock})!");
                }

                // Tentukan harga: Jika Masuk pakai harga beli, jika Keluar pakai harga jual
                $price = ($request->type === 'IN') ? $sparepart->buy_price : $sparepart->sell_price;

                // Simpan ke tabel detail transaksi beserta harganya
                TransactionDetail::create([
                    'transaction_id' => $transaction->id,
                    'sparepart_id' => $sparepartId,
                    'qty' => $qty,
                    'price' => $price,
                ]);

                // Update stok secara otomatis (tambah/kurang)
                if ($request->type === 'IN') {
                    $sparepart->increment('stock', $qty);
                } else {
                    $sparepart->decrement('stock', $qty);
                }
            }

            DB::commit();
            return redirect()->route('spareparts.transaksi.form')->with('success', 'Transaksi arus stok berhasil disimpan!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}