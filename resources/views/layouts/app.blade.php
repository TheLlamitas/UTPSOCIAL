<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    </head>
    <body class=" bg-gray-100">
        <header class="sm:p-5 p-3 border-b bg-white shadow">
            <div class="sm:container sm:mx-auto mx-0 flex justify-between items-center">
                <img class="max-h-10" src="{{ asset('img/utp.png') }}" alt="Logo UTP">
                <h1 class="text-3xl font-black hidden sm:block">
                    UTP Social
                </h1>
                <nav class="flex gap-2 items-center">
                    @if (Route::has('login') && Auth::check())
                        <a class="text-gray-600 text-sm" href="#">
                            Hola, {{ auth()->user()->username }}
                        </a>
                        <form action="{{ route('logout') }}" method="post">
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
        <main class="sm:container sm:mx-auto mx-0 sm:mt-10 mt-3">
            <h2 class="font-black text-center text-3xl sm:mb-10">@yield('titulo')</h2>
            @yield('contenido')
        </main>
        <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">
            Todos los derechos reservados {{ now()->year }}
        </footer>
    </body>
</html>
