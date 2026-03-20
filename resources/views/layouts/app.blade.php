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
    .mobile-menu {
        display: none;
    }
    .mobile-menu.active {
        display: block;
    }
    @media (max-width: 768px) {
        .nav-desktop {
            display: none;
        }
        .mobile-menu-btn {
            display: block;
        }
    }
    @media (min-width: 769px) {
        .mobile-menu-btn {
            display: none;
        }
    }
</style>
</head>
    <body class="flex flex-col min-h-full bg-gray-100 text-gray-800">

<nav class="fixed top-0 left-0 right-0 bg-white shadow z-50 relative">
        <div class="px-4 py-4">
            <div class="flex justify-between items-center">
                <!-- Nombre del Blog -->
                <a href="/" class="text-xl md:text-2xl font-bold text-blue-600 whitespace-nowrap">Explorando Argentina</a>
                
                <!-- Botón mobile menu -->
                <button class="mobile-menu-btn text-gray-600 focus:outline-none" onclick="toggleMobileMenu()">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                
                <!-- Navegación Desktop -->
                <ul class="nav-desktop flex space-x-4 md:space-x-6 items-center">
                    <li><a href="/" class="text-sm md:text-base hover:text-blue-500">Inicio</a></li>
                    @auth
                        <li><a href="/posts/create" class="text-sm md:text-base hover:text-blue-500">Agregar Post</a></li>
                        <li>
                            <form action="/logout" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="text-sm md:text-base hover:text-red-500">Salir</button>
                            </form>
                        </li>
                    @else
                        <li><a href="/login" class="text-sm md:text-base hover:text-blue-500">Iniciar sesión</a></li>
                        <li><a href="/register" class="text-sm md:text-base hover:text-blue-500">Registrarse</a></li>
                    @endauth
                </ul>
            </div>
            
            <!-- Navegación Mobile -->
            <div id="mobileMenu" class="mobile-menu mt-4 pb-4 border-t border-gray-200">
                <ul class="flex flex-col space-y-3 pt-4">
                    <li><a href="/" class="block text-gray-700 hover:text-blue-500">Inicio</a></li>
                    @auth
                        <li><a href="/posts/create" class="block text-gray-700 hover:text-blue-500">Agregar Post</a></li>
                        <li>
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="w-full text-left text-gray-700 hover:text-red-500">Cerrar sesión</button>
                            </form>
                        </li>
                    @else
                        <li><a href="/login" class="block text-gray-700 hover:text-blue-500">Iniciar sesión</a></li>
                        <li><a href="/register" class="block text-gray-700 hover:text-blue-500">Registrarse</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido de cada página -->
<main class="flex-1 {{ View::hasSection('fullwidth') ? '' : 'container mx-auto px-4' }} mt-20 md:mt-24">
    @yield('content')
</main>
    @include('partials.footer')
    
    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('active');
        }
    </script>
    @stack('scripts')
</body>
</html>