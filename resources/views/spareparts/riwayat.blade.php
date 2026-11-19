<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RIWAYAT STOK - MOONEYES SERVICES</title>
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
        .table-moon { border-color: var(--moon-black); margin-bottom: 0; }
        .table-moon thead th {
            background-color: var(--moon-yellow);
            color: var(--moon-black);
            font-family: 'Oswald', sans-serif;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-bottom: 3px solid var(--moon-black);
            border-color: var(--moon-black);
        }
        .table-moon tbody td { border-color: var(--moon-black); vertical-align: middle; }
        .table-moon tbody tr:hover { background-color: #FFF9D6; }
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

<div class="container py-4">

    @include('layouts.navbar')

    <!-- Header Judul -->
    <div class="moon-box mb-4" style="background-color: var(--moon-black); color: var(--moon-white);">
        <div class="p-4">
            <span class="badge bg-warning text-dark badge-moon mb-2">SPEED SHOP & GARAGE LOGBOOK</span>
            <h1 class="display-6 mb-0" style="color: var(--moon-yellow); text-shadow: 3px 3px 0px #000;">
                🧾 RIWAYAT ARUS STOK BENGKEL
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

    <!-- Filter Jenis Arus Stok -->
    <div class="moon-box p-3 mb-4 d-flex flex-wrap justify-content-between align-items-center gap-2">
        <span class="brand-font fs-5">FILTER ARUS BARANG:</span>
        <div class="d-flex flex-wrap gap-2">
            <a href="{{ route('spareparts.riwayat') }}" class="btn btn-sm {{ !$type ? 'btn-moon-black' : 'btn-moon-yellow' }}">SEMUA</a>
            <a href="{{ route('spareparts.riwayat', ['type' => 'IN']) }}" class="btn btn-sm {{ $type == 'IN' ? 'btn-moon-black' : 'btn-moon-yellow' }}">⬇ BARANG MASUK</a>
            <a href="{{ route('spareparts.riwayat', ['type' => 'OUT']) }}" class="btn btn-sm {{ $type == 'OUT' ? 'btn-moon-black' : 'btn-moon-yellow' }}">⬆ BARANG KELUAR</a>
        </div>
    </div>

    @php
        $pageTotal = $transactions->getCollection()->sum(function ($trx) {
            return $trx->details->sum(fn($item) => $item->qty * $item->price);
        });
    @endphp

    <!-- Tabel Riwayat Arus Stok -->
    <div class="moon-box mb-4">
        <div class="moon-header-bar">
            <span>📋 LOG KELUAR / MASUK SUKU CADANG</span>
            <div class="d-flex flex-wrap align-items-center gap-2">
                <span class="badge bg-success text-white badge-moon">
                    NILAI HALAMAN INI: Rp {{ number_format($pageTotal, 0, ',', '.') }}
                </span>
                <span class="badge bg-light text-dark badge-moon">TOTAL DATA: {{ $transactions->total() }}</span>
            </div>
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
                                <span class="badge badge-moon text-dark" style="background-color: var(--moon-yellow);">⬆ BARANG KELUAR</span>
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

</div>
</body>
</html>