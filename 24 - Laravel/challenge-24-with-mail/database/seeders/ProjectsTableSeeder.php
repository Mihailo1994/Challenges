<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        DB::table('projects')->insert([
            ['name' => 'Merakzy',
            'image' => 'https://blog.brainster.co/wp-content/uploads/2023/08/1200x628_Nosecka-1024x536.jpg',
            'subtitle' => 'Академија за човечки ресурси',
            'description' => $faker->text(200),
            'url' => 'https://blog.brainster.co/hr-zavrshen-proekt-merakzy/'],
            ['name' => 'Абилити',
            'image' => 'https://blog.brainster.co/wp-content/uploads/2023/06/1200x628_Nosecka_opt-1024x536.jpg',
            'subtitle' => 'Академија за графички дизајн',
            'description' => $faker->text(200),
            'url' => 'https://blog.brainster.co/design-zavrsen-proekt-abiliti/'],
            ['name' => 'Gift from Macedonia',
            'image' => 'https://blog.brainster.co/wp-content/uploads/2023/04/1200x628_Nosecka-1024x536.jpg',
            'subtitle' => 'Академија за графички дизајн',
            'description' => $faker->text(200),
            'url' => 'https://blog.brainster.co/design-zavrsen-proekt-gift-from-macedonia/'],
            ['name' => 'Time Series Prediction of GDP Ratio',
            'image' => 'https://blog.brainster.co/wp-content/uploads/2023/03/1200x628_Tim3_Aleksandra-1024x536.jpg',
            'subtitle' => 'Академија за Data Science',
            'description' => $faker->text(200),
            'url' => 'https://blog.brainster.co/data-zavrsen-gdp-ratio/'],
            ['name' => 'Time Series Prediction',
            'image' => 'https://blog.brainster.co/wp-content/uploads/2023/03/1200x628_Nosecka-1-1024x536.jpg',
            'subtitle' => 'Академија за Data Science',
            'description' => $faker->text(200),
            'url' => 'https://blog.brainster.co/data-zavrsen-proekt-bdp/'],
            ['name' => 'NLP',
            'image' => 'https://blog.brainster.co/wp-content/uploads/2023/03/1200x628-1024x536.jpg',
            'subtitle' => 'Академија за Data Science',
            'description' => $faker->text(200),
            'url' => 'https://blog.brainster.co/data-zavrsen-proekt-nlp/'],
            ['name' => 'Дента ЕС',
            'image' => 'https://blog.brainster.co/wp-content/uploads/2023/02/1200x628_Nosecka-min-1024x536.png',
            'subtitle' => 'Академија за дигитален маркетинг',
            'description' => $faker->text(200),
            'url' => 'https://blog.brainster.co/marketing-proekt-dentaes/'],
            ['name' => 'Common.mk',
            'image' => 'https://blog.brainster.co/wp-content/uploads/2022/08/220811_1200x628_Nosecka-1024x536.jpg',
            'subtitle' => 'Академија за дигитален маркетинг',
            'description' => $faker->text(200),
            'url' => 'https://blog.brainster.co/marketing-zavrsen-proekt-common-petar/'],
            ['name' => 'Author Detection (NLP)',
            'image' => 'https://blog.brainster.co/wp-content/uploads/2022/05/220517_1200x628_Nosecka-1024x536.jpg',
            'subtitle' => 'Академија за Data Science',
            'description' => $faker->text(200),
            'url' => 'https://blog.brainster.co/data-zavrsen-proekt-author-detection/'],
        ]);
    }
}
