@extends('layouts.app')

@section('title', 'Inicio - Explorando Argentina')

@section('content')
    {{-- Imagen destacada / banner --}}
    <div class="relative">
        <img src="{{ asset('images/portada.jpg') }}" 
             alt="Cataratas del Iguazú" 
             class="w-full h-96 object-cover rounded-lg shadow">
        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
            <h1 class="text-white text-4xl md:text-7xl font-bold text-center">Explorando Argentina</h1>
        </div>
    </div>

    {{-- Descripción breve --}}
    <div class="mt-10 text-center max-w-2xl mx-auto">
        <h2 class="text-3xl font-semibold mb-4">Descubrí los destinos más increíbles del país</h2>
        <p class="text-gray-700 mb-6">
            Este blog turístico te invita a recorrer las maravillas de Argentina, organizadas por regiones como la Patagonia, el Litoral, el Norte y más. Encontrarás lugares destacados, recomendaciones, fotos y mucha inspiración para tu próxima aventura.
        </p>

<a href="{{ route('categories.index') }}"
   class="inline-block bg-gradient-to-r from-blue-800 to-blue-600 text-white px-16 py-3 rounded-full shadow-lg hover:from-blue-700 hover:to-blue-900 transform hover:scale-105 transition duration-300 font-semibold">
    <img src="{{ asset('favicon.jpg') }}" alt="Argentina" class="inline w-6 h-6 mr-2">
    Ver regiones turísticas
</a>

    </div>
@endsection
