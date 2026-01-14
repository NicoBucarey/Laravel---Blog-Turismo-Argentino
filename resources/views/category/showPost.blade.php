@extends('layouts.app')

@section('title', $post->title)

@section('content')
<article class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow">

    <!-- Imagen principal -->
    @if ($post->image_main)
        <img src="{{ asset($post->image_main) }}" alt="{{ $post->title }}" class="w-full h-72 object-cover rounded mb-6">
    @endif

    <!-- Título -->
    <h1 class="text-4xl font-bold text-blue-800 mb-2">{{ $post->title }}</h1>

    <!-- Meta info -->
    <p class="text-sm text-gray-500 mb-4">
        
        Categoría: 
        <a href="{{ route('category.show', $post->category->id) }}" class="text-blue-600 hover:underline">
            {{ $post->category->name }}
        </a> |
       
    </p>

    <!-- Resumen -->
    <p class="text-lg text-gray-700 italic mb-6">{{ $post->excerpt }}</p>

    <!-- Contenido -->
    <div class="prose prose-lg text-gray-800 mb-8">
        {!! nl2br(e($post->content)) !!}
    </div>

    <!-- Galería adicional -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
    @if ($post->image_2)
        <img src="{{ asset($post->image_2) }}" alt="Imagen adicional 1" class="w-full h-64 object-cover rounded shadow">
    @endif
    @if ($post->image_3)
        <img src="{{ asset($post->image_3) }}" alt="Imagen adicional 2" class="w-full h-64 object-cover rounded shadow">
    @endif
</div>

@auth
<div class="mt-6 mb-4 flex items-center gap-4">
    <!-- Botón editar -->
    <a href="{{ route('posts.edit', $post->id) }}" 
       class="inline-block bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded transition">
        ✏️ Editar post
    </a>

    <!-- Botón eliminar -->
    <form id="delete-post-form" action="{{ route('posts.destroy', $post->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="button" id="delete-button" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded transition">
        🗑️ Eliminar
    </button>
</form>

</div>
@endauth

    <!-- Botón volver -->
    <div>
        <a href="{{ route('category.show', $post->category->id) }}" 
           class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition">
            ← Volver a la categoría
        </a>
    </div>

</article>
<script>
document.getElementById('delete-button').addEventListener('click', function () {
    Swal.fire({
        title: '¿Estás seguro?',
        text: 'Esta acción eliminará el post permanentemente.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e3342f',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-post-form').submit();
        }
    });
});
</script>

@endsection
