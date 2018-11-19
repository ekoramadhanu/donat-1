<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="theme-color" content="#279AE6">

        <title>@yield('title')</title>

        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="{{ URL::asset('/css/app.css') }}" />

    </head>
    <body>
        <div class="navbar-fixed">
            <nav class="umum-nav target custom-nav-shadows primary blue-prim">
                <div class="nav-wrapper margin-left-right">
                    <a href="{{ URL::to('/') }}" class="brand-logo">
                        <img src="{{ URL::asset('/svg/logo.svg') }}" class="hide-on-small-only img-brand-size-dekstop" alt="logo">
                    </a>
                    <a href="{{ URL::to('/') }}" class="brand-logo">
                        <img src="{{ URL::asset('/svg/logo.svg') }}" class="hide-on-med-and-up img-brand-size-mobile" alt="logo">
                    </a>
                    <a href="#!" data-target="mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="{{ URL::to('/kemajuan') }}">Cek Kemajuan Dokumen</a></li>
                        <li><a id="register" class="waves-effect waves-dark btn white button-umum" href="{{ URL::to('/registrasi') }}">Registrasi Layanan</a></li>
                    </ul>
                </div>
            </nav>
        </div>

        <ul class="sidenav" id="mobile">
                <li><a href="{{ URL::to('/kemajuan') }}">Cek Kemajuan Dokumen</a></li>
                <li><a href="{{ URL::to('/registrasi') }}">Registrasi Layanan</a></li>
            </ul>

        <main>
            @yield('content')
        </main>

        <footer class="container footer">
            <p>copyright © ngalam halokes {{ date("Y") }}<p>
        </footer>

    </body>
</html>

<script type="text/javascript" src="{{ URL::asset('/js/app.js') }}"></script>

@yield('snippet-content')