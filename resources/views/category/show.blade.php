@extends('layouts.app')

@section('title', 'Posts en ' . $category->name)

@section('content')
    <div class="px-4 md:px-0">
        <!-- Breadcrumb -->
        <nav class="mb-6 md:mb-8 text-xs md:text-sm">
            <div class="flex items-center space-x-2 text-gray-600">
                <a href="/" class="text-blue-600 hover:text-blue-700 font-semibold">Inicio</a>
                <span class="text-gray-400">›</span>
                <a href="{{ route('categories.index') }}" class="text-blue-600 hover:text-blue-700 font-semibold">Categorías</a>
                <span class="text-gray-400">›</span>
                <span class="text-gray-700 font-semibold">{{ $category->name }}</span>
            </div>
        </nav>

        <!-- Encabezado con color de categoría -->
        @php
            $colors = \App\Helpers\CategoryHelper::getCategoryColor($category->id);
        @endphp
        
        <div class="{{ $colors['bg'] }} {{ $colors['text'] }} rounded-lg p-6 md:p-8 mb-8 md:mb-10 border-l-4 {{ str_replace('bg-', 'border-', $colors['badge']) == 'border-blue-500' ? 'border-blue-500' : (str_replace('bg-', 'border-', $colors['badge']) == 'border-purple-500' ? 'border-purple-500' : (str_replace('bg-', 'border-', $colors['badge']) == 'border-green-500' ? 'border-green-500' : (str_replace('bg-', 'border-', $colors['badge']) == 'border-yellow-500' ? 'border-yellow-500' : (str_replace('bg-', 'border-', $colors['badge']) == 'border-orange-500' ? 'border-orange-500' : 'border-red-500')))) }}">
            <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-2">Posts en {{ $category->name }}</h1>
            <p class="text-sm md:text-base opacity-90">{{ $category->description }}</p>
        </div>

        @forelse($category->posts as $post)
            <a href="{{ url('/posts/show/' . $post->id) }}" class="block mb-6 md:mb-8 bg-white rounded-lg shadow-md hover:shadow-xl transition-all overflow-hidden group">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-0">
                    <!-- Imagen -->
                    <div class="md:col-span-1 overflow-hidden h-40 md:h-56 relative">
                        @if($post->image_main)
                            <img src="{{ asset($post->image_main) }}" 
                                 alt="{{ $post->title }}" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        @else
                            <div class="w-full h-full {{ $colors['bg'] }} flex items-center justify-center">
                                <span class="text-4xl">📍</span>
                            </div>
                        @endif
                        <!-- Badge de categoría -->
                        <div class="{{ $colors['badge'] }} text-white px-3 py-1 rounded-full text-xs font-semibold absolute top-3 right-3">
                            {{ $category->name }}
                        </div>
                    </div>
                    
                    <!-- Contenido -->
                    <div class="md:col-span-2 p-5 md:p-6 flex flex-col justify-between">
                        <div>
                            <h2 class="text-lg sm:text-xl md:text-2xl font-semibold text-blue-600 mb-2 group-hover:text-blue-700 transition">{{ $post->title }}</h2>
                            <p class="text-xs sm:text-sm text-gray-500 mb-3">📅 Publicado: {{ $post->created_at ? $post->created_at->format('d/m/Y') : 'N/A' }}</p>
                            <p class="text-sm sm:text-base text-gray-700 leading-relaxed mb-4">{{ $post->excerpt ?? Str::limit($post->content, 150) }}</p>
                        </div>
                        <div class="text-blue-600 font-semibold text-sm md:text-base inline-block group-hover:translate-x-1 transition">
                            Leer más →
                        </div>
                    </div>
                </div>
            </a>
        @empty
            <div class="bg-white p-8 rounded-lg shadow text-center">
                <p class="text-gray-600 text-lg">No hay posts en esta categoría todavía.</p>
            </div>
        @endforelse

        <!-- Botón volver atrás al final -->
        <div class="border-t border-gray-200 pt-6 mt-8 md:mt-10">
            <a href="{{ route('categories.index') }}" 
               class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition text-sm md:text-base font-semibold">
                ← Volver a categorías
            </a>
        </div>
    </div>
@endsection
