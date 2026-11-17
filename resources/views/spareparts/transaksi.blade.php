<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MOONEYES STYLE - Catat Transaksi</title>
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
            box-shadow: 3px 3px 0px var(--moon-black);
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

<div class="container py-5" style="max-width: 850px;">
    
    <div class="mb-3">
        <a href="{{ route('spareparts.index') }}" class="btn btn-dark border-3 fw-bold brand-font" style="box-shadow: 3px 3px 0px var(--moon-black);">← KEMBALI KE GARASI</a>
    </div>

    <div class="moon-box">
        <div class="moon-header-bar">
            ⚡ CATAT TRANSAKSI MULTI-ITEM
        </div>
        <div class="card-body p-4">
            
            @if(session('error'))
                <div class="alert alert-danger border-3 border-dark fw-bold mb-4" style="background-color: var(--moon-red); color: white;">
                    ⚠️ {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('spareparts.transaksi.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="form-label fw-bold fs-5">Jenis Transaksi</label>
                    <select name="type" class="form-select moon-input py-2" required>
                        <option value="IN">⬇ MASUK (Restock Gudang / Pembelian)</option>
                        <option value="OUT">⬆ KELUAR (Penjualan / Servis Bengkel)</option>
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
                    <label class="form-label fw-bold">Catatan Transaksi (Opsional)</label>
                    <textarea name="note" class="form-control moon-input" rows="2" placeholder="Catatan tambahan (misal: Nota #002, Pelanggan Pak Budi)..."></textarea>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-moon-black btn-lg py-3">PROSES TRANSAKSI SEKARANG 🏁</button>
                </div>
            </form>
        </div>
    </div>

</div>

<!-- Skrip JavaScript untuk Menambah Baris Item Secara Dinamis -->
<script>
    document.getElementById('add-item-btn').addEventListener('click', function() {
        let container = document.getElementById('item-container');
        let firstRow = container.querySelector('.item-row');
        let newRow = firstRow.cloneNode(true);
        
        // Reset nilai input pada baris baru
        newRow.querySelector('select').value = '';
        newRow.querySelector('input').value = '';
        
        // Tambahkan tombol hapus untuk baris baru
        let deleteCol = newRow.querySelector('.col-md-1');
        deleteCol.innerHTML = '<button type="button" class="btn btn-danger border-2 border-dark remove-btn fw-bold">✖</button>';
        
        // Event listener untuk tombol hapus
        newRow.querySelector('.remove-btn').addEventListener('click', function() {
            newRow.remove();
        });

        container.appendChild(newRow);
    });
</script>

</body>
</html>