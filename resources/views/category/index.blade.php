@extends('layouts.app')

@section('title', 'Categorías')

@section('content')
    <h1 class="text-3xl font-bold mb-6 text-center">Regiones Turísticas de Argentina</h1>

    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach($categories as $category)
            <a href="{{ route('category.show', $category->id) }}" class="block bg-white rounded-lg shadow hover:shadow-lg transition p-4">
                <h2 class="text-xl font-semibold text-blue-600 mb-2">{{ $category->name }}</h2>
                <p class="text-gray-700">
                    {{ $category->description ?? 'Explorá esta región y descubrí sus principales atractivos turísticos.' }}
                </p>
            </a>
        @endforeach
    </div>
@endsection
