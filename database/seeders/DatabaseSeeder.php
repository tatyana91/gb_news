<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();
        $this->call(AdminSeeder::class);
        $this->call(CategorySeeder::class);
        //$this->call(NewsSeeder::class);
        News::factory(15)->create();
    }
}
