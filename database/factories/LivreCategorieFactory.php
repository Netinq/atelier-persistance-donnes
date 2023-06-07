<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LivreCategorie>
 */
class LivreCategorieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'livre_id' => fake()->numberBetween(1, 50),
            'categorie_id' => fake()->numberBetween(1, 10),
        ];
    }
}
