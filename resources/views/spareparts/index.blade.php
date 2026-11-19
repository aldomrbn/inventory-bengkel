<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MOONEYES SERVICES - Inventaris Bengkel Kustom</title>
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

        h1, h2, h3, .brand-font {
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
    $minStock = 5;
@endphp

<div class="container py-4">

    @include('layouts.navbar')

    <!-- Header Judul & Tombol Tambah Sparepart -->
    <div class="moon-box mb-4" style="background-color: var(--moon-black); color: var(--moon-white);">
        <div class="p-4 d-flex flex-wrap justify-content-between align-items-center gap-3">
            <div>
                <span class="badge bg-warning text-dark badge-moon mb-2">SPEED SHOP & GARAGE INVENTORY</span>
                <h1 class="display-6 mb-0" style="color: var(--moon-yellow); text-shadow: 3px 3px 0px #000;">
                    🏁 DAFTAR STOK SUKU CADANG BENGKEL
                </h1>
            </div>
            <div>
                <a href="{{ route('spareparts.create') }}" class="btn btn-moon-yellow btn-lg px-4">
                    + TAMBAH SPAREPART
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
    <div class="moon-box mb-4">
        <div class="moon-header-bar">
            <span>⚙️ STOK TERSEDIA DI RAK</span>
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
                    <tr @class(['table-danger' => $item->stock <= 0])>
                        <td><span class="badge bg-dark text-warning fs-6">{{ $item->code }}</span></td>
                        <td class="fw-bold fs-6">{{ $item->name }}</td>
                        <td><span class="badge bg-light text-dark border border-dark">{{ $item->category->name ?? '-' }}</span></td>
                        <td>Rp {{ number_format($item->buy_price, 0, ',', '.') }}</td>
                        <td class="fw-bold">Rp {{ number_format($item->sell_price, 0, ',', '.') }}</td>
                        <td>
                            <span @class(['fs-5 fw-bold', 'text-danger' => $item->stock <= 0])>{{ $item->stock }}</span>
                            <small class="text-muted fw-bold">PCS</small>
                        </td>
                        <td>
                            @if($item->stock <= 0)
                                <span class="badge badge-moon bg-danger text-white">
                                    🚫 STOK HABIS
                                </span>
                            @elseif($item->stock <= $minStock)
                                <span class="badge badge-moon bg-warning text-dark">
                                    ⚠️ STOK MENIPIS (MIN: {{ $minStock }})
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

</div>
</body>
</html>