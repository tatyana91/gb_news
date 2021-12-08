<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NewsFactory extends Factory
{
    protected $model = News::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $title = $this->faker->realText(10);
        $categories = array(1, 2, 3);
        return [
            'title' => $title,
            'text' => $this->faker->realText(rand(200,700)),
            'is_private' => rand(0, 1),
            'image' => null,
            'slug' => Str::slug($title),
            'category_id' => $categories[array_rand($categories)]
        ];
    }
}
