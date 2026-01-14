@extends('layouts.app')

@section('title', 'Posts en ' . $category->name)

@section('content')
    <h1 class="text-2xl font-bold mb-4">Posts en {{ $category->name }}</h1>

    @forelse($category->posts as $post)
        <a href="{{ url('/posts/show/' . $post->id) }}" class="block mb-6 p-4 bg-white shadow rounded hover:shadow-lg transition hover:bg-gray-50">
    <h2 class="text-xl font-semibold text-blue-600 mb-1">{{ $post->title }}</h2>
    <p class="text-sm text-gray-600">Publicado: {{ $post->created_at->format('d/m/Y') }}</p>
    <p class="mt-2 text-gray-700">{{ Str::limit($post->content, 150) }}</p>
</a>

    @empty
        <p>No hay posts en esta categoría todavía.</p>
    @endforelse
@endsection
