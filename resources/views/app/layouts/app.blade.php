<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{--<script src="{{ asset('app/js/app.js') }}" defer></script>--}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('dim/assets/css/fontawesome-all.min.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('app/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('app/css/custom.css') }}" rel="stylesheet">

</head>
<body>
<div id="app"></div>
<div id="">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Header
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
                                <a class="dropdown-item" href="{{ route('headers.index') }}">
                                    Headers List
                                </a>
                                <a class="dropdown-item" href="{{ route('headers.create') }}">
                                    Header Create
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                About
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
                                <a class="dropdown-item" href="{{ route('abouts.index') }}">
                                    Abouts List
                                </a>
                                <a class="dropdown-item" href="{{ route('abouts.create') }}">
                                    About Create
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Work
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
                                <a class="dropdown-item" href="{{ route('works.index') }}">
                                    Works List
                                </a>
                                <a class="dropdown-item" href="{{ route('works.create') }}">
                                    Work Create
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Intro
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
                                <a class="dropdown-item" href="{{ route('intros.index') }}">
                                    Intros List
                                </a>
                                <a class="dropdown-item" href="{{ route('intros.create') }}">
                                    Intro Create
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ app()->getLocale() }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
                                @foreach (config('translatable.locales') as $lang => $language)
                                    @if ($lang != app()->getLocale())
                                        <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}">
                                            {{ $language }}
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>

<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="card mb-3">
                    <div class="card-header text-center">
                        <img src="{{ asset('app/images/loader.gif') }}" width="100">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('app/js/app.js') }}"></script>

<script src="{{ asset('app/js/aspIndex.js') }}"></script>
<script src="{{ asset('app/js/aspCreate.js') }}"></script>
<script src="{{ asset('app/js/asp.js') }}"></script>

@yield('script')

</body>
</html>
