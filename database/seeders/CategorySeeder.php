<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
 $categories = [
            ['name' => 'Patagonia', 'description' => 'Región del sur argentino con montañas, lagos y glaciares.'],
            ['name' => 'Cuyo', 'description' => 'Tierra del vino y la cordillera en el oeste argentino.'],
            ['name' => 'Litoral', 'description' => 'Ríos, selvas y cataratas en el noreste del país.'],
            ['name' => 'Pampeana', 'description' => 'Llanuras fértiles, estancias y tradición gaucha.'],
            ['name' => 'Noroeste', 'description' => 'Paisajes áridos, salares, quebradas y cultura andina.'],
            ['name' => 'Noreste', 'description' => 'Clima cálido, ríos y gran diversidad natural.'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }    }
}
