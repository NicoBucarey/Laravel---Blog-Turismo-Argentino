<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        // Auto-setup database if empty
        try {
            if (\App\Models\Category::count() === 0) {
                \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
                
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
                
                $posts = [
                    ['title' => 'Glaciar Perito Moreno', 'slug' => 'glaciar-perito-moreno', 'category_id' => 1, 'excerpt' => 'Un impresionante glaciar', 'published' => 1],
                    ['title' => 'Cataratas del Iguazú', 'slug' => 'cataratas-iguazu', 'category_id' => 3, 'excerpt' => 'Maravilla natural', 'published' => 1],
                    ['title' => 'Aconcagua', 'slug' => 'aconcagua', 'category_id' => 2, 'excerpt' => 'Cerro más alto de América', 'published' => 1]
                ];
                
                foreach ($posts as $postData) {
                    \App\Models\Post::firstOrCreate(['slug' => $postData['slug']], $postData);
                }
            }
        } catch (\Exception $e) {
            // Silently fail on boot to avoid crashes
        }
    }
   

}
