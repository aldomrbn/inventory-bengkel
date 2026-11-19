<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAMBAH SPAREPART - MOONEYES SERVICES</title>
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
            padding: 15px 20px;
            font-size: 1.5rem;
            letter-spacing: 1.5px;
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
    </style>
</head>
<body>

<div class="container py-4" style="max-width: 820px;">

    @include('layouts.navbar')

    <div class="mb-3">
        <a href="{{ route('spareparts.index') }}" class="btn btn-dark border-3 fw-bold brand-font" style="box-shadow: 3px 3px 0px var(--moon-black);">← KEMBALI KE DAFTAR STOK</a>
    </div>

    <div class="moon-box">
        <div class="moon-header-bar">
            ⚙️ TAMBAH SUKU CADANG BARU
        </div>
        <div class="card-body p-4">
            <form action="{{ route('spareparts.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-bold">Kode Sparepart</label>
                    <input type="text" name="code" class="form-control moon-input" placeholder="Contoh: PART-001" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Nama Sparepart</label>
                    <input type="text" name="name" class="form-control moon-input" placeholder="Contoh: Kampas Rem Depan" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Kategori</label>
                    <select name="category_id" class="form-select moon-input" required>
                        <option value="">-- PILIH KATEGORI --</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Harga Beli (Rp)</label>
                        <input type="number" name="buy_price" class="form-control moon-input" placeholder="0" min="0" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Harga Jual (Rp)</label>
                        <input type="number" name="sell_price" class="form-control moon-input" placeholder="0" min="0" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Stok Awal (Pcs)</label>
                        <input type="number" name="stock" class="form-control moon-input" placeholder="0" min="0" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Batas Stok Menipis (Min. Stok)</label>
                        <input type="number" name="min_stock" class="form-control moon-input" value="5" min="0" required>
                    </div>
                </div>

                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-moon-black btn-lg py-3">SIMPAN SPAREPART BARU 🚀</button>
                </div>
            </form>
        </div>
    </div>

</div>

</body>
</html>