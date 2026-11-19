<style>
    .nav-moon-btn {
        font-family: 'Oswald', sans-serif;
        letter-spacing: 1px;
        border: 2px solid #FFD200;
        background-color: transparent;
        color: #FFD200;
    }
    .nav-moon-btn.active,
    .nav-moon-btn:hover {
        background-color: #FFD200;
        color: #111111;
    }
    .nav-profile-btn {
        font-family: 'Oswald', sans-serif;
        letter-spacing: 1px;
        border: 2px solid #FFFFFF;
        background-color: #222222;
        color: #FFFFFF;
    }
    .nav-profile-btn.active,
    .nav-profile-btn:hover {
        background-color: #FFFFFF;
        color: #111111;
    }
</style>

<nav class="moon-box mb-4" style="background-color: #111111; color: #FFFFFF;">
    <div class="px-3 px-md-4 py-3 d-flex flex-wrap align-items-center justify-content-between gap-3">

        {{-- Brand & Info Bengkel Aktif --}}
        <div class="d-flex flex-wrap align-items-center gap-2 gap-md-3">
            <a href="{{ route('spareparts.index') }}"
               class="text-decoration-none d-flex align-items-center gap-2"
               style="font-family: 'Oswald', sans-serif; letter-spacing: 1.5px; color: #FFD200; font-size: 1.35rem;">
                <img src="{{ asset('image/mooneyes.png') }}"
                     alt="MOONEYES"
                     style="height: 30px; width: auto; object-fit: contain;">
                <span>MOONEYES</span>
                <span class="badge text-bg-danger border border-dark" style="font-size: 0.75rem; letter-spacing: 1px;">
                    SERVICES
                </span>
            </a>

            @auth
                <span class="badge rounded-pill px-3 py-2 fw-bold"
                      style="background-color: #FFD200; color: #111111; border: 2px solid #FFFFFF; font-size: 0.78rem;">
                    🔧 {{ Auth::user()->workshop->name ?? 'MOONEYES SERVICES' }}
                    @if(!empty(Auth::user()->workshop?->code))
                        ({{ Auth::user()->workshop->code }})
                    @endif
                </span>
            @endauth
        </div>

        {{-- Menu Navigasi Utama & Profil Admin --}}
        <div class="d-flex flex-wrap align-items-center gap-2">
            @auth
                <a href="{{ route('spareparts.index') }}"
                   class="btn btn-sm px-3 py-2 fw-bold nav-moon-btn {{ request()->routeIs('spareparts.index') || request()->routeIs('spareparts.create') ? 'active' : '' }}">
                    ⚙️ STOK PART
                </a>

                <a href="{{ route('spareparts.transaksi.form') }}"
                   class="btn btn-sm px-3 py-2 fw-bold nav-moon-btn {{ request()->routeIs('spareparts.transaksi.*') || request()->routeIs('spareparts.riwayat') ? 'active' : '' }}">
                    ⚡ TRANSAKSI & RIWAYAT
                </a>

                <a href="{{ route('admin.profile') }}"
                   class="btn btn-sm px-3 py-2 fw-bold d-inline-flex align-items-center gap-2 nav-profile-btn {{ request()->routeIs('admin.profile*') ? 'active' : '' }}">
                    <img src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('image/mooneyes.png') }}"
                         alt="Foto {{ Auth::user()->name }}"
                         style="width: 24px; height: 24px; object-fit: cover; border-radius: 50%; border: 1.5px solid #FFD200; background-color: #FFD200;">
                    <span>{{ Auth::user()->name }}</span>
                </a>

                @if(Route::has('logout'))
                    <form action="{{ route('logout') }}" method="POST" class="d-inline m-0">
                        @csrf
                        <button type="submit"
                                class="btn btn-sm px-3 py-2 fw-bold"
                                style="font-family: 'Oswald', sans-serif; letter-spacing: 1px; background-color: #E62E2D; color: #FFFFFF; border: 2px solid #FFFFFF;">
                            LOGOUT
                        </button>
                    </form>
                @endif
            @endauth
        </div>

    </div>
</nav>