<div class="moon-box p-3 mb-4 d-flex flex-wrap justify-content-between align-items-center gap-3">
    <div class="d-flex flex-wrap align-items-center gap-3">
        <a href="{{ route('spareparts.index') }}" class="d-flex align-items-center gap-2 text-decoration-none text-dark">
            <img src="{{ asset('image/mooneyes.png') }}" alt="Mooneyes Logo" style="height: 44px; width: auto; border: 2px solid var(--moon-black); background: var(--moon-yellow); padding: 3px; border-radius: 6px;">
            <span class="brand-font fs-4 fw-bold d-none d-sm-inline">MOONEYES SERVICES</span>
        </a>

        <div class="d-flex flex-wrap gap-2">
            <a href="{{ route('spareparts.index') }}" class="btn btn-sm @if(request()->routeIs('spareparts.index') || request()->routeIs('spareparts.create')) btn-moon-black @else btn-moon-yellow @endif">
                ⚙️ STOK PART
            </a>
            <a href="{{ route('spareparts.transaksi.form') }}" class="btn btn-sm @if(request()->routeIs('spareparts.transaksi.*') || request()->routeIs('spareparts.riwayat')) btn-moon-black @else btn-moon-yellow @endif">
                ⚡ TRANSAKSI
            </a>
        </div>
    </div>

    <div class="d-flex align-items-center gap-2">
        <span class="badge bg-dark text-warning fs-6">{{ Auth::user()->name }}</span>
        <form action="{{ route('logout') }}" method="POST" class="mb-0">
            @csrf
            <button type="submit" class="btn btn-moon-danger btn-sm px-3">LOGOUT ✖</button>
        </form>
    </div>
</div>