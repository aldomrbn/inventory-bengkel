<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RIWAYAT HARIAN - MOONEYES SERVICES</title>
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
            font-size: 1.2rem;
            letter-spacing: 1.5px;
        }
        .moon-input {
            border: 3px solid var(--moon-black) !important;
            border-radius: 8px;
            font-weight: 700;
            background-color: var(--moon-gray);
        }
    </style>
</head>
<body>
<div class="container py-4" style="max-width: 1150px;">

    @include('layouts.navbar')

    {{-- Header & Filter Tanggal --}}
    <div class="moon-box mb-4 p-4" style="background-color: var(--moon-black); color: var(--moon-white);">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
            <div>
                <span class="badge mb-2 px-3 py-1 fw-bold" style="background-color: var(--moon-yellow); color: var(--moon-black);">
                    LOG OPERASIONAL HARIAN
                </span>
                <h1 class="m-0" style="color: var(--moon-yellow);">📋 RIWAYAT TRANSAKSI HARIAN</h1>
            </div>

            <form action="{{ route('spareparts.riwayat') }}" method="GET" class="d-flex flex-wrap align-items-center gap-2">
                <input type="date" name="tanggal" value="{{ $tanggal }}" class="form-control moon-input" style="width: auto;">
                <button type="submit" class="btn fw-bold px-3 py-2"
                        style="background-color: var(--moon-yellow); color: var(--moon-black); border: 2px solid #FFFFFF; font-family: 'Oswald', sans-serif;">
                    🔍 TAMPILKAN
                </button>
                <a href="{{ route('spareparts.riwayat') }}" class="btn btn-outline-light fw-bold px-3 py-2"
                   style="font-family: 'Oswald', sans-serif;">
                    HARI INI
                </a>
            </form>
        </div>
    </div>

    {{-- 3 Kartu Ringkasan Harian --}}
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="moon-box p-3 h-100">
                <div class="small fw-bold text-muted">TOTAL TRANSAKSI ({{ \Carbon\Carbon::parse($tanggal)->format('d M Y') }})</div>
                <div class="fs-2 brand-font mt-1">{{ $transactions->count() }} TRANSAKSI</div>
                <div class="small fw-bold text-dark">
                    {{ $jumlahItemLog }} item • Masuk: {{ $totalMasuk }} pcs • Keluar: {{ $totalKeluar }} pcs
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="moon-box p-3 h-100" style="background-color: #E8F8EE;">
                <div class="small fw-bold text-success">TOTAL PENJUALAN KELUAR (OUT)</div>
                <div class="fs-2 brand-font text-success mt-1">Rp {{ number_format($omzetHarian, 0, ',', '.') }}</div>
                <div class="small fw-bold">Dari {{ $totalKeluar }} unit sparepart keluar</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="moon-box p-3 h-100" style="background-color: #FFF4E5;">
                <div class="small fw-bold text-danger">TOTAL STOK MASUK (IN)</div>
                <div class="fs-2 brand-font text-danger mt-1">Rp {{ number_format($modalMasuk, 0, ',', '.') }}</div>
                <div class="small fw-bold">Dari {{ $totalMasuk }} unit sparepart masuk</div>
            </div>
        </div>
    </div>

    {{-- Tabel Log Riwayat --}}
    <div class="moon-box">
        <div class="moon-header-bar d-flex justify-content-between align-items-center">
            <span>🕒 RINCIAN KELUAR-MASUK PART ({{ \Carbon\Carbon::parse($tanggal)->format('d/m/Y') }})</span>
            <span class="badge bg-warning text-dark">{{ $jumlahItemLog }} ITEM</span>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered align-middle mb-0" style="border-color: #111111;">
                <thead style="background-color: var(--moon-yellow); font-family: 'Oswald', sans-serif;">
                    <tr>
                        <th>JAM</th>
                        <th>KODE PART</th>
                        <th>NAMA SPAREPART</th>
                        <th>JENIS</th>
                        <th>QTY</th>
                        <th>HARGA SATUAN</th>
                        <th>SUBTOTAL</th>
                        <th>CATATAN</th>
                        <th>ADMIN</th>
                    </tr>
                </thead>
                <tbody class="fw-bold">
                    @php $adaBaris = false; @endphp
                    @foreach($transactions as $trx)
                        @php
                            $isMasuk = strtoupper((string) $trx->type) === 'IN';
                            $adminName = $usersById[$trx->user_id] ?? 'Admin Bengkel';
                        @endphp
                        @foreach($trx->details as $detail)
                            @php
                                $adaBaris = true;
                                $qty = (int) ($detail->qty ?? 0);
                                $fallbackPrice = $isMasuk
                                    ? ($detail->sparepart->buy_price ?? 0)
                                    : ($detail->sparepart->sell_price ?? 0);
                                $harga = (int) ($detail->price ?? $fallbackPrice);
                            @endphp
                            <tr>
                                <td>{{ $trx->created_at->format('H:i') }} WIB</td>
                                <td>
                                    <span class="badge bg-dark text-warning px-2 py-1">
                                        {{ $detail->sparepart->code ?? '-' }}
                                    </span>
                                </td>
                                <td>{{ $detail->sparepart->name ?? 'Part Dihapus' }}</td>
                                <td>
                                    @if($isMasuk)
                                        <span class="badge text-bg-primary border border-dark">📥 MASUK (IN)</span>
                                    @else
                                        <span class="badge text-bg-danger border border-dark">📤 KELUAR (OUT)</span>
                                    @endif
                                </td>
                                <td>{{ $qty }} PCS</td>
                                <td>Rp {{ number_format($harga, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($qty * $harga, 0, ',', '.') }}</td>
                                <td class="text-muted small">{{ $trx->note ?? '-' }}</td>
                                <td>{{ $adminName }}</td>
                            </tr>
                        @endforeach
                    @endforeach

                    @unless($adaBaris)
                        <tr>
                            <td colspan="9" class="text-center py-4 text-muted">
                                Belum ada transaksi keluar/masuk suku cadang pada tanggal ini.
                            </td>
                        </tr>
                    @endunless
                </tbody>
            </table>
        </div>
    </div>

</div>
</body>
</html>