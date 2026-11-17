<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MOONEYES SERVICES - Inventaris Bengkel Kustom</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts untuk nuansa Hot Rod / Vintage Garage -->
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
            /* Pola titik halus ala cetakan stiker vintage */
            background-image: radial-gradient(var(--moon-black) 1px, transparent 1px);
            background-size: 24px 24px;
            font-family: 'Space Grotesk', sans-serif;
            color: var(--moon-black);
        }

        h1, h2, h3, .brand-font {
            font-family: 'Oswald', sans-serif;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Gaya Kartu & Kontainer Brutalist / Hot Rod Decal */
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
        }

        /* Strip Garis Balap */
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

        /* Tombol Ikonik Mooneyes */
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
        }
        .btn-moon-danger:hover {
            background-color: var(--moon-black);
            color: var(--moon-red);
        }

        /* Input Form */
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

        /* Tabel Gaya Bengkel Kustom */
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

        /* Badge Gaya Stiker */
        .badge-moon {
            border: 2px solid var(--moon-black);
            font-family: 'Oswald', sans-serif;
            letter-spacing: 0.5px;
            padding: 5px 10px;
            font-size: 0.85rem;
        }

        /* Logo Mata Ikonik CSS */
        .eyeball-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--moon-yellow);
            border: 3px solid var(--moon-black);
            padding: 4px 12px;
            border-radius: 50px;
        }
        .eye {
            width: 22px;
            height: 22px;
            background: var(--moon-white);
            border: 3px solid var(--moon-black);
            border-radius: 50%;
            position: relative;
            display: inline-block;
        }
        .eye::after {
            content: '';
            width: 9px;
            height: 9px;
            background: var(--moon-black);
            border-radius: 50%;
            position: absolute;
            top: 3px;
            right: 2px;
        }
    </style>
</head>
<body>

<div class="container py-4">

    <!-- Top Bar User & Logout -->
    <div class="moon-box p-3 mb-4 d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div class="d-flex align-items-center gap-2">
            <div class="eyeball-badge">
                <span class="eye"></span>
                <span class="eye"></span>
            </div>
            <div>
                <span class="fw-bold">MECHANIC ON DUTY:</span>
                <span class="badge bg-dark text-warning fs-6 ms-1">{{ Auth::user()->name }}</span>
                <small class="text-muted d-none d-md-inline ms-2">({{ Auth::user()->email }})</small>
            </div>
        </div>
        <form action="{{ route('logout') }}" method="POST" class="mb-0">
            @csrf
            <button type="submit" class="btn btn-moon-danger btn-sm px-3">LOGOUT ✖</button>
        </form>
    </div>

    <!-- Main Title & Action Buttons -->
    <div class="moon-box mb-4" style="background-color: var(--moon-black); color: var(--moon-white);">
        <div class="p-4 d-flex flex-wrap justify-content-between align-items-center gap-3">
            <div>
                <span class="badge bg-warning text-dark badge-moon mb-2">SPEED SHOP & GARAGE INVENTORY</span>
                <h1 class="display-6 mb-0" style="color: var(--moon-yellow); text-shadow: 3px 3px 0px #000;">
                    🏁 MOONEYES SERVICES — INVENTARIS BENGKEL
                </h1>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('spareparts.create') }}" class="btn btn-moon-yellow btn-lg px-4">+ TAMBAH SPAREPART</a>
                <a href="{{ route('spareparts.transaksi.form') }}" class="btn btn-light border-3 border-dark fw-bold btn-lg px-4 brand-font" style="box-shadow: 4px 4px 0px var(--moon-yellow);">
                    ⚡ CATAT TRANSAKSI
                </a>
            </div>
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

    <!-- Form Pencarian Sparepart -->
    <div class="moon-box p-3 mb-4">
        <form action="{{ route('spareparts.index') }}" method="GET" class="row g-2 align-items-center">
            <div class="col-md-9">
                <input type="text" name="search" class="form-control form-control-lg moon-input" placeholder="🔍 Cari kode atau nama suku cadang (Contoh: Busi, Kampas, Oli)..." value="{{ request('search') }}">
            </div>
            <div class="col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-moon-black btn-lg flex-fill">CARI PART</button>
                @if(request('search'))
                    <a href="{{ route('spareparts.index') }}" class="btn btn-outline-dark border-3 fw-bold btn-lg brand-font">RESET</a>
                @endif
            </div>
        </form>
    </div>

    <!-- Tabel Stok -->
    <div class="moon-box mb-5">
        <div class="moon-header-bar">
            <span>⚙️ DAFTAR STOK SUKU CADANG</span>
            <span class="badge bg-warning text-dark badge-moon">TOTAL ITEM: {{ $spareparts->count() }}</span>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-moon">
                <thead>
                    <tr>
                        <th>Kode Part</th>
                        <th>Nama Sparepart</th>
                        <th>Kategori</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Sisa Stok</th>
                        <th>Status Gudang</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($spareparts as $item)
                    <tr>
                        <td><span class="badge bg-dark text-warning fs-6">{{ $item->code }}</span></td>
                        <td class="fw-bold fs-6">{{ $item->name }}</td>
                        <td><span class="badge bg-light text-dark border border-dark">{{ $item->category->name ?? '-' }}</span></td>
                        <td>Rp {{ number_format($item->buy_price, 0, ',', '.') }}</td>
                        <td class="fw-bold">Rp {{ number_format($item->sell_price, 0, ',', '.') }}</td>
                        <td><span class="fs-5 fw-bold">{{ $item->stock }}</span> <small class="text-muted fw-bold">PCS</small></td>
                        <td>
                            @if($item->stock <= $item->min_stock)
                                <span class="badge badge-moon text-white" style="background-color: var(--moon-red);">
                                    ⚠️ STOK MENIPIS (MIN: {{ $item->min_stock }})
                                </span>
                            @else
                                <span class="badge badge-moon bg-success text-white">
                                    ✔ AMAN
                                </span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center fw-bold py-4 text-muted">TIDAK ADA DATA SPAREPART YANG DITEMUKAN DI RAK.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tabel Riwayat Transaksi -->
    <div class="moon-box">
        <div class="moon-header-bar">
            <span>🧾 10 RIWAYAT TRANSAKSI TERAKHIR</span>
            <span class="badge bg-light text-dark badge-moon">LOG AKTIVITAS</span>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-moon">
                <thead>
                    <tr>
                        <th>Waktu</th>
                        <th>Rincian Barang, Qty & Harga</th>
                        <th>Jenis</th>
                        <th>Total Biaya / Pendapatan</th>
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
                                <span class="badge badge-moon bg-primary text-white">⬇ MASUK (RESTOCK)</span>
                            @else
                                <span class="badge badge-moon text-dark" style="background-color: var(--moon-yellow);">⬆ KELUAR (JUAL)</span>
                            @endif
                        </td>
                        <td>
                            @php
                                $grandTotal = $trx->details->sum(function($item) {
                                    return $item->qty * $item->price;
                                });
                            @endphp
                            <span class="fs-6 fw-bold px-2 py-1 rounded" style="background-color: #E8F5E9; border: 2px solid var(--moon-black); color: #1B5E20;">
                                Rp {{ number_format($grandTotal, 0, ',', '.') }}
                            </span>
                        </td>
                        <td class="fst-italic">{{ $trx->note ?: '-' }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center fw-bold py-4 text-muted">BELUM ADA RIWAYAT TRANSAKSI.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
</body>
</html>