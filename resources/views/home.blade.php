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
    <div class="mt-6 md:mt-10 text-center max-w-3xl mx-auto px-4 md:px-6 mb-12 md:mb-16">
        <h2 class="text-2xl sm:text-3xl md:text-4xl font-semibold mb-4 md:mb-6 text-gray-800">Descubrí los destinos más increíbles del país</h2>
        <p class="text-sm sm:text-base md:text-lg text-gray-700 mb-6 md:mb-8 leading-relaxed">
            Este blog turístico te invita a recorrer las maravillas de Argentina, organizadas por regiones como la Patagonia, el Litoral, el Norte y más. Encontrarás lugares destacados, recomendaciones, fotos y mucha inspiración para tu próxima aventura.
        </p>
    </div>

    {{-- Grid de Categorías --}}
    <div class="px-4 md:px-0 mb-12 md:mb-16">
        <h3 class="text-2xl md:text-3xl font-bold text-center mb-8 md:mb-10 text-gray-800">Explora nuestras regiones</h3>
        
        <div class="grid gap-6 sm:gap-8 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
            {{-- Patagonia --}}
            <a href="{{ route('category.show', 1) }}" class="group overflow-hidden rounded-lg shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                <div class="relative overflow-hidden h-48 sm:h-56 md:h-64">
                    <img src="{{ asset('images/patagonia11.jpg') }}" 
                         alt="Patagonia" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                    <div class="absolute inset-0 bg-black bg-opacity-30 group-hover:bg-opacity-40 transition-all duration-300"></div>
                </div>
                <div class="bg-white p-5 md:p-6">
                    <h4 class="text-lg md:text-xl font-bold text-blue-600 mb-2">Patagonia</h4>
                    <p class="text-sm md:text-base text-gray-700 leading-relaxed mb-4">Región del sur argentino con montañas, lagos y glaciares.</p>
                    <div class="text-xs md:text-sm text-blue-600 font-semibold">3 posts</div>
                </div>
            </a>

            {{-- Cuyo --}}
            <a href="{{ route('category.show', 2) }}" class="group overflow-hidden rounded-lg shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                <div class="relative overflow-hidden h-48 sm:h-56 md:h-64">
                    <img src="{{ asset('images/cuyo11.jpg') }}" 
                         alt="Cuyo" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                    <div class="absolute inset-0 bg-black bg-opacity-30 group-hover:bg-opacity-40 transition-all duration-300"></div>
                </div>
                <div class="bg-white p-5 md:p-6">
                    <h4 class="text-lg md:text-xl font-bold text-blue-600 mb-2">Cuyo</h4>
                    <p class="text-sm md:text-base text-gray-700 leading-relaxed mb-4">Tierra del vino y la cordillera en el oeste argentino.</p>
                    <div class="text-xs md:text-sm text-blue-600 font-semibold">3 posts</div>
                </div>
            </a>

            {{-- Litoral --}}
            <a href="{{ route('category.show', 3) }}" class="group overflow-hidden rounded-lg shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                <div class="relative overflow-hidden h-48 sm:h-56 md:h-64">
                    <img src="{{ asset('images/litoral11.jpg') }}" 
                         alt="Litoral" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                    <div class="absolute inset-0 bg-black bg-opacity-30 group-hover:bg-opacity-40 transition-all duration-300"></div>
                </div>
                <div class="bg-white p-5 md:p-6">
                    <h4 class="text-lg md:text-xl font-bold text-blue-600 mb-2">Litoral</h4>
                    <p class="text-sm md:text-base text-gray-700 leading-relaxed mb-4">Ríos, selvas y cataratas en el noreste del país.</p>
                    <div class="text-xs md:text-sm text-blue-600 font-semibold">3 posts</div>
                </div>
            </a>

            {{-- Pampeana --}}
            <a href="{{ route('category.show', 4) }}" class="group overflow-hidden rounded-lg shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                <div class="relative overflow-hidden h-48 sm:h-56 md:h-64">
                    <img src="{{ asset('images/pampeana11.jpg') }}" 
                         alt="Pampeana" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                    <div class="absolute inset-0 bg-black bg-opacity-30 group-hover:bg-opacity-40 transition-all duration-300"></div>
                </div>
                <div class="bg-white p-5 md:p-6">
                    <h4 class="text-lg md:text-xl font-bold text-blue-600 mb-2">Pampeana</h4>
                    <p class="text-sm md:text-base text-gray-700 leading-relaxed mb-4">Llanuras fértiles, estancias y tradición gaucha.</p>
                    <div class="text-xs md:text-sm text-blue-600 font-semibold">3 posts</div>
                </div>
            </a>

            {{-- Noroeste --}}
            <a href="{{ route('category.show', 5) }}" class="group overflow-hidden rounded-lg shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                <div class="relative overflow-hidden h-48 sm:h-56 md:h-64">
                    <img src="{{ asset('images/noroeste21.jpg') }}" 
                         alt="Noroeste" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                    <div class="absolute inset-0 bg-black bg-opacity-30 group-hover:bg-opacity-40 transition-all duration-300"></div>
                </div>
                <div class="bg-white p-5 md:p-6">
                    <h4 class="text-lg md:text-xl font-bold text-blue-600 mb-2">Noroeste</h4>
                    <p class="text-sm md:text-base text-gray-700 leading-relaxed mb-4">Paisajes áridos, salares, quebradas y cultura andina.</p>
                    <div class="text-xs md:text-sm text-blue-600 font-semibold">3 posts</div>
                </div>
            </a>

            {{-- Noreste --}}
            <a href="{{ route('category.show', 6) }}" class="group overflow-hidden rounded-lg shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                <div class="relative overflow-hidden h-48 sm:h-56 md:h-64">
                    <img src="{{ asset('images/noreste11.jpg') }}" 
                         alt="Noreste" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                    <div class="absolute inset-0 bg-black bg-opacity-30 group-hover:bg-opacity-40 transition-all duration-300"></div>
                </div>
                <div class="bg-white p-5 md:p-6">
                    <h4 class="text-lg md:text-xl font-bold text-blue-600 mb-2">Noreste</h4>
                    <p class="text-sm md:text-base text-gray-700 leading-relaxed mb-4">Clima cálido, ríos y gran diversidad natural.</p>
                    <div class="text-xs md:text-sm text-blue-600 font-semibold">3 posts</div>
                </div>
            </a>
        </div>
    </div>
@endsection
