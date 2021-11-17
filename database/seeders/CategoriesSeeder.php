<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert($this->getData());
    }

    private function getData() {
        return [
            1 => [
                'title' => 'Спорт',
                'slug' => 'sport'
            ],
            2 => [
                'title' => 'Политика',
                'slug' => 'politika'
            ],
            3 => [
                'title' => 'Культура',
                'slug' => 'kultura'
            ]
        ];
    }
}
