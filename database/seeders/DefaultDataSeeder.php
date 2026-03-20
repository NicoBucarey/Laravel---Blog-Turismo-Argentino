<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Post;

class DefaultDataSeeder extends Seeder
{
    public function run(): void
    {
        if (Category::count() === 0) {
            $categories = [
                ['name' => 'Patagonia', 'description' => 'Región del sur argentino con montañas, lagos y glaciares.'],
                ['name' => 'Cuyo', 'description' => 'Tierra del vino y la cordillera en el oeste argentino.'],
                ['name' => 'Litoral', 'description' => 'Ríos, selvas y cataratas en el noreste del país.'],
                ['name' => 'Pampeana', 'description' => 'Llanuras fértiles, estancias y tradición gaucha.'],
                ['name' => 'Noroeste', 'description' => 'Paisajes áridos, salares, quebradas y cultura andina.'],
                ['name' => 'Noreste', 'description' => 'Clima cálido, ríos y gran diversidad natural.']
            ];
            
            Category::insert($categories);
        }

        if (Post::count() === 0) {
            $posts = [
                ['title' => 'Glaciar Perito Moreno', 'slug' => 'glaciar-perito-moreno', 'category_id' => 1, 'excerpt' => 'Un impresionante glaciar ubicado en el Parque Nacional Los Glaciares.', 'content' => 'Este coloso de hielo en movimiento es uno de los más accesibles del mundo. Sus desprendimientos son un espectáculo natural único en el corazón de la Patagonia.', 'published' => 1],
                ['title' => 'Cataratas del Iguazú', 'slug' => 'cataratas-iguazu', 'category_id' => 3, 'excerpt' => 'Una de las maravillas naturales más impresionantes del mundo.', 'content' => 'Con más de 250 saltos de agua, las Cataratas del Iguazú son un espectáculo natural rodeado de selva subtropical. ', 'published' => 1],
                ['title' => 'Aconcagua', 'slug' => 'aconcagua', 'category_id' => 2, 'excerpt' => 'Hogar del cerro más alto de América: el Aconcagua.', 'content' => 'Con sus 6.962 metros, el Aconcagua domina la cordillera y atrae a montañistas de todo el mundo.', 'published' => 1]
            ];
            
            Post::insert($posts);
        }
    }
}
