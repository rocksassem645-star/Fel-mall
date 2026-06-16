<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
dir="{{ in_array(app()->getLocale(), ['ar']) ? 'rtl' : 'ltr' }}"

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap RTL --}}
  @if(in_array(app()->getLocale(), ['ar']))
    <link href="...bootstrap.rtl.min.css" rel="stylesheet">
@endif

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    {{-- FEL MALL CSS --}}
    <link rel="stylesheet" href="{{ asset('css/mall.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lang.css') }}">

    @stack('styles')
</head>

<body>

    <div id="app">

        {{-- NAVBAR --}}
        <nav class="navbar navbar-expand-md">
            <div class="container">

                {{-- Brand --}}
                <a class="navbar-brand" href="{{ url('/') }}">
                    FEL <span>MALL</span>
                </a>

                {{-- Mobile Toggle --}}
                <button class="navbar-toggler" type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent"
                        aria-expanded="false"
                        aria-label="{{ __('language.Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                {{-- Navbar Content --}}
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav me-auto">
                    </ul>

                    <ul class="navbar-nav ms-auto align-items-center gap-2">

                        {{-- Language Switcher --}}
                        <li class="nav-item">
                            <div class="dropdown">
                                <button class="btn btn-login dropdown-toggle" type="button" data-bs-toggle="dropdown">
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
                        </li>

                        {{-- Auth Links --}}
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="btn btn-login" href="{{ route('login') }}">
                                        {{ __('language.Login') }}
                                    </a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="btn btn-register" href="{{ route('register') }}">
                                        {{ __('language.Register') }}
                                    </a>
                                </li>
                            @endif

                        @else
                            <li class="nav-item dropdown">
                                <button class="btn btn-login dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-user me-1"></i>
                                    {{ Auth::user()->name }}
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fa-solid fa-right-from-bracket me-1"></i>
                                            {{ __('language.Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest

                    </ul>
                </div>
            </div>
        </nav>

        {{-- Main Content --}}
        <main class="py-4">
            @yield('content')
        </main>

    </div>

    {{-- Footer --}}
    <footer>
        <div class="container">
            <p>&copy; {{ date('Y') }} <strong>FEL MALL</strong> — All rights reserved.</p>
        </div>
    </footer>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/mall.js') }}"></script>

    @stack('scripts')

</body>

</html>