@extends('layouts.app')

@section('title', 'Posts en ' . $category->name)

@section('content')
    <div class="px-4 md:px-0">
        <!-- Botón volver atrás -->
        <div class="mb-6 md:mb-8">
            <a href="{{ route('categories.index') }}" 
               class="inline-flex items-center bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg transition text-sm md:text-base font-semibold">
                ← Volver a categorías
            </a>
        </div>

        <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-2 text-gray-800">Posts en {{ $category->name }}</h1>
        <p class="text-gray-600 mb-6 md:mb-8 text-sm md:text-base">{{ $category->description }}</p>

        @forelse($category->posts as $post)
            <a href="{{ url('/posts/show/' . $post->id) }}" class="block mb-4 md:mb-6 p-4 md:p-6 bg-white shadow-md rounded-lg hover:shadow-xl transition-all transform hover:scale-102 duration-300">
                <h2 class="text-lg sm:text-xl md:text-2xl font-semibold text-blue-600 mb-2 hover:text-blue-700">{{ $post->title }}</h2>
                <p class="text-xs sm:text-sm text-gray-500 mb-3">Publicado: {{ $post->created_at ? $post->created_at->format('d/m/Y') : 'N/A' }}</p>
                <p class="mt-2 text-sm sm:text-base text-gray-700 leading-relaxed">{{ $post->excerpt ?? Str::limit($post->content, 150) }}</p>
                <div class="mt-4 text-blue-600 font-semibold text-sm md:text-base inline-block">
                    Leer más →
                </div>
            </a>
        @empty
            <div class="bg-white p-8 rounded-lg shadow text-center">
                <p class="text-gray-600 text-lg">No hay posts en esta categoría todavía.</p>
            </div>
        @endforelse
    </div>
@endsection
