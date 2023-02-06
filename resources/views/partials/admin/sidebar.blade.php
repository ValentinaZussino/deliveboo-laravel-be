<nav id="sidebarMenu" class="bg-light navbar-light ">
    <img src="{{ asset('img/logo-b-01.png') }}" alt="">
    <ul class="nav flex-column">
        <li class="nav-item"> <a class="nav-link text-black {{ Route::currentRouteName() == 'admin.dashboard' ? 'bg-secondary' : '' }}" href="{{route('admin.dashboard')}}">
            <i class="fa-solid fa-house-user fa-lg fa-fw"></i> Dashboard
        </a></li>
        <li class="nav-item">
            <a class="nav-link text-black {{ Route::currentRouteName() == 'admin.restaurants.index' ? 'bg-secondary' : '' }}" href="{{route('admin.restaurants.index')}}">
                <i class="fa-solid fa-utensils fa-lg fa-fw"></i> Restaurant
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-black {{ Route::currentRouteName() == 'admin.plates.index' ? 'bg-secondary' : '' }}" href="{{route('admin.plates.index')}}">
                <i class="fa-solid fa-plate-wheat fa-lg fa-fw"></i> Plates
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-black {{ Route::currentRouteName() == 'admin.categories.index' ? 'bg-secondary' : '' }}" href="{{route('admin.categories.index')}}">
                <i class="fa-solid fa-bookmark fa-lg fa-fw"></i> Categories
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-black {{ Route::currentRouteName() == 'admin.types.index' ? 'bg-secondary' : '' }}" href="{{route('admin.types.index')}}">
                <i class="fa-solid fa-tag fa-lg fa-fw"></i> Types
            </a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link text-white" href="#">
                <i class="fa-solid fa-users fa-lg fa-fw"></i> Users
            </a>
        </li> --}}
    </ul>
</nav>