<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
         return [
            'title' => $this->faker->sentence(10),
            'body' => $this->faker->paragraph(4),
            'category_id' => $this->faker->numberBetween(1, 7),
            'status' => $this->faker->words('visible', true),
            'datetime' => $this->faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
        ];
    }
}
