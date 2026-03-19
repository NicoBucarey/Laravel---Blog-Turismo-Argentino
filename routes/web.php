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
        $db = \Illuminate\Support\Facades\DB::connection();
        
        // Crear tabla migrations
        $db->statement("CREATE TABLE IF NOT EXISTS migrations (
            id int unsigned AUTO_INCREMENT PRIMARY KEY,
            migration varchar(255) NOT NULL,
            batch int NOT NULL
        )");
        
        // Crear tabla categories
        $db->statement("CREATE TABLE IF NOT EXISTS categories (
            id bigint unsigned AUTO_INCREMENT PRIMARY KEY,
            name varchar(255) NOT NULL,
            description varchar(255),
            created_at timestamp NULL,
            updated_at timestamp NULL
        )");
        
        // Crear tabla posts
        $db->statement("CREATE TABLE IF NOT EXISTS posts (
            id bigint unsigned AUTO_INCREMENT PRIMARY KEY,
            title varchar(255) NOT NULL,
            excerpt varchar(255),
            content text,
            image_main varchar(255),
            image_2 varchar(255),
            image_3 varchar(255),
            slug varchar(255) NOT NULL UNIQUE,
            published tinyint DEFAULT 1,
            category_id bigint unsigned NOT NULL,
            created_at timestamp NULL,
            updated_at timestamp NULL,
            KEY category_id (category_id)
        )");
        
        // Insertar categorías
        $categories = [
            ['Patagonia', 'Región del sur argentino'],
            ['Cuyo', 'Tierra del vino'],
            ['Litoral', 'Ríos y cataratas'],
            ['Pampeana', 'Llanuras fértiles'],
            ['Noroeste', 'Paisajes áridos'],
            ['Noreste', 'Clima cálido']
        ];
        
        foreach ($categories as $i => $cat) {
            $db->statement("INSERT IGNORE INTO categories (id, name, description) VALUES (?, ?, ?)", [$i+1, $cat[0], $cat[1]]);
        }
        
        // Insertar posts
        $db->statement("INSERT IGNORE INTO posts (title, excerpt, slug, category_id, published) VALUES 
            ('Glaciar Perito Moreno', 'Un glaciar impresionante', 'glaciar-perito-moreno', 1, 1),
            ('Cataratas del Iguazú', 'Maravilla natural', 'cataratas-iguazu', 3, 1),
            ('Aconcagua', 'Cerro más alto', 'aconcagua', 2, 1)
        ");
        
        // Insertar migrations
        $db->statement("INSERT IGNORE INTO migrations (migration, batch) VALUES 
            ('0001_01_01_000000_create_users_table', 1),
            ('2025_06_06_135900_create_categories_table', 1),
            ('2025_06_08_114224_create_posts_table', 1)
        ");
        
        return response()->json(['success' => 'Base de datos configurada correctamente']);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage(), 'line' => $e->getLine()], 500);
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
