<div>
    <!-- Nothing worth having comes easy. - Theodore Roosevelt -->
</div><!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    </head>
    <body class="bg-white h-screen flex flex-col">
        <header class="sm:p-5 px-4 border-b bg-white shadow">
            <div class="sm:container sm:mx-auto mx-0 flex justify-between items-center">
                <img class="max-h-10" src="{{ asset('img/utp.png') }}" alt="Logo UTP">
                <h1 class="text-3xl font-black hidden sm:block">
                    UTP Social
                </h1>
                <nav class="flex gap-2 items-center">
                    @if (Route::has('login') && Auth::check())
                        <a class="text-gray-600 text-sm" href="{{ route('post', auth()->user()->username) }}">
                            Hola, {{ auth()->user()->username }}
                        </a>
                        <form class="m-auto" action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="font-bold uppercase text-gray-600 text-sm">
                                Cerrar Sesión
                            </button>
                        </form>
                    @elseif(Route::has('login') && !Auth::check())
                        <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('login') }}">Login</a>
                        <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('register') }}">Regístrate</a>
                    @endif
                </nav>
            </div>
        </header>
        <main class="sm:container sm:mx-auto mx-0 flex-grow">
            @isset($title)
                <h2 class="font-black text-center text-3xl sm:mb-10"> {{ $title }} </h2>
            @endisset
            {{ $slot }}
        </main>
        <footer class="text-sm text-center p-5 text-gray-500 font-bold uppercase">
            Todos los derechos reservados {{ now()->year }}
        </footer>
    </body>
</html>