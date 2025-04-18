<aside class="main-sidebar {{ config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4') }}">

    {{-- Sidebar brand logo --}}
    @if(config('adminlte.logo_img_xl'))
        @include('adminlte::partials.common.brand-logo-xl')
    @else
        @include('adminlte::partials.common.brand-logo-xs')
    @endif

    {{-- Sidebar menu --}}
    <div class="sidebar">
        <nav class="pt-2">
            <ul class="nav nav-pills nav-sidebar flex-column {{ config('adminlte.classes_sidebar_nav', '') }}"
                data-widget="treeview" role="menu"
                @if(config('adminlte.sidebar_nav_animation_speed') != 300)
                    data-animation-speed="{{ config('adminlte.sidebar_nav_animation_speed') }}"
                @endif
                @if(!config('adminlte.sidebar_nav_accordion'))
                    data-accordion="false"
                @endif>

                {{-- Menampilkan menu khusus jika user berada di halaman dokter --}}
                @php
                    $role = Auth::user()->role ?? null;
                @endphp

                @if ($role === 'dokter')
                    <li class="nav-item">
                        <a href="/dokter" class="nav-link {{ request()->is('dokter/dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/dokter/periksa" class="nav-link {{ request()->is('dokter/periksa*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-stethoscope"></i>
                            <p>Periksa</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/dokter/obat" class="nav-link {{ request()->is('dokter/obat*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-pills"></i>
                            <p>Obat</p>
                        </a>
                    </li>
                @elseif ($role === 'pasien')
                    <li class="nav-item">
                        <a href="/pasien" class="nav-link {{ request()->is('pasien/dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/pasien/periksa" class="nav-link {{ request()->is('dokter/periksa*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-stethoscope"></i>
                            <p>Periksa</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/pasien/riwayat" class="nav-link {{ request()->is('pasien/riwayat*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-history"></i>
                            <p>Riwayat Periksa</p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>

</aside>
