<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run()
    {
        $postsData = [
            'Patagonia' => [
                [
                    'title' => 'Glaciar Perito Moreno',
                    'excerpt' => 'Un impresionante glaciar ubicado en el Parque Nacional Los Glaciares.',
                    'content' => 'Este coloso de hielo en movimiento es uno de los más accesibles del mundo. Sus desprendimientos son un espectáculo natural único en el corazón de la Patagonia.',
                    'image_main' => 'images/patagonia11.jpg',
                    'image_2' => 'images/patagonia12.jpg',
                    'image_3' => 'images/patagonia13.jpg',
                    'published' => true,
                ],
                [
                    'title' => 'Parque Nacional Torres del Paine',
                    'excerpt' => 'Parque natural en Chile famoso por sus montañas y lagos.',
                    'content' => 'Torres del Paine sorprende con imponentes macizos, lagos turquesa y senderos entre glaciares. Es un paraíso para amantes del trekking y la fotografía, ubicado en plena estepa patagónica.',
                    'image_main' => 'images/patagonia21.jpg',
                    'image_2' => 'images/patagonia22.jpg',
                    'image_3' => 'images/patagonia23.jpg',
                    'published' => true,
                ],
                [
                    'title' => 'Ushuaia - Fin del Mundo',
                    'excerpt' => 'La ciudad más austral del mundo, puerta de entrada a la Antártida.',
                    'content' => 'Rodeada por montañas y el Canal Beagle, Ushuaia combina naturaleza, historia y aventura. Desde navegar entre pingüinos hasta llegar en tren al “Fin del Mundo”, es un destino inolvidable.',
                    'image_main' => 'images/patagonia31.jpg',
                    'image_2' => 'images/patagonia32.jpg',
                    'image_3' => 'images/patagonia33.jpg',
                    'published' => true,
                ],
            ],

            'Litoral' => [
                [
                    'title' => 'Cataratas del Iguazú',
                    'excerpt' => 'Una de las maravillas naturales más impresionantes del mundo.',
                    'content' => 'Con más de 250 saltos de agua, las Cataratas del Iguazú son un espectáculo natural rodeado de selva subtropical. El paseo Garganta del Diablo ofrece vistas imponentes e inolvidables.',
                    'image_main' => 'images/litoral11.jpg',
                    'image_2' => 'images/litoral12.jpg',
                    'image_3' => 'images/litoral13.jpg',
                    'published' => true,
                ],
                [
                    'title' => 'Parque Nacional El Palmar',
                    'excerpt' => 'Parque conocido por sus palmeras yatay y fauna diversa.',
                    'content' => 'Este parque resguarda extensos palmares yatay, fauna autóctona y senderos ideales para caminatas. Un rincón único del litoral entrerriano con valor ecológico y paisajístico.',
                    'image_main' => 'images/litoral21.jpg',
                    'image_2' => 'images/litoral22.jpg',
                    'image_3' => 'images/litoral23.jpg',
                    'published' => true,
                ],
                [
                    'title' => 'Parque Nacional Pre-Delta',
                    'excerpt' => 'Área natural protegida en la región del delta del Paraná.',
                    'content' => 'Entre canales y lagunas, este parque protege el ecosistema del delta del Paraná. Es perfecto para el avistaje de aves y disfrutar la tranquilidad del entorno natural ribereño.',
                    'image_main' => 'images/litoral31.jpg',
                    'image_2' => 'images/litoral32.jpg',
                    'image_3' => 'images/litoral33.jpg',
                    'published' => true,
                ],
            ],
            'Cuyo' => [
                [
                    'title' => 'Parque Provincial Aconcagua',
                    'excerpt' => 'Hogar del cerro más alto de América: el Aconcagua.',
                    'content' => 'Con sus 6.962 metros, el Aconcagua domina la cordillera y atrae a montañistas de todo el mundo. El parque ofrece senderos de altura y paisajes imponentes de la precordillera mendocina.',
                    'image_main' => 'images/cuyo11.jpg',
                    'image_2' => 'images/cuyo12.jpg',
                    'image_3' => 'images/cuyo13.jpg',
                    'published' => true,
                ],
                [
                    'title' => 'Valle de la Luna - Ischigualasto',
                    'excerpt' => 'Paisaje prehistórico en San Juan lleno de formaciones rocosas. ',
                    'content' => 'Sus formaciones rocosas y tonos rojizos crean un paisaje lunar que oculta fósiles milenarios. Ischigualasto es un museo natural a cielo abierto en pleno desierto sanjuanino.',
                    'image_main' => 'images/cuyo21.jpg',
                    'image_2' => 'images/cuyo22.jpg',
                    'image_3' => 'images/cuyo23.jpg',
                    'published' => true,
                ],
                [
                    'title' => 'Ciudad de Mendoza y sus viñedos',
                    'excerpt' => 'Capital del vino argentino con paisajes cordilleranos.',
                    'content' => 'Mendoza combina bodegas premiadas, gastronomía regional y paisajes andinos. Es el corazón del vino argentino y punto de partida para aventuras de montaña.',
                    'image_main' => 'images/cuyo31.jpg',
                    'image_2' => 'images/cuyo32.jpg',
                    'image_3' => 'images/cuyo33.jpg',
                    'published' => true,
                ],
            ],
            'Noroeste' => [
                [
                    'title' => 'Quebrada de Humahuaca',
                    'excerpt' => 'Valle andino con historia y colores vibrantes.',
                    'content' => 'Un valle surcado por historia y color, con cerros multicolores, pueblos ancestrales y tradiciones vivas. La Quebrada es un tesoro cultural y paisajístico del norte argentino.',
                    'image_main' => 'images/noroeste11.jpg',
                    'image_2' => 'images/noroeste12.jpg',
                    'image_3' => 'images/noroeste13.jpg',
                    'published' => true,
                ],
                [
                    'title' => 'Salinas Grandes',
                    'excerpt' => 'Extensión blanca de sal en el límite de Jujuy y Salta.',
                    'content' => 'Una inmensidad blanca y brillante a más de 3.000 msnm. Las Salinas Grandes fascinan por sus reflejos, geometrías naturales y contrastes únicos con el cielo del altiplano.',
                    'image_main' => 'images/noroeste21.jpg',
                    'image_2' => 'images/noroeste22.jpg',
                    'image_3' => 'images/noroeste23.jpg',
                    'published' => true,
                ],
                [
                    'title' => 'Tren a las Nubes',
                    'excerpt' => 'Aventura ferroviaria entre montañas a más de 4.000 metros.',
                    'content' => 'Atraviesa viaductos y montañas en un recorrido a más de 4.000 metros. El Tren a las Nubes ofrece una experiencia única entre cultura andina y paisajes extremos.',
                    'image_main' => 'images/noroeste31.jpg',
                    'image_2' => 'images/noroeste32.jpg',
                    'image_3' => 'images/noroeste33.jpg',
                    'published' => true,
                ],
            ],
            'Noreste' => [
                [
                    'title' => 'Esteros del Iberá',
                    'excerpt' => 'Gran humedal argentino con fauna y flora nativa.',
                    'content' => 'Este humedal es hogar de carpinchos, ciervos, yacarés y cientos de aves. Los Esteros del Iberá son un paraíso de biodiversidad y tranquilidad en el corazón de Corrientes.',
                    'image_main' => 'images/noreste11.jpg',
                    'image_2' => 'images/noreste12.jpg',
                    'image_3' => 'images/noreste13.jpg',
                    'published' => true,
                ],
                [
                    'title' => 'Parque Nacional Mburucuyá',
                    'excerpt' => 'Área protegida con selva, pastizales y esteros en Corrientes.',
                    'content' => 'Un refugio natural con selvas, esteros y pastizales que invitan a caminar entre especies autóctonas. Mburucuyá es ideal para desconectar y explorar la vida silvestre del NEA.',
                    'image_main' => 'images/noreste21.jpg',
                    'image_2' => 'images/noreste22.jpg',
                    'image_3' => 'images/noreste23.jpg',
                    'published' => true,
                ],
                [
                    'title' => 'Río Paraná en Corrientes',
                    'excerpt' => 'Río emblemático con paisajes ribereños ideales para pesca y descanso.',
                    'content' => 'A orillas del Paraná, Corrientes ofrece playas, pesca deportiva y atardeceres memorables. El río es parte esencial de la identidad y la vida cotidiana del noreste argentino.',
                    'image_main' => 'images/noreste31.jpg',
                    'image_2' => 'images/noreste32.jpg',
                    'image_3' => 'images/noreste33.jpg',
                    'published' => true,
                ],
            ],
            'Pampeana' => [
                [
                    'title' => 'Estancia Santa Catalina',
                    'excerpt' => 'Una de las estancias más antiguas de Córdoba con arquitectura colonial.',
                    'content' => 'La Estancia Santa Catalina forma parte del Camino de las Estancias Jesuíticas y es Patrimonio de la Humanidad. Su iglesia barroca y entorno rural son un atractivo turístico destacado.',
                    'image_main' => 'images/pampeana11.jpg',
                    'image_2' => 'images/pampeana12.jpg',
                    'image_3' => 'images/pampeana13.jpg',
                    'published' => true,
                ],
                [
                    'title' => 'Reserva Natural Otamendi',
                    'excerpt' => 'Una reserva natural que protege pastizales pampeanos y humedales.',
                    'content' => 'Ubicada en la provincia de Buenos Aires, la Reserva Otamendi alberga una importante diversidad de aves y especies autóctonas, ideal para ecoturismo y avistaje.',
                    'image_main' => 'images/pampeana21.jpg',
                    'image_2' => 'images/pampeana22.jpg',
                    'image_3' => 'images/pampeana23.jpg',
                    'published' => true,
                ],
                [
                    'title' => 'Ciudad de Rosario',
                    'excerpt' => 'Una ciudad vibrante a orillas del río Paraná, con fuerte identidad cultural.',
                    'content' => 'Rosario ofrece museos, arte urbano y una costanera activa. Es la cuna de la bandera argentina y un polo turístico del centro del país.',
                    'image_main' => 'images/pampeana31.jpg',
                    'image_2' => 'images/pampeana32.jpg',
                    'image_3' => 'images/pampeana33.jpg',
                    'published' => true,
                ],
            ],

        ];

        foreach ($postsData as $categoryName => $posts) {
            $category = Category::where('name', $categoryName)->first();
            if (!$category) continue;

            foreach ($posts as $postData) {
                Post::create(array_merge($postData, [
                    'slug' => Str::slug($postData['title']),
                    'category_id' => $category->id,
                ]));
            }
        }
    }
}
