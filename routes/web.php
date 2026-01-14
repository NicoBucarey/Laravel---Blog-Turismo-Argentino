<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;

/**
 * Rutas públicas
 */
// Home
Route::get('/', [HomeController::class, 'getHome'])->name('home');

// Categorías
Route::get('/categories', [CategoryController::class, 'getIndex'])->name('categories.index');
Route::get('/category/show/{id}', [CategoryController::class, 'getShow'])->name('category.show');

// Ver post individual
Route::get('/posts/show/{id}', [CategoryController::class, 'getShowPost'])->name('posts.show');


Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [HomeController::class, 'getHome'])
        ->middleware(['verified'])
        ->name('dashboard');

    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Crear posts
    Route::get('/posts/create', [CategoryController::class, 'create'])->name('posts.create');
    Route::post('/posts/store', [CategoryController::class, 'store'])->name('posts.store');

    
    Route::get('/posts/edit/{id}', [CategoryController::class, 'getEdit'])->name('posts.edit');
    Route::put('/posts/update/{id}', [CategoryController::class, 'update'])->name('posts.update');
    Route::delete('/posts/delete/{id}', [CategoryController::class, 'destroy'])->name('posts.destroy')->middleware('auth');

});

require __DIR__.'/auth.php';
