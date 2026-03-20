<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;

class DefaultDataSeeder extends Seeder
{
    public function run(): void
    {
        if (Category::count() === 0) {
            $now = Carbon::now();
            $categories = [
                ['name' => 'Patagonia', 'description' => 'Región del sur argentino con montañas, lagos y glaciares.', 'created_at' => $now, 'updated_at' => $now],
                ['name' => 'Cuyo', 'description' => 'Tierra del vino y la cordillera en el oeste argentino.', 'created_at' => $now, 'updated_at' => $now],
                ['name' => 'Litoral', 'description' => 'Ríos, selvas y cataratas en el noreste del país.', 'created_at' => $now, 'updated_at' => $now],
                ['name' => 'Pampeana', 'description' => 'Llanuras fértiles, estancias y tradición gaucha.', 'created_at' => $now, 'updated_at' => $now],
                ['name' => 'Noroeste', 'description' => 'Paisajes áridos, salares, quebradas y cultura andina.', 'created_at' => $now, 'updated_at' => $now],
                ['name' => 'Noreste', 'description' => 'Clima cálido, ríos y gran diversidad natural.', 'created_at' => $now, 'updated_at' => $now]
            ];
            
            Category::insert($categories);
        }

        if (Post::count() < 10) {
            $now = Carbon::now();
            $posts = [
                // Patagonia (id 1)
                ['title' => 'Glaciar Perito Moreno', 'slug' => 'glaciar-perito-moreno', 'category_id' => 1, 'excerpt' => 'Un impresionante glaciar ubicado en el Parque Nacional Los Glaciares.', 'content' => 'Este coloso de hielo en movimiento es uno de los más accesibles del mundo. Sus desprendimientos son un espectáculo natural único en el corazón de la Patagonia.', 'published' => 1, 'created_at' => $now, 'updated_at' => $now],
                ['title' => 'Torres del Paine', 'slug' => 'torres-del-paine', 'category_id' => 1, 'excerpt' => 'Parque natural en Chile famoso por sus montañas y lagos.', 'content' => 'Torres del Paine sorprende con imponentes macizos, lagos turquesa y senderos entre glaciares. Es un paraíso para amantes del trekking y la fotografía.', 'published' => 1, 'created_at' => $now, 'updated_at' => $now],
                ['title' => 'Ushuaia - Fin del Mundo', 'slug' => 'ushuaia-fin-del-mundo', 'category_id' => 1, 'excerpt' => 'La ciudad más austral del mundo.', 'content' => 'Rodeada por montañas y el Canal Beagle, Ushuaia combina naturaleza, historia y aventura.', 'published' => 1, 'created_at' => $now, 'updated_at' => $now],
                
                // Cuyo (id 2)
                ['title' => 'Aconcagua', 'slug' => 'aconcagua', 'category_id' => 2, 'excerpt' => 'Hogar del cerro más alto de América.', 'content' => 'Con sus 6.962 metros, el Aconcagua domina la cordillera y atrae a montañistas de todo el mundo.', 'published' => 1, 'created_at' => $now, 'updated_at' => $now],
                ['title' => 'Bodegas de Mendoza', 'slug' => 'bodegas-mendoza', 'category_id' => 2, 'excerpt' => 'Descubre los viñedos más famosos de Argentina.', 'content' => 'Mendoza es la región vinícola más importante de Argentina, con bodegas de clase mundial y paisajes de ensueño.', 'published' => 1, 'created_at' => $now, 'updated_at' => $now],
                
                // Litoral (id 3)
                ['title' => 'Cataratas del Iguazú', 'slug' => 'cataratas-iguazu', 'category_id' => 3, 'excerpt' => 'Una de las maravillas naturales más impresionantes del mundo.', 'content' => 'Con más de 250 saltos de agua, las Cataratas del Iguazú son un espectáculo natural rodeado de selva subtropical.', 'published' => 1, 'created_at' => $now, 'updated_at' => $now],
                ['title' => 'Parque Nacional El Palmar', 'slug' => 'parque-el-palmar', 'category_id' => 3, 'excerpt' => 'Parque conocido por sus palmeras yatay.', 'content' => 'Este parque resguarda extensos palmares yatay, fauna autóctona y senderos ideales para caminatas.', 'published' => 1, 'created_at' => $now, 'updated_at' => $now],
                
                // Pampeana (id 4)
                ['title' => 'La Plata', 'slug' => 'la-plata-ciudad', 'category_id' => 4, 'excerpt' => 'Conoce la capital de la Provincia de Buenos Aires.', 'content' => 'La Plata es una ciudad moderna y orgánica, diseñada como un cuadrícula perfecta con plazas y avenidas anchas.', 'published' => 1, 'created_at' => $now, 'updated_at' => $now],
                ['title' => 'Estancias Tradicionales', 'slug' => 'estancias-gauchas', 'category_id' => 4, 'excerpt' => 'Vive la tradición gaucha en las estancias bonaerenses.', 'content' => 'Las estancias son el corazón de la cultura gaucha, donde puedes montar a caballo y degustar comida criolla.', 'published' => 1, 'created_at' => $now, 'updated_at' => $now],
                
                // Noroeste (id 5)
                ['title' => 'Salta la Linda', 'slug' => 'salta-linda', 'category_id' => 5, 'excerpt' => 'Descubre la arquitectura colonial de Salta.', 'content' => 'Salta es conocida como "La Linda" por su hermosa arquitectura colonial y sus paisajes montañosos.', 'published' => 1, 'created_at' => $now, 'updated_at' => $now],
                ['title' => 'Jujuy - La Quebrada', 'slug' => 'jujuy-quebrada', 'category_id' => 5, 'excerpt' => 'Paisajes de ensueño en la Quebrada de Humahuaca.', 'content' => 'La Quebrada de Humahuaca es un valle de importancia arqueológica y cultural, declarado Patrimonio de la Humanidad.', 'published' => 1, 'created_at' => $now, 'updated_at' => $now],
                
                // Noreste (id 6)
                ['title' => 'Puerto Iguazú', 'slug' => 'puerto-iguazu', 'category_id' => 6, 'excerpt' => 'Puerta de entrada a las Cataratas del Iguazú.', 'content' => 'Puerto Iguazú es una ciudad turística que ofrece acceso a las cataratas y la selva subtropical.', 'published' => 1, 'created_at' => $now, 'updated_at' => $now],
                ['title' => 'Esteros del Iberá', 'slug' => 'esteros-ibera', 'category_id' => 6, 'excerpt' => 'Humedales únicos de América del Sur.', 'content' => 'Los Esteros del Iberá son uno de los humedales más importantes del continente, hogar de fauna diversa.', 'published' => 1, 'created_at' => $now, 'updated_at' => $now]
            ];
            
            foreach ($posts as $post) {
                Post::firstOrCreate(['slug' => $post['slug']], $post);
            }
        }
    }
}
