<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Emprunt>
 */
class EmpruntFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $date_emprunt = fake()->dateTimeBetween('-1 year', 'now');
        $date_fin_prevue = fake()->dateTimeBetween($date_emprunt, 'now');
        $date_retour = fake()->dateTimeBetween($date_emprunt, $date_fin_prevue);
        return [
            'adherent_id' => fake()->numberBetween(1, 10),
            'livre_id' => fake()->numberBetween(1, 50),
            'date_emprunt' => $date_emprunt,
            'date_fin_prevue' => $date_fin_prevue,
            'date_retour' => $date_retour,
        ];
    }
}
