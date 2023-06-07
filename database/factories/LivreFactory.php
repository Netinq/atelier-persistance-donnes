<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Livre>
 */
class LivreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titre' => fake()->sentence(),
            'auteur_id' => fake()->numberBetween(1, 10),
            'date_de_parution' => fake()->date(),
            'nombre_de_pages' => fake()->numberBetween(50, 1000),
        ];
    }
}
