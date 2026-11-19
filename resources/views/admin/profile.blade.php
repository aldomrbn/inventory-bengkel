<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROFIL ADMIN - MOONEYES SERVICES</title>
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
<div class="container py-4" style="max-width: 900px;">

    @include('layouts.navbar')

    <div class="moon-box mb-4" style="background-color: var(--moon-black); color: var(--moon-white);">
        <div class="p-4">
            <span class="badge bg-warning text-dark badge-moon mb-2">PENGATURAN AKUN & KEAMANAN</span>
            <h1 class="display-6 mb-0" style="color: var(--moon-yellow); text-shadow: 3px 3px 0px #000;">
                👤 PROFIL ADMIN MOONEYES
            </h1>
        </div>
        <div class="checker-strip"></div>
    </div>

    @if(session('success'))
        <div class="moon-box p-3 mb-4 fw-bold" style="background-color: #D4EDDA; border-color: var(--moon-black);">
            ✅ {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="moon-box p-3 mb-4 fw-bold text-white" style="background-color: var(--moon-red); border-color: var(--moon-black);">
            <ul class="mb-0 ps-3">
                @foreach($errors->all() as $error)
                    <li>⚠️ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="moon-box">
        <div class="moon-header-bar">
            <span>⚙️ EDIT PROFIL, FOTO & PASSWORD</span>
        </div>
        <div class="p-4">
            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row g-4 align-items-center mb-4">
                    <div class="col-md-4 text-center">
                        <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('image/mooneyes.png') }}"
                             alt="Foto {{ $user->name }}"
                             class="mb-2"
                             style="width: 120px; height: 120px; object-fit: cover; border-radius: 50%; border: 4px solid #111111; background-color: #FFD200;">
                        <div class="small fw-bold text-muted">
                            Bengkel: {{ $user->workshop->name ?? 'MOONEYES SERVICES' }}
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Admin</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control moon-input" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Email Login</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control moon-input" required>
                        </div>

                        <div class="mb-0">
                            <label class="form-label fw-bold">Foto Profil / Avatar (Opsional)</label>
                            <input type="file" name="avatar" class="form-control moon-input" accept="image/jpg,image/jpeg,image/png,image/webp">
                        </div>
                    </div>
                </div>

                <hr class="border-2 border-dark my-4">

                <h3 class="mb-3">🔒 GANTI PASSWORD (OPSIONAL)</h3>
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Password Baru</label>
                        <input type="password" name="password" class="form-control moon-input" placeholder="Minimal 6 karakter">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Konfirmasi Password Baru</label>
                        <input type="password" name="password_confirmation" class="form-control moon-input" placeholder="Ulangi password baru">
                    </div>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-moon-black btn-lg py-3">
                        SIMPAN PERUBAHAN PROFIL 💾
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
</body>
</html>