<!DOCTYPE html>
<html lang="es" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog de Turismo')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
<link rel="icon" href="{{ asset('favicon.jpg') }}" type="image/png">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    body {
        font-family: 'Open Sans', sans-serif;
    }
    h1, h2, h3, .font-title {
        font-family: 'Playfair Display', serif;
    }
</style>
</head>
    <body class="flex flex-col min-h-full bg-gray-100 text-gray-800">

<nav class="fixed top-0 left-0 right-0 bg-white shadow p-4 z-50">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Nombre del Blog -->
            <a href="/" class="text-2xl font-bold text-blue-600">Explorando Argentina</a>
            <!-- Navegación -->
            <ul class="flex space-x-6 items-center">
                <li><a href="/" class="hover:text-blue-500">Inicio</a></li>
                <!-- Secciones visibles solo si el usuario está autenticado -->
                @auth
                    <li><a href="/posts/create" class="hover:text-blue-500">Agregar Post</a></li>
                    <li>
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="hover:text-red-500">Cerrar sesión</button>
                        </form>
                    </li>
                @else
                    <li><a href="/login" class="hover:text-blue-500">Iniciar sesión</a></li>
                    <li><a href="/register" class="hover:text-blue-500">Registrarse</a></li>
                @endauth
            </ul>
        </div>
    </nav>

    <!-- Contenido de cada página -->
<main class="flex-1 {{ View::hasSection('fullwidth') ? '' : 'container mx-auto' }} mt-24">
    @yield('content')
</main>
    @include('partials.footer')
    @stack('scripts')
</body>
</html>