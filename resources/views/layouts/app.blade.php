    <!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      dir="{{ in_array(app()->getLocale(), ['ar', 'en']) ? 'rtl' : 'ltr' }}">

    <head>

        <!-- Meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>


        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.bunny.net">

        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">


       <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
    crossorigin="anonymous">

<!-- Bootstrap RTL CSS -->
@if(in_array(app()->getLocale(), ['ar', 'en', 'ru']))
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.rtl.min.css"
        rel="stylesheet"
        crossorigin="anonymous">
@endif

<!-- Your custom CSS -->
<link rel="stylesheet" href="{{ asset('css/lang.css') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
            integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer" />


        <!-- Scripts -->
        {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

    </head>

    <body>

        <div id="app">

            <!-- Navbar -->
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">

                <div class="container">

                    <!-- Brand -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{__('language.Dashboard')}}
                    </a>


                    <!-- Mobile Toggle -->
                    <button class="navbar-toggler"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent"
                            aria-expanded="false"
                            aria-label="{{__('language.Toggle navigation')}}">

                        <span class="navbar-toggler-icon"></span>

                    </button>


                    <!-- Navbar Content -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <!-- Left Side -->
                        <ul class="navbar-nav me-auto">
                        </ul>


                        <!-- Right Side -->
                        <ul class="navbar-nav ms-auto">

                            <!-- Languages -->
                        <div class="dropdown">

        <button class="btn dropdown-toggle"
                type="button"
                data-bs-toggle="dropdown"
                aria-expanded="false">
                            
            {{ LaravelLocalization::getCurrentLocaleNative() }}

        </button>

        <ul class="dropdown-menu">

            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                <li>

                    <a class="dropdown-item"
                    rel="alternate"
                    hreflang="{{ $localeCode }}"
                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">

                        {{ $properties['native'] }}

                    </a>

                </li>

            @endforeach

        </ul>

    </div>


                            <!-- Authentication Links -->
                            @guest

                                @if (Route::has('login'))

                                    <li class="nav-item">

                                        <a class="nav-link" href="{{ route('login') }}">
                                            {{ __('language.Login') }}
                                        </a>

                                    </li>

                                @endif


                                @if (Route::has('register'))

                                    <li class="nav-item">

                                        <a class="nav-link" href="{{ route('register') }}">
                                            {{ __('language.Register') }}
                                        </a>

                                    </li>

                                @endif

                            @else

                                <!-- User Dropdown -->
                                <li class="nav-item dropdown">

                                    <a id="navbarDropdown"
                                    class="nav-link dropdown-toggle"
                                    href="#"
                                    role="button"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                    v-pre>

                                        {{ Auth::user()->name }}

                                    </a>


                                    <div class="dropdown-menu dropdown-menu-end"
                                        aria-labelledby="navbarDropdown">

                                        <!-- Logout -->
                                        <a class="dropdown-item"
                                        href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">

                                            {{ __('language.Logout') }}

                                        </a>


                                        <!-- Logout Form -->
                                        <form id="logout-form"
                                            action="{{ route('logout') }}"
                                            method="POST"
                                            class="d-none">

                                            @csrf

                                        </form>

                                    </div>

                                </li>

                            @endguest

                        </ul>

                    </div>

                </div>

            </nav>


            <!-- Main Content -->
            <main class="py-4">

                @yield('content')

            </main>

        </div>


        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
                crossorigin="anonymous">
        </script>

    </body>

    </html>