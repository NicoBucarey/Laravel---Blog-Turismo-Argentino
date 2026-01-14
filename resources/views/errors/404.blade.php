{{-- resources/views/errors/404.blade.php --}}
@extends('layouts.app')

@section('title', 'Página no encontrada')
@section('fullwidth', true)

@section('content')
<div class="flex flex-col items-center justify-center py-24 px-4 text-center">
    <!-- Número 404 grande y en rojo -->
    <div class="text-red-600 font-extrabold text-[120px] md:text-[160px] leading-none drop-shadow-lg">
        404
    </div>

    <!-- Mensaje principal -->
    <h2 class="text-2xl md:text-3xl font-semibold text-gray-800 mb-2">
        Página no encontrada.
    </h2>

    <!-- Descripción secundaria -->
    <p class="text-gray-600 mb-6 max-w-md">
        La página que estás buscando no existe o ha sido movida. 
        Verificá la dirección o volvé al inicio.
    </p>

    <!-- Botón para volver -->
    <a href="{{ route('home') }}"
       class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-lg shadow transition">
        ← Volver al inicio
    </a>
</div>
@endsection
