@extends('lock.layout')

@section('title')
    Home
@endsection

@section('content')
    @if (session('smg'))
        <div style="width: auto" id="show-msg"
            class="alert alert-{{ session('color') ?? __('message.color.success') }} d-flex align-items-center"
            role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                <use xlink:href="#{{ session('svg') ?? __('message.svg.success') }}" />
            </svg>
            <div class="ml-4">
                {{ session('smg') }}
            </div>
        </div>
    @endif
    <header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark justify-content-between">
            <a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" class="mr-5" alt=""></a>
            <div class="d-flex flex-grow-1 justify-content-start">
                <a class="navbar-brand mr-4 pb-0" href="{{ route('home') }}">HOME</a>
                <a class="navbar-brand mr-4 pb-0" aria-current="page" href="{{ route('home') . '#trending' }}">TRENDING</a>
                <a class="navbar-brand pb-0" aria-current="page" href="{{ route('home') . '#new' }}">NEW</a>
            </div>
            </div>
            <form class="d-flex position-relative mr-4 w-25 search-model">
                <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search"
                    id="search">
                <div class="show-search" id="search-item">

                </div>
            </form>

            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown" style="position: unset !important;">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" type="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->fullname }}
                        </a>


                        <div class="dropdown-menu dropdown-menu-end" style="right: 0 !important; left: 89% !important;"
                            aria-labelledby="navbarDropdown">
                            @if (Auth::user()->is_admin == 1)
                                <a class="dropdown-item" href="{{ route('admin.index') }}">
                                    {{ __('Page Admin') }}
                                </a>
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>


                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>

        </nav>
    </header>

    @yield('narbar-admin')

    @yield('page-content')
    </div>

    <footer>
        <div class="row mt-5 line-footer" style="width: 100%;">
            <div class="col-md-12 text-center mt-3">
                <p>
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | This is project practice made with <i
                        class="icon-heart color-danger" aria-hidden="true"></i> by <a href="#" target="_blank">Long
                        Nguyen</a>
                </p>
            </div>
        </div>
    </footer>
@endsection
