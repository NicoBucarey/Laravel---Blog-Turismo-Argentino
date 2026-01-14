@extends('layouts.app')

@section('title', 'Agregar nuevo post')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-6">Agregar nuevo post</h1>

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block font-semibold mb-1">Título</label>
            <input type="text" name="title" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Resumen</label>
            <textarea name="excerpt" class="w-full border rounded p-2" rows="2"></textarea>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Contenido</label>
            <textarea name="content" class="w-full border rounded p-3" rows="8" required></textarea>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Categoría</label>
            <select name="category_id" class="w-full border rounded p-2" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Imagen principal (URL)</label>
            <input type="text" name="image_main" class="w-full border rounded p-2">
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Imagen adicional 1 (URL)</label>
            <input type="text" name="image_2" class="w-full border rounded p-2">
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Imagen adicional 2 (URL)</label>
            <input type="text" name="image_3" class="w-full border rounded p-2">
        </div>
        <div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Guardar Post
            </button>
        </div>
    </form>
</div>
@endsection
