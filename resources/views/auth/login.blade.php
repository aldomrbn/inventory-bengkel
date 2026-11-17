<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN - MOONEYES SERVICES</title>
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
            background-image: radial-gradient(var(--moon-black) 1.5px, transparent 1.5px);
            background-size: 26px 26px;
            font-family: 'Space Grotesk', sans-serif;
            color: var(--moon-black);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        h1, h2, h3, label, .brand-font {
            font-family: 'Oswald', sans-serif;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .moon-login-card {
            background-color: var(--moon-white);
            border: 4px solid var(--moon-black);
            border-radius: 16px;
            box-shadow: 10px 10px 0px var(--moon-black);
            overflow: hidden;
            width: 100%;
            max-width: 440px;
        }

        .moon-login-header {
            background-color: var(--moon-black);
            color: var(--moon-yellow);
            border-bottom: 4px solid var(--moon-black);
            padding: 25px 20px;
            text-align: center;
        }

        .moon-input {
            border: 3px solid var(--moon-black) !important;
            border-radius: 8px;
            font-weight: 700;
            background-color: var(--moon-gray);
            padding: 12px 15px;
        }

        .moon-input:focus {
            background-color: var(--moon-white);
            box-shadow: 4px 4px 0px var(--moon-black) !important;
        }

        .btn-moon-login {
            background-color: var(--moon-yellow);
            color: var(--moon-black);
            border: 3px solid var(--moon-black);
            font-family: 'Oswald', sans-serif;
            font-size: 1.25rem;
            letter-spacing: 1.5px;
            box-shadow: 5px 5px 0px var(--moon-black);
            transition: all 0.15s ease;
        }

        .btn-moon-login:hover {
            background-color: var(--moon-black);
            color: var(--moon-yellow);
            transform: translate(-2px, -2px);
            box-shadow: 7px 7px 0px var(--moon-yellow);
        }

        .checker-strip {
            height: 12px;
            background-image: repeating-linear-gradient(
                90deg,
                var(--moon-black) 0px,
                var(--moon-black) 16px,
                var(--moon-yellow) 16px,
                var(--moon-yellow) 32px
            );
            border-bottom: 3px solid var(--moon-black);
        }
    </style>
</head>
<body class="p-3">

<div class="moon-login-card">
    <!-- Header Hitam & Logo PNG -->
    <div class="moon-login-header">
        <div class="mb-3">
            <img src="{{ asset('image/Mooneyes.png') }}" alt="Mooneyes Services Logo" style="max-height: 65px; width: auto; background: var(--moon-yellow); padding: 4px; border: 3px solid var(--moon-white); border-radius: 8px;">
        </div>
        <h1 class="h2 mb-1" style="letter-spacing: 2px;">MOONEYES SERVICES</h1>
        <span class="badge bg-warning text-dark border border-light brand-font px-2 py-1">
            SPEED SHOP & INVENTORY SYSTEM
        </span>
    </div>

    <!-- Strip Garis Balap -->
    <div class="checker-strip"></div>

    <!-- Form Login -->
    <div class="p-4">
        @if ($errors->any())
            <div class="alert border-3 border-dark fw-bold text-white mb-3" style="background-color: var(--moon-red);">
                ⚠️ {{ $errors->first() }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert border-3 border-dark fw-bold text-white mb-3" style="background-color: var(--moon-red);">
                ⚠️ {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label fw-bold">Email Mekanik / Admin</label>
                <input type="email" name="email" id="email" class="form-control moon-input" value="{{ old('email') }}" placeholder="admin@mooneyes.com" required autofocus>
            </div>

            <div class="mb-4">
                <label for="password" class="form-label fw-bold">Password Garasi</label>
                <input type="password" name="password" id="password" class="form-control moon-input" placeholder="••••••••" required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-moon-login py-2">
                    MASUK KE GARASI 🏁
                </button>
            </div>
        </form>
    </div>

    <!-- Footer Kecil -->
    <div class="text-center py-2 border-top border-3 border-dark" style="background-color: var(--moon-gray);">
        <small class="fw-bold brand-font text-muted">EST. KUSTOM CULTURE • GO WITH MOON!</small>
    </div>
</div>

</body>
</html>