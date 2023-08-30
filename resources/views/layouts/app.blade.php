<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        @vite('resources/css/app.css')
    </head>
    <body>
        <nav>
            <a href="/">Princpal</a>
            <a href="/nosotros">Nosotros</a>
            <a href="/tienda">Tienda</a>
        </nav>
        <h1>@yield('titulo')</h1>
        <hr>
        @yield('contenido')
    </body>
</html>
