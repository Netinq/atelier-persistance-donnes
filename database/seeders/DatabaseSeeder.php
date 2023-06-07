<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Adherent;
use App\Models\Auteur;
use App\Models\Categorie;
use App\Models\Emprunt;
use App\Models\Livre;
use App\Models\LivreCategorie;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        Auteur::factory(10)->create();
        Categorie::factory(10)->create();
        Livre::factory(50)->create();
        Adherent::factory(50)->create();
        Emprunt::factory(50)->create();
        LivreCategorie::factory(125)->create();
    }
}
