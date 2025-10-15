<?php

namespace Database\Seeders;

use App\Models\Games;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    public function run(): void
    {
        $games = [
            [
                'title' => 'Final Fantasy VII',
                'developer' => 'Square Enix',
                'year' => 1997,
                'description' => 'Vive las aventuras de Cloud y AVALANCHE contra Shinra y Sephiroth.',
            ],
            [
                'title' => 'Cyberpunk 2077',
                'developer' => 'CD Projekt Red',
                'year' => 2020,
                'description' => 'Explora Night City, una megalópolis obsesionada con el poder y la tecnología.',
            ],
            [
                'title' => 'The Legend of Zelda: Breath of the Wild',
                'developer' => 'Nintendo',
                'year' => 2017,
                'description' => 'Un mundo abierto donde la exploración y la libertad son lo más importante.',
            ],
            [
                'title' => 'The Witcher 3: Wild Hunt',
                'developer' => 'CD Projekt Red',
                'year' => 2015,
                'description' => 'Acompaña a Geralt de Rivia en una épica aventura de fantasía y decisiones morales.',
            ],
            [
                'title' => 'Elden Ring',
                'developer' => 'FromSoftware',
                'year' => 2022,
                'description' => 'Una aventura en un mundo abierto lleno de secretos, diseñado por Miyazaki y G.R.R. Martin.',
            ],
        ];

        foreach ($games as $b) {
            Games::create($b);
        }
    }
}
