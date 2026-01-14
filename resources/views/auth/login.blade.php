@extends('layouts.app')

@section('title', 'Iniciar sesión')

@section('content')
<div class="max-w-md mx-auto mt-12 bg-white p-6 rounded-lg shadow">
    <h1 class="text-2xl font-bold mb-6 text-center">Iniciar sesión</h1>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block font-semibold mb-1">Correo electrónico</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                   class="w-full border px-3 py-2 rounded @error('email') border-red-500 @enderror">
            @error('email')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="block font-semibold mb-1">Contraseña</label>
            <input id="password" type="password" name="password" required
                   class="w-full border px-3 py-2 rounded @error('password') border-red-500 @enderror">
            @error('password')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        

        <!-- Botón -->
        <div>
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded">
                Iniciar sesión
            </button>
        </div>
    </form>
</div>
@endsection
