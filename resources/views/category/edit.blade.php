@extends('layouts.app')

@section('title', 'Editar post: ' . $post->title)

@section('content')
<article class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow">

    <h1 class="text-3xl font-bold mb-6">Editar post</h1>

    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Título -->
        <div>
            <label for="title" class="block font-semibold mb-1">Título</label>
            <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}"
                class="w-full border rounded px-3 py-2 @error('title') border-red-500 @enderror">
            @error('title')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Categoría -->
        <div>
            <label for="category_id" class="block font-semibold mb-1">Categoría</label>
            <select name="category_id" id="category_id"
                class="w-full border rounded px-3 py-2 @error('category_id') border-red-500 @enderror">
                <option value="">Selecciona una categoría</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Extracto -->
        <div>
            <label for="excerpt" class="block font-semibold mb-1">Extracto</label>
            <textarea name="excerpt" id="excerpt" rows="3"
                class="w-full border rounded px-3 py-2 @error('excerpt') border-red-500 @enderror">{{ old('excerpt', $post->excerpt) }}</textarea>
            @error('excerpt')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Contenido -->
        <div>
            <label for="content" class="block font-semibold mb-1">Contenido</label>
            <textarea name="content" id="content" rows="8"
                class="w-full border rounded px-3 py-2 @error('content') border-red-500 @enderror">{{ old('content', $post->content) }}</textarea>
            @error('content')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Imagen principal -->
        <div>
            <label class="block font-semibold mb-1">Imagen principal actual</label>
            @if($post->image_main)
                <img src="{{ asset($post->image_main) }}" alt="Imagen principal" class="mb-3 w-full max-w-sm rounded shadow">
            @else
                <p class="mb-3 italic text-gray-500">No hay imagen principal subida.</p>
            @endif
            <label for="image_main" class="block font-semibold mb-1">Cambiar imagen principal</label>
            <input type="file" name="image_main" id="image_main" accept="image/*" class="w-full">
            @error('image_main')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Imagen adicional 1 -->
        <div>
            <label class="block font-semibold mb-1">Imagen adicional 1 actual</label>
            @if($post->image_2)
                <img src="{{ asset($post->image_2) }}" alt="Imagen adicional 1" class="mb-3 w-full max-w-sm rounded shadow">
            @else
                <p class="mb-3 italic text-gray-500">No hay imagen adicional 1 subida.</p>
            @endif
            <label for="image_2" class="block font-semibold mb-1">Cambiar imagen adicional 1</label>
            <input type="file" name="image_2" id="image_2" accept="image/*" class="w-full">
            @error('image_2')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Imagen adicional 2 -->
        <div>
            <label class="block font-semibold mb-1">Imagen adicional 2 actual</label>
            @if($post->image_3)
                <img src="{{ asset($post->image_3) }}" alt="Imagen adicional 2" class="mb-3 w-full max-w-sm rounded shadow">
            @else
                <p class="mb-3 italic text-gray-500">No hay imagen adicional 2 subida.</p>
            @endif
            <label for="image_3" class="block font-semibold mb-1">Cambiar imagen adicional 2</label>
            <input type="file" name="image_3" id="image_3" accept="image/*" class="w-full">
            @error('image_3')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Botones -->
        <div class="flex justify-between items-center mt-8">
            <a href="{{ route('posts.show', $post->id) }}"
               class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded transition">
                Cancelar
            </a>
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded transition">
                Guardar cambios
            </button>
        </div>

    </form>
</article>
@endsection
