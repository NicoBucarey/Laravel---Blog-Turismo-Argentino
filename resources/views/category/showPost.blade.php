@extends('layouts.app')

@section('title', $post->title)

@section('content')
<article class="max-w-4xl mx-auto bg-white p-4 md:p-8 rounded-lg shadow px-4 md:px-0">

    <!-- Imagen principal -->
    @if ($post->image_main)
        <img src="{{ asset($post->image_main) }}" alt="{{ $post->title }}" class="w-full h-40 sm:h-60 md:h-80 object-cover rounded-lg mb-6 shadow-md">
    @endif

    <!-- Título -->
    <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-blue-800 mb-2 md:mb-4">{{ $post->title }}</h1>

    <!-- Meta info -->
    <p class="text-xs sm:text-sm text-gray-500 mb-4 md:mb-6">
        Categoría: 
        <a href="{{ route('category.show', $post->category->id) }}" class="text-blue-600 hover:underline font-semibold">
            {{ $post->category->name }}
        </a>
    </p>

    <!-- Resumen -->
    <p class="text-base sm:text-lg md:text-xl text-gray-700 italic mb-6 md:mb-8 leading-relaxed">{{ $post->excerpt }}</p>

    <!-- Contenido -->
    <div class="prose prose-sm sm:prose md:prose-lg max-w-none text-gray-800 mb-8 md:mb-10 leading-relaxed">
        {!! nl2br(e($post->content)) !!}
    </div>

    <!-- Galería adicional -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8 md:mb-10">
        @if ($post->image_2)
            <img src="{{ asset($post->image_2) }}" alt="Imagen adicional 1" class="w-full h-40 sm:h-48 md:h-64 object-cover rounded-lg shadow-md">
        @endif
        @if ($post->image_3)
            <img src="{{ asset($post->image_3) }}" alt="Imagen adicional 2" class="w-full h-40 sm:h-48 md:h-64 object-cover rounded-lg shadow-md">
        @endif
    </div>

@auth
<div class="mt-8 md:mt-10 mb-6 flex flex-col sm:flex-row gap-3 items-start sm:items-center border-t border-gray-200 pt-6">
    <!-- Botón editar -->
    <a href="{{ route('posts.edit', $post->id) }}" 
       class="inline-block bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition text-sm md:text-base font-semibold">
        ✏️ Editar post
    </a>

    <!-- Botón eliminar -->
    <form id="delete-post-form" action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
    @csrf
    @method('DELETE')
    <button type="button" id="delete-button" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition text-sm md:text-base font-semibold">
        🗑️ Eliminar
    </button>
</form>

</div>

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
@endauth

    <!-- Botón volver -->
    <div class="border-t border-gray-200 pt-6">
        <a href="{{ route('category.show', $post->category->id) }}" 
           class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition text-sm md:text-base font-semibold">
            ← Volver a {{ $post->category->name }}
        </a>
    </div>

</article>

@endsection
