<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;

// Endpoint para ejecutar migrations
Route::get('/run-migrations', function () {
    try {
        \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
        return 'Migrations ejecutadas';
    } catch (\Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
});

// Endpoint para configurar BD completamente
Route::get('/setup-database', function () {
    try {
        \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
        
        // Insertar datos de ejemplo usando Eloquent
        $categories = [
            ['name' => 'Patagonia', 'description' => 'Región del sur argentino con montañas, lagos y glaciares.'],
            ['name' => 'Cuyo', 'description' => 'Tierra del vino y la cordillera en el oeste argentino.'],
            ['name' => 'Litoral', 'description' => 'Ríos, selvas y cataratas en el noreste del país.'],
            ['name' => 'Pampeana', 'description' => 'Llanuras fértiles, estancias y tradición gaucha.'],
            ['name' => 'Noroeste', 'description' => 'Paisajes áridos, salares, quebradas y cultura andina.'],
            ['name' => 'Noreste', 'description' => 'Clima cálido, ríos y gran diversidad natural.']
        ];
        
        foreach ($categories as $catData) {
            \App\Models\Category::firstOrCreate(['name' => $catData['name']], $catData);
        }
        
        // Insertar posts de ejemplo
        $posts = [
            ['title' => 'Glaciar Perito Moreno', 'slug' => 'glaciar-perito-moreno', 'category_id' => 1, 'excerpt' => 'Un impresionante glaciar', 'published' => 1],
            ['title' => 'Cataratas del Iguazú', 'slug' => 'cataratas-iguazu', 'category_id' => 3, 'excerpt' => 'Maravilla natural', 'published' => 1],
            ['title' => 'Aconcagua', 'slug' => 'aconcagua', 'category_id' => 2, 'excerpt' => 'Cerro más alto de América', 'published' => 1]
        ];
        
        foreach ($posts as $postData) {
            \App\Models\Post::firstOrCreate(['slug' => $postData['slug']], $postData);
        }
        
        return response()->json(['success' => 'Base de datos configurada correctamente', 'database' => env('DB_CONNECTION')]);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage(), 'line' => $e->getLine(), 'file' => $e->getFile()], 500);
    }
});

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
