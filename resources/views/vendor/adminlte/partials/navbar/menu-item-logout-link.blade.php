@php( $logout_url = View::getSection('logout_url') ?? config('adminlte.logout_url', 'logout') )

@if (config('adminlte.use_route_url', false))
    @php( $logout_url = $logout_url ? route($logout_url) : '' )
@else
    @php( $logout_url = $logout_url ? url($logout_url) : '' )
@endif

<li class="nav-item">
    <a class="nav-link text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" title="Logout">
        <i class="fas fa-sign-out-alt"></i>
    </a>
    <form id="logout-form" action="{{ $logout_url }}" method="POST" style="display: none;">
        @csrf
    </form>
</li>
