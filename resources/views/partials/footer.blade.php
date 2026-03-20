<footer class="bg-gray-900 text-gray-300 mt-16 py-12 border-t border-gray-700 shadow-inner">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
            <!-- Sobre nosotros -->
            <div>
                <h4 class="text-white font-bold text-lg mb-4">Explorando Argentina</h4>
                <p class="text-sm leading-relaxed text-gray-400">
                    Tu guía completa para descubrir los destinos turísticos más increíbles de Argentina, organizados por regiones.
                </p>
            </div>

            <!-- Enlaces rápidos -->
            <div>
                <h4 class="text-white font-bold text-lg mb-4">Enlaces rápidos</h4>
                <ul class="text-sm space-y-2">
                    <li><a href="/" class="text-gray-400 hover:text-white transition">Inicio</a></li>
                    <li><a href="{{ route('categories.index') }}" class="text-gray-400 hover:text-white transition">Categorías</a></li>
                    @auth
                        <li><a href="/posts/create" class="text-gray-400 hover:text-white transition">Agregar Post</a></li>
                    @endauth
                </ul>
            </div>

            <!-- Regiones Destacadas -->
            <div>
                <h4 class="text-white font-bold text-lg mb-4">Regiones</h4>
                <ul class="text-sm space-y-2">
                    <li><a href="{{ route('category.show', 1) }}" class="text-gray-400 hover:text-white transition">Patagonia</a></li>
                    <li><a href="{{ route('category.show', 2) }}" class="text-gray-400 hover:text-white transition">Cuyo</a></li>
                    <li><a href="{{ route('category.show', 3) }}" class="text-gray-400 hover:text-white transition">Litoral</a></li>
                    <li><a href="{{ route('category.show', 5) }}" class="text-gray-400 hover:text-white transition">Noroeste</a></li>
                </ul>
            </div>

            <!-- Newsletter / Contacto -->
            <div>
                <h4 class="text-white font-bold text-lg mb-4">Más regiones</h4>
                <ul class="text-sm space-y-2">
                    <li><a href="{{ route('category.show', 4) }}" class="text-gray-400 hover:text-white transition">Pampeana</a></li>
                    <li><a href="{{ route('category.show', 6) }}" class="text-gray-400 hover:text-white transition">Noreste</a></li>
                </ul>
            </div>
        </div>

        <!-- Divider -->
        <div class="border-t border-gray-700 pt-8">
            <div class="flex flex-col sm:flex-row justify-between items-center">
                <p class="text-sm text-gray-400">&copy; {{ date('Y') }} Explorando Argentina. Todos los derechos reservados.</p>
                <p class="text-sm text-gray-500 mt-4 sm:mt-0">Hecho con ❤️ para los viajeros argentinos</p>
            </div>
        </div>
    </div>
</footer>

