<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' =>$this->faker->word,
            'image' => $this->faker->imageUrl(200,200``),
            'content'=> $this->faker->paragraph,
            'category_id' => Category::inRandomOrder()->first()->id,
            'created_at' => now(),


        ];
    }
}
