<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->realText(10);
        $categories = array(1, 2, 3);
        return [
            'title' => $title,
            'text' => $this->faker->realText(rand(200,700)),
            'is_private' => false,
            'image' => null,
            'slug' => Str::slug($title),
            'category_id' => $categories[array_rand($categories)]
        ];
    }
}
