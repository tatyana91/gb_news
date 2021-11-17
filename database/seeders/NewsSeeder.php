<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    private function getData() {
        $data = [];
        $faker = Faker\Factory::create('ru_RU');
        $categories = array(1, 2, 3);
        for ($i = 0; $i<=10; $i++) {
            $title = $faker->realText(10);
            $data[] = [
                'title' => $title,
                'text' => $faker->realText(rand(200,700)),
                'is_private' => false,
                'image' => null,
                'slug' => Str::slug($title),
                'category_id' => $categories[array_rand($categories)]
            ];
        }
        return $data;
    }
}
