<div>
    <!-- Nothing worth having comes easy. - Theodore Roosevelt -->
</div><!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@isset($titlePage) {{ $titlePage }} @endisset</title>
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                        <a class="openModal hover:bg-gray-200 hidden sm:flex gap-2 py-2 px-4 rounded-lg items-center text-sm text-gray-800 hover:text-gray-950 font-semibold cursor-pointer" type="button">
                            <x-icons.add-post/> <p class="hidden sm:block">Crear</p>
                        </a>
                        <a class="text-gray-600 hidden sm:block text-sm" href="{{ route('post', auth()->user()->username) }}">
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
        <main class="sm:container 2xl:max-w-7xl sm:mx-auto mx-0 flex-grow">
            @isset($title)
                <h2 class="font-black text-center text-3xl sm:mb-10 mt-5"> {{ $title }} </h2>
            @endisset
            {{ $slot }}
            @if (Auth::check())
                <x-div-modal/>
            @endif
        </main>
        <footer class="text-sm text-center sm:p-5 text-gray-500 font-bold uppercase">
            @if (Auth::check())
                <header class="sm:p-5 px-4 border-t bg-white block sm:hidden">
                    <div class="sm:container sm:mx-auto mx-0 flex justify-center items-center">
                        <a class="openModal flex gap-2 py-2 px-4 rounded-lg items-center text-sm text-gray-800 hover:text-gray-950 font-semibold cursor-pointer" type="button">
                            <x-icons.add-post/> <p class="hidden sm:block">Crear</p>
                        </a>
                    </div>
                </header>
                <p class="hidden sm:block">Todos los derechos reservados {{ now()->year }}</p>
            @else
                Todos los derechos reservados {{ now()->year }}
            @endif
        </footer>
    </body>
</html>
