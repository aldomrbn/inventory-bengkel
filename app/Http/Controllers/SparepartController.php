<?php

namespace App\Http\Controllers;

use App\Models\Sparepart;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SparepartController extends Controller
{
    // Menampilkan halaman utama (stok & riwayat transaksi dengan fitur pencarian)
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Ambil data sparepart dengan filter pencarian berdasarkan nama atau kode
        $spareparts = Sparepart::with('category')
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                             ->orWhere('code', 'like', "%{$search}%");
            })
            ->latest()
            ->get();

        // Ambil 10 riwayat transaksi terakhir beserta detail barangnya
        $transactions = Transaction::with('details.sparepart')->latest()->take(10)->get();
        
        return view('spareparts.index', compact('spareparts', 'transactions', 'search'));
    }

    // Form tambah barang
    public function create()
    {
        $categories = Category::all();
        return view('spareparts.create', compact('categories'));
    }

    // Simpan barang baru ke database
    public function store(Request $request)
    {
        Sparepart::create($request->all());
        return redirect()->route('spareparts.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    // Form transaksi masuk/keluar
    public function transactionForm()
    {
        $spareparts = Sparepart::all();
        return view('spareparts.transaksi', compact('spareparts'));
    }

    // Proses simpan transaksi multi-item & rincian harga serta update stok otomatis
    public function storeTransaction(Request $request)
    {
        DB::beginTransaction();
        try {
            // 1. Simpan Header Transaksi Utama
            $transaction = Transaction::create([
                'type' => $request->type,
                'note' => $request->note,
            ]);

            // Validasi jika tidak ada sparepart yang dipilih
            if (!$request->has('spareparts') || empty($request->spareparts)) {
                throw new \Exception("Pilih minimal satu sparepart untuk melakukan transaksi.");
            }

            // 2. Looping setiap baris barang yang dipilih
            foreach ($request->spareparts as $index => $sparepartId) {
                $qty = $request->qtys[$index];
                $sparepart = Sparepart::findOrFail($sparepartId);

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
            return redirect()->route('spareparts.index')->with('success', 'Transaksi multi-item & rincian harga berhasil disimpan!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}