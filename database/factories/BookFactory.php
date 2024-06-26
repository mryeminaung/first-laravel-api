<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $levels = ['easy', 'medium', 'hard'];

        return [
            'author' => $this->faker->firstNameMale(),
            'email' => $this->faker->email(),
            'price' => $this->faker->randomFloat(2, 10, 50),
            'level' => $levels[array_rand($levels)],
            'isStock' => $this->faker->boolean(60),
            'published_at' => $this->faker->dateTime()
        ];
    }
}
