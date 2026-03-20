@extends('layouts.app')

@section('title', 'Categorías')

@section('content')
    <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-6 md:mb-8 text-center text-gray-800 px-4">Regiones Turísticas de Argentina</h1>

    <div class="grid gap-4 sm:gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 px-4 md:px-0">
        @foreach($categories as $category)
            <a href="{{ route('category.show', $category->id) }}" class="block bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow p-5 md:p-6 transform hover:scale-105 duration-300">
                <h2 class="text-lg sm:text-xl font-semibold text-blue-600 mb-3">{{ $category->name }}</h2>
                <p class="text-sm sm:text-base text-gray-700 leading-relaxed">
                    {{ $category->description ?? 'Explorá esta región y descubrí sus principales atractivos turísticos.' }}
                </p>
                <div class="mt-4 text-blue-600 font-semibold text-sm">
                    Ver posts →
                </div>
            </a>
        @endforeach
    </div>
@endsection
