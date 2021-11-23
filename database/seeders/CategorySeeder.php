<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getData());
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
