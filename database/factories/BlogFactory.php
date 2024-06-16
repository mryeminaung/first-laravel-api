<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => rand(1, 2),
            'user_id' => rand(1, 3),
            'title' => $this->faker->sentence(),
            'slug' => str_replace(' ', '-', strtolower($this->faker->sentence())),
            'intro' => $this->faker->sentence(),
            'body' => $this->faker->paragraph(),
        ];
    }
}
