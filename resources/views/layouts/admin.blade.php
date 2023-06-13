<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Damiano Casolari')</title>

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css'
        integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=='
        crossorigin='anonymous' referrerpolicy='no-referrer' />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])

    <style>
        .bg_color {
            background-image: url('{{ asset('img/Default_minimal_brush_strokes_with_very_bright_colorsadss_on_to_ba_0.jpg') }}') !important;
            background-size: cover;
            background-position: center;
            height: 100vh;
        }
    </style>
</head>



<body>
    <div id="app">

        <nav class="navbar navbar-light bg-light bg-dark fixed-top strong_shadow">
            <div class="container-fluid">
                <div class="d-flex align-items-center h-100">
                    <h3 class="text-light me-3">My Projects</h3>
                    <a class="navbar-brand text-light text-white-50 hover_light td"
                        href="{{ route('welcome') }}">Home</a>
                </div>
                <div class="">
                    <a class="no_undescore text-white-50 p-2 d-none d-md-block hover_light td"
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Sign Out') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
                <button class="navbar-toggler d-md-none text-light d-flex justify-content-center align-items-center"
                    type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                    aria-controls="offcanvasNavbar">
                    <i class="fa-solid fa-bars"></i>
                </button>

                {{-- OFFCANVAS  --}}
                <div class="offcanvas offcanvas-end d-md-none vh100" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menù</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 ">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('welcome') }}">Home</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link p-2 {{ Route::currentRouteName() == 'admin.dashboard' ? 'bg-dark text-white border rounded-4' : '' }}"
                                    aria-current="page" href="{{ route('admin.dashboard') }}">
                                    <i class="fa-solid fa-gauge"></i>
                                    {{ __('Dashboard') }}
                                </a>
                            </li>
                            <li class="nav-item rounded_opt">
                                <a class="nav-link p-2 {{ Route::currentRouteName() == 'admin.projects.index' ? 'bg-dark  text-white-50 border rounded-4' : 'text-muted' }}"
                                    href="{{ route('admin.projects.index') }}">
                                    <i class="fa-solid fa-thumbtack"></i>
                                    {{ __('Projects') }}
                                </a>
                            </li>
                            <li class="nav-item rounded_opt">
                                <a class="nav-link p-2 {{ Route::currentRouteName() == 'admin.types.index' ? 'bg-dark  text-white-50 border rounded-4' : 'text-muted' }}"
                                    href="{{ route('admin.types.index') }}">
                                    <i class="fa-solid fa-bookmark"></i>
                                    {{ __('Types') }}
                                </a>

                            </li>
                            <li class="nav-item rounded_opt">
                                <a class="nav-link p-2 {{ Route::currentRouteName() == 'admin.tags.index' ? 'bg-dark  text-white-50 border rounded-4' : 'text-muted' }}"
                                    href="{{ route('admin.tags.index') }}">
                                    <i class="fa-solid fa-tags"></i>
                                    {{ __('Technology') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        {{-- LEFT NAVBAR  --}}
        <main class="col-12 d-flex justify-content-between">
            <nav class="d-none col-md-4 col-lg-2 d-md-block sidebar collapse desktop_nav bg_color">
                <div class="position-sticky">
                    <ul class="nav flex-column sx_nav">
                        <li class="nav-item hover_bg">
                            <a class="nav_link {{ Route::currentRouteName() == 'admin.dashboard' ? 'bg-dark  text-light' : ' ' }}"
                                aria-current="page" href="{{ route('admin.dashboard') }}">
                                <i class="fa-solid fa-gauge"></i>
                                {{ __('Dashboard') }}
                            </a>
                        </li>
                        <li class="nav-item hover_bg">
                            <a class="nav_link {{ Route::currentRouteName() == 'admin.projects.index' ? 'bg-dark text-white-50' : '' }}"
                                href="{{ route('admin.projects.index') }}">
                                <i class="fa-solid fa-thumbtack"></i>
                                {{ __('Project') }}
                            </a>
                        </li>

                        <li class="nav-item hover_bg">
                            <a class="nav_link {{ Route::currentRouteName() == 'admin.types.index' ? 'bg-dark  text-white-50' : '' }}"
                                href="{{ route('admin.types.index') }}">
                                <i class="fa-solid fa-bookmark"></i>
                                {{ __('Types') }}
                            </a>
                        </li>
                        <li class="nav-item hover_bg">
                            <a class="nav_link {{ Route::currentRouteName() == 'admin.tags.index' ? 'bg-dark  text-white-50' : '' }}"
                                href="{{ route('admin.tags.index') }}">
                                <i class="fa-solid fa-tags"></i>
                                {{ __('Technology') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="modular_content w-100">
                @yield('content')
            </div>
        </main>
    </div>
    </div>

    </div>
</body>

</html>
