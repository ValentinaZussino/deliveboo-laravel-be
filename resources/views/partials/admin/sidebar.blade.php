<nav id="sidebarMenu" class="d-flex flex-column justify-content-between flex-shrink-0 p-3 bg-light navbar-light ">
    <div>
        <img src="{{ asset('img/logo-b-01.png') }}" alt="">
        <ul class="nav flex-column">
            <li class="nav-item"> <a class="nav-link text-black" href="{{url('/') }}">
                <i class="fa-solid fa-house fa-lg fa-fw"></i> Home
            </a>
            <li class="nav-item"> <a class="nav-link text-black {{ Route::currentRouteName() == 'admin.dashboard' ? 'bg-secondary' : '' }}" href="{{route('admin.dashboard')}}">
                <i class="fa-solid fa-chart-line fa-lg fa-fw"></i> Dashboard
            </a></li>
            <li class="nav-item">
                <a class="nav-link text-black {{ Route::currentRouteName() == 'admin.restaurants.index' ? 'bg-secondary' : '' }}" href="{{route('admin.restaurants.index')}}">
                    <i class="fa-solid fa-utensils fa-lg fa-fw"></i> Ristorante
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-black {{ Route::currentRouteName() == 'admin.plates.index' ? 'bg-secondary' : '' }}" href="{{route('admin.plates.index')}}">
                    <i class="fa-solid fa-plate-wheat fa-lg fa-fw"></i> Piatti
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-black {{ Route::currentRouteName() == 'admin.categories.index' ? 'bg-secondary' : '' }}" href="{{route('admin.categories.index')}}">
                    <i class="fa-solid fa-bookmark fa-lg fa-fw"></i> Categorie
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-black {{ Route::currentRouteName() == 'admin.types.index' ? 'bg-secondary' : '' }}" href="{{route('admin.types.index')}}">
                    <i class="fa-solid fa-tag fa-lg fa-fw"></i> Tipologie
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-black {{ Route::currentRouteName() == 'admin.orders.index' ? 'bg-secondary' : '' }}" href="{{route('admin.orders.index')}}">
                    <i class="fa-solid fa-cart-shopping fa-lg fa-fw"></i> Ordini
                </a>
            </li>
        </ul>
    </div>
    <div class="dropdown">
    <hr>
        <a href="#" role="button" class="d-flex align-items-center text-black text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false" v-pre>
            {{-- <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2"> --}}
            <strong>{{ Auth::user()->name }}</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
            <a class="dropdown-item" href="{{ url('admin') }}">{{__('Dashboard')}}</a>
            
            <li><hr class="dropdown-divider"></li>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                {{ __('Esci') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </ul>
    </div>
</nav>