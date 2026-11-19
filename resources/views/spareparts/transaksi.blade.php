<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRANSAKSI STOK - MOONEYES SERVICES</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600;700&family=Space+Grotesk:wght@500;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --moon-yellow: #FFD200;
            --moon-black: #111111;
            --moon-white: #FFFFFF;
            --moon-red: #E62E2D;
            --moon-gray: #F4F1EA;
        }

        body {
            background-color: var(--moon-yellow);
            background-image: radial-gradient(var(--moon-black) 1px, transparent 1px);
            background-size: 24px 24px;
            font-family: 'Space Grotesk', sans-serif;
            color: var(--moon-black);
        }

        h1, h2, h3, label, .brand-font {
            font-family: 'Oswald', sans-serif;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .moon-box {
            background-color: var(--moon-white);
            border: 4px solid var(--moon-black);
            border-radius: 12px;
            box-shadow: 7px 7px 0px var(--moon-black);
            overflow: hidden;
        }

        .moon-header-bar {
            background-color: var(--moon-black);
            color: var(--moon-yellow);
            border-bottom: 4px solid var(--moon-black);
            padding: 12px 20px;
            font-family: 'Oswald', sans-serif;
            font-size: 1.25rem;
            letter-spacing: 1.5px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 8px;
        }

        .checker-strip {
            height: 10px;
            background-image: repeating-linear-gradient(
                90deg,
                var(--moon-black) 0px,
                var(--moon-black) 16px,
                var(--moon-yellow) 16px,
                var(--moon-yellow) 32px
            );
            border-top: 3px solid var(--moon-black);
        }

        .btn-moon-black {
            background-color: var(--moon-black);
            color: var(--moon-yellow);
            border: 3px solid var(--moon-black);
            font-family: 'Oswald', sans-serif;
            letter-spacing: 1px;
            text-transform: uppercase;
            box-shadow: 4px 4px 0px rgba(0,0,0,0.3);
            transition: all 0.15s ease;
        }
        .btn-moon-black:hover {
            background-color: var(--moon-white);
            color: var(--moon-black);
            transform: translate(-2px, -2px);
            box-shadow: 6px 6px 0px var(--moon-black);
        }

        .btn-moon-yellow {
            background-color: var(--moon-yellow);
            color: var(--moon-black);
            border: 3px solid var(--moon-black);
            font-family: 'Oswald', sans-serif;
            letter-spacing: 1px;
            text-transform: uppercase;
            box-shadow: 4px 4px 0px var(--moon-black);
            transition: all 0.15s ease;
        }
        .btn-moon-yellow:hover {
            background-color: var(--moon-black);
            color: var(--moon-yellow);
            transform: translate(-2px, -2px);
            box-shadow: 6px 6px 0px var(--moon-black);
        }

        .btn-moon-danger {
            background-color: var(--moon-red);
            color: var(--moon-white);
            border: 2px solid var(--moon-black);
            font-family: 'Oswald', sans-serif;
            text-transform: uppercase;
            transition: all 0.15s ease;
        }
        .btn-moon-danger:hover {
            background-color: var(--moon-black);
            color: var(--moon-red);
        }

        .moon-input {
            border: 3px solid var(--moon-black) !important;
            border-radius: 8px;
            font-weight: 700;
            background-color: var(--moon-gray);
        }
        .moon-input:focus {
            background-color: var(--moon-white);
            box-shadow: 4px 4px 0px var(--moon-black) !important;
        }

        .table-moon {
            border-color: var(--moon-black);
            margin-bottom: 0;
        }
        .table-moon thead th {
            background-color: var(--moon-yellow);
            color: var(--moon-black);
            font-family: 'Oswald', sans-serif;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-bottom: 3px solid var(--moon-black);
            border-color: var(--moon-black);
        }
        .table-moon tbody td {
            border-color: var(--moon-black);
            vertical-align: middle;
        }
        .table-moon tbody tr:hover {
            background-color: #FFF9D6;
        }

        .badge-moon {
            border: 2px solid var(--moon-black);
            font-family: 'Oswald', sans-serif;
            letter-spacing: 0.5px;
            padding: 5px 10px;
            font-size: 0.85rem;
        }
    </style>
</head>
<body>

@php
    $openHistoryTab = request()->has('type') || request()->has('page');
@endphp

<div class="container py-4">

    @include('layouts.navbar')

    <!-- Header Judul -->
    <div class="moon-box mb-4" style="background-color: var(--moon-black); color: var(--moon-white);">
        <div class="p-4">
            <span class="badge bg-warning text-dark badge-moon mb-2">SPEED SHOP & GARAGE STOCK FLOW</span>
            <h1 class="display-6 mb-0" style="color: var(--moon-yellow); text-shadow: 3px 3px 0px #000;">
                ⚡ TRANSAKSI ARUS STOK BENGKEL
            </h1>
        </div>
        <div class="checker-strip"></div>
    </div>

    <!-- Alert Notifications -->
    @if(session('success'))
        <div class="moon-box p-3 mb-4 fw-bold" style="background-color: #D4EDDA; border-color: var(--moon-black);">
            ✅ {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="moon-box p-3 mb-4 fw-bold text-white" style="background-color: var(--moon-red); border-color: var(--moon-black);">
            ⚠️ {{ session('error') }}
        </div>
    @endif

    <!-- Switcher Tab Form vs Riwayat -->
    <div class="moon-box p-3 mb-4 d-flex flex-wrap justify-content-between align-items-center gap-2">
        <span class="brand-font fs-5">PILIH TAMPILAN:</span>
        <div class="d-flex flex-wrap gap-2">
            <button type="button" id="tab-btn-form" class="btn {{ !$openHistoryTab ? 'btn-moon-black' : 'btn-moon-yellow' }}">
                ⚡ FORM ARUS STOK
            </button>
            <button type="button" id="tab-btn-history" class="btn {{ $openHistoryTab ? 'btn-moon-black' : 'btn-moon-yellow' }}">
                🧾 RIWAYAT ARUS STOK
            </button>
        </div>
    </div>

    <!-- PANEL 1: FORM PENCATATAN ARUS STOK -->
    <div id="panel-form" @class(['d-none' => $openHistoryTab])>
        <div class="moon-box mb-4">
            <div class="moon-header-bar">
                <span>⚡ FORM CATAT ARUS STOK MULTI-ITEM</span>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('spareparts.transaksi.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="form-label fw-bold fs-5">Jenis Arus Stok</label>
                        <select name="type" class="form-select moon-input py-2" required>
                            <option value="IN">⬇ BARANG MASUK (Restock Gudang)</option>
                            <option value="OUT">⬆ BARANG KELUAR (Pengeluaran / Pemakaian Stok)</option>
                        </select>
                    </div>

                    <hr class="border-2 border-dark mb-4">

                    <label class="form-label fw-bold fs-5 mb-2">Daftar Suku Cadang</label>

                    <div id="item-container">
                        <!-- Baris Item Pertama -->
                        <div class="row item-row g-2 align-items-center mb-3">
                            <div class="col-md-7">
                                <select name="spareparts[]" class="form-select moon-input" required>
                                    <option value="">-- PILIH SPAREPART --</option>
                                    @foreach($spareparts as $item)
                                        <option value="{{ $item->id }}">{{ $item->code }} - {{ $item->name }} (Stok: {{ $item->stock }})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="number" name="qtys[]" class="form-control moon-input" placeholder="Jumlah Qty" min="1" required>
                            </div>
                            <div class="col-md-1">
                                <!-- Tombol hapus baris dikosongkan untuk baris pertama -->
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <button type="button" id="add-item-btn" class="btn btn-moon-yellow fw-bold px-3 py-2">
                            + TAMBAH ITEM LAGI
                        </button>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Catatan Stok (Opsional)</label>
                        <textarea name="note" class="form-control moon-input" rows="2" placeholder="Catatan tambahan (misal: Restock supplier, No. surat jalan)..."></textarea>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-moon-black btn-lg py-3">SIMPAN TRANSAKSI STOK 🏁</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- PANEL 2: RIWAYAT ARUS STOK -->
    <div id="panel-history" @class(['d-none' => !$openHistoryTab])>
        @if(isset($transactions))
            <!-- Filter Jenis Arus Stok -->
            <div class="moon-box p-3 mb-4 d-flex flex-wrap justify-content-between align-items-center gap-2">
                <span class="brand-font fs-5">FILTER RIWAYAT ARUS BARANG:</span>
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('spareparts.transaksi.form') }}" class="btn btn-sm @if(empty($type)) btn-moon-black @else btn-moon-yellow @endif">SEMUA</a>
                    <a href="{{ route('spareparts.transaksi.form', ['type' => 'IN']) }}" class="btn btn-sm @if(($type ?? '') == 'IN') btn-moon-black @else btn-moon-yellow @endif">⬇ BARANG MASUK</a>
                    <a href="{{ route('spareparts.transaksi.form', ['type' => 'OUT']) }}" class="btn btn-sm @if(($type ?? '') == 'OUT') btn-moon-black @else btn-moon-yellow @endif">⬆ BARANG KELUAR</a>
                </div>
            </div>

            <!-- Tabel Riwayat Arus Stok -->
            <div class="moon-box mb-4">
                <div class="moon-header-bar">
                    <span>🧾 RIWAYAT ARUS STOK BENGKEL</span>
                    <span class="badge bg-light text-dark badge-moon">TOTAL DATA: {{ $transactions->total() }}</span>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-moon">
                        <thead>
                            <tr>
                                <th>Waktu</th>
                                <th>Rincian Barang, Qty & Harga</th>
                                <th>Jenis Arus</th>
                                <th>Nilai Stok</th>
                                <th>Catatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($transactions as $trx)
                            <tr>
                                <td class="fw-bold" style="white-space: nowrap;">{{ $trx->created_at->format('d M Y, H:i') }}</td>
                                <td>
                                    <ul class="list-unstyled mb-0">
                                        @foreach($trx->details as $detail)
                                            <li class="mb-1">
                                                <span class="badge bg-dark text-warning">{{ $detail->sparepart->code ?? '-' }}</span>
                                                <strong>{{ $detail->sparepart->name ?? 'Barang Dihapus' }}</strong>
                                                <span class="text-muted">({{ $detail->qty }} pcs × Rp {{ number_format($detail->price, 0, ',', '.') }})</span>
                                                = <span class="fw-bold">Rp {{ number_format($detail->qty * $detail->price, 0, ',', '.') }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    @if($trx->type == 'IN')
                                        <span class="badge badge-moon bg-primary text-white">⬇ BARANG MASUK</span>
                                    @else
                                        <span class="badge badge-moon bg-warning text-dark">⬆ BARANG KELUAR</span>
                                    @endif
                                </td>
                                <td>
                                    @php
                                        $grandTotal = $trx->details->sum(fn($item) => $item->qty * $item->price);
                                    @endphp
                                    <span class="fs-6 fw-bold px-2 py-1 rounded" style="background-color: #E8F5E9; border: 2px solid var(--moon-black); color: #1B5E20;">
                                        Rp {{ number_format($grandTotal, 0, ',', '.') }}
                                    </span>
                                </td>
                                <td class="fst-italic">{{ $trx->note ?: '-' }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center fw-bold py-4 text-muted">BELUM ADA RIWAYAT ARUS STOK.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $transactions->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>

</div>

<script>
    // Switcher Tab Form & Riwayat
    const btnForm = document.getElementById('tab-btn-form');
    const btnHistory = document.getElementById('tab-btn-history');
    const panelForm = document.getElementById('panel-form');
    const panelHistory = document.getElementById('panel-history');

    function showTab(tab) {
        if (tab === 'history') {
            panelForm.classList.add('d-none');
            panelHistory.classList.remove('d-none');
            btnHistory.classList.remove('btn-moon-yellow');
            btnHistory.classList.add('btn-moon-black');
            btnForm.classList.remove('btn-moon-black');
            btnForm.classList.add('btn-moon-yellow');
        } else {
            panelHistory.classList.add('d-none');
            panelForm.classList.remove('d-none');
            btnForm.classList.remove('btn-moon-yellow');
            btnForm.classList.add('btn-moon-black');
            btnHistory.classList.remove('btn-moon-black');
            btnHistory.classList.add('btn-moon-yellow');
        }
    }

    btnForm.addEventListener('click', () => showTab('form'));
    btnHistory.addEventListener('click', () => showTab('history'));

    // Tambah Baris Item Secara Dinamis
    document.getElementById('add-item-btn').addEventListener('click', function() {
        let container = document.getElementById('item-container');
        let firstRow = container.querySelector('.item-row');
        let newRow = firstRow.cloneNode(true);

        newRow.querySelector('select').value = '';
        newRow.querySelector('input').value = '';

        let deleteCol = newRow.querySelector('.col-md-1');
        deleteCol.innerHTML = '<button type="button" class="btn btn-danger border-2 border-dark remove-btn fw-bold">✖</button>';

        newRow.querySelector('.remove-btn').addEventListener('click', function() {
            newRow.remove();
        });

        container.appendChild(newRow);
    });
</script>

</body>
</html>