<nav class="navbar navbar-expand-lg py-4 py-lg-0 shadow">
        <div class="container px-4">
            <img src="{{asset('assets/img/Logo FoodFor All.png') }}" alt="">
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#top-navbar" aria-controls="top-navbar">
                <i class="lni lni-dashboard-square-1"></i>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="top-navbar" aria-labelledby="top-navbarLabel">
                <!-- Navigation Bar Content -->
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#top-navbar" aria-controls="offcanvasExample">
                    <div class="d-flex justify-content-between p-3">
                        <img src="img/Logo FoodFor All.png" alt="">
                        <i class="lni lni-dashboard-square-1"></i>
                    </div>
                </button>
                <ul class="navbar-nav ms-lg-auto p-4 p-lg-0">
                    <li class="nav-item px-3 px-lg-0 py-1 py-lg-4">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">@lang('navbar.home')</a>
                    </li>
                    <li class="nav-item px-3 px-lg-0 py-1 py-lg-4">
                        <a class="nav-link active" aria-current="page" href="{{ route('about') }}">@lang('navbar.about')</a>
                    </li>
                    <li class="nav-item px-3 px-lg-0 py-1 py-lg-4">
                        <a class="nav-link active" aria-current="page" href="{{ route('support') }}">@lang('navbar.contact')</a>
                    </li>
                    <li class="nav-item px-3 px-lg-0 py-1 py-lg-4 dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('navbar.contribute') }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('donate') }}">@lang('navbar.donate')</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('share') }}">@lang('navbar.share_meal')</a></li>
                        </ul>
                    </li>
                    <li class="nav-item px-3 px-lg-0 py-1 py-lg-4">
                        @if (Auth::check() && Auth::user()->is_admin==1)
                        <a class="nav-link active" aria-current="page" href={{ route('manage', ['type'=>'all']) }}>Manage</a>
                        @else
                        <a class="nav-link active" aria-current="page" href={{ route('history', ['type'=>'all']) }}>@lang('navbar.history')</a>
                        @endif   
                    </li>
                    <li class="nav-item px-3 px-lg-0 py-1 py-lg-4 dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="ms-1">
                            @auth
                                {{ Auth::user()->name }} 
                            @else
                                @lang('navbar.register')
                            @endauth
                            </span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                        @guest
                            <li><a class="dropdown-item" href="{{ route('register') }}">@lang('navbar.register')</a></li>
                            <li><a class="dropdown-item" href="{{ route('login') }}">@lang('navbar.login')</a></li>
                        @endguest
                        @auth
                            <li><a class="dropdown-item" href="{{ route('logout') }}">@lang('navbar.logout')</a></li>
                        @endauth
                        </ul>
                    </li>
                    <li class="nav-item px-3 px-lg-0 py-1 py-lg-4 dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="ms-1">Lang</span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="langDropdown">
                            <li><a class="dropdown-item" href="{{ route('set-locale', 'en') }}">English</a></li>
                            <li><a class="dropdown-item" href="{{ route('set-locale', 'id') }}">Indonesia</a></li>
                        </ul>
                    </li>
                    
                </ul>
            </div>
        </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>