<?php

namespace Database\Seeders;

use App\Models\ColorScheme;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // accent-color: #FF2E63;
        // main-color: #EAEAEA;
        // secondary-color: #252A34;
        // alt-color: #08D9D6;
        // highlight-color: #f79bb2;
        $color_schemes = [
            [
                'name' => 'Minimal',
                '--accent-color' => '#000',
                '--main-color' => '#fff',
                '--secondary-color' => '#ffffff',
                '--alt-color' => '#e7e7e7',
                '--highlight-color' => '#b6b6b6',
                '--font-color' => '#000000',
                '--heading-color' => '#000000',
                '--border-color' => '#a1a1a1',
                '--icon-color' => '#000000',
                '--nav-color' => '#ffffff'
            ],
            [
                'name' => 'Vampire',
                '--main-color' => '#EAEAEA',
                '--secondary-color' => '#252A34',
                '--accent-color' => '#FF2E63',
                '--highlight-color' => '#f79bb2',
                '--alt-color' => '#08D9D6',
                '--font-color' => '#252A34',
                '--heading-color' => '#FF2E63',
                '--border-color' => '#FF2E63',
                '--icon-color' => '#FF2E63',
                '--nav-color' => '#'
            ],
            [
                'name' => 'Nature\'s Touch',
                '--main-color' => '#D0E7D2',
                '--secondary-color' => '#79AC78',
                '--accent-color' => '#fff',
                '--highlight-color' => '#dcf5ad',
                '--alt-color' => '#dcf5ad',
                '--heading-color' => '#fff',
                '--font-color' => '#79AC78',
                '--border-color' => '#567456',
                '--icon-color' => '#567456',
                '--nav-color' => '#'
            ],
            [
                'name' => 'Purple Rain',
                '--main-color' => '#E5CFF7',
                '--secondary-color' => '#713ABE',
                '--accent-color' => '#E5CFF7',
                '--highlight-color' => '#9D76C1',
                '--alt-color' => '#E5CFF7',
                '--font-color' => '#5B0888',
                '--heading-color' => '#fff',
                '--border-color' => '#5B0888',
                '--icon-color' => '#5B0888',
                '--nav-color' => '#5B0888',
            ],
            [
                'name' => 'Blue Sky',
                '--main-color' => '#9EDDFF',
                '--secondary-color' => '#6499E9',
                '--accent-color' => '#fff',
                '--highlight-color' => '#BEFFF7',
                '--alt-color' => '#BEFFF7',
                '--font-color' => '#6499E9',
                '--heading-color' => '#fff',
                '--border-color' => '#fff',
                '--icon-color' => '#6499E9',
                '--nav-color' => '#6499E9',
            ],
            [
                'name' => 'Autumn',
                '--main-color' => '#141E46',
                '--secondary-color' => '#FF6969',
                '--accent-color' => '#141E46',
                '--highlight-color' => '#C70039',
                '--alt-color' => '#FF6969',
                '--font-color' => '#FFF5E0',
                '--heading-color' => '#FFF5E0',
                '--border-color' => '#FFF5E0',
                '--icon-color' => '#141E46',
                '--nav-color' => '#FFF5E0',
            ]

        ];

        foreach ($color_schemes as $scheme) {
            ColorScheme::create($scheme);
        }

    }
}
