<li class="nav-item">
    @if (auth()->user()->role === 'admin')
    <a href="{{ route('users.index') }}"
       class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
        <p>Users</p>
    </a>
    @endif
    <a href="{{ route('permintaan_maggot.index') }}"
       class="nav-link {{ Request::is('permintaan*') ? 'active' : '' }}">
        <p>Permintaan Maggot</p>
    </a>
</li>


<li class="nav-item">
    @if (auth()->user()->role === 'admin')
        <a href="{{ route('produkMaggots.index') }}"
        class="nav-link {{ Request::is('produkMaggots*') ? 'active' : '' }}">
            <p>Produk Maggots</p>
        </a>
    @endif
</li>


{{-- <li class="nav-item">
    <a href="{{ route('detailPermintaanMaggots.index') }}"
       class="nav-link {{ Request::is('detailPermintaanMaggots*') ? 'active' : '' }}">
        <p>Detail Permintaan Maggots</p>
    </a>
</li> --}}


