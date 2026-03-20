@extends('layouts.app')

@section('title', 'Inicio - Explorando Argentina')

@section('content')
    {{-- Imagen destacada / banner --}}
    <div class="relative mb-8 md:mb-12 -mx-4 md:mx-0 md:rounded-lg md:shadow">
        <img src="{{ asset('images/portada.jpg') }}" 
             alt="Cataratas del Iguazú" 
             class="w-full h-48 sm:h-64 md:h-96 object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
            <h1 class="text-white text-2xl sm:text-4xl md:text-6xl lg:text-7xl font-bold text-center px-4">Explorando Argentina</h1>
        </div>
    </div>

    {{-- Descripción breve --}}
    <div class="mt-6 md:mt-10 text-center max-w-3xl mx-auto px-4 md:px-6">
        <h2 class="text-2xl sm:text-3xl md:text-4xl font-semibold mb-4 md:mb-6 text-gray-800">Descubrí los destinos más increíbles del país</h2>
        <p class="text-sm sm:text-base md:text-lg text-gray-700 mb-6 md:mb-8 leading-relaxed">
            Este blog turístico te invita a recorrer las maravillas de Argentina, organizadas por regiones como la Patagonia, el Litoral, el Norte y más. Encontrarás lugares destacados, recomendaciones, fotos y mucha inspiración para tu próxima aventura.
        </p>

        <a href="{{ route('categories.index') }}"
           class="inline-block bg-gradient-to-r from-blue-800 to-blue-600 text-white px-6 sm:px-10 md:px-16 py-2 md:py-3 rounded-full shadow-lg hover:from-blue-700 hover:to-blue-900 transform hover:scale-105 transition duration-300 font-semibold text-sm md:text-base">
            <img src="{{ asset('favicon.jpg') }}" alt="Argentina" class="inline w-5 h-5 md:w-6 md:h-6 mr-2">
            Ver regiones turísticas
        </a>
    </div>
@endsection
