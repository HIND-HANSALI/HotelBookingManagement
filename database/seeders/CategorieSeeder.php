<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categorie;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categorie::create([
            'title' => 'Family Room'
        ]);

        Categorie::create([
            'title' => 'Female-only Room'
        ]);

        Categorie::create([
            'title' => 'Budget Room'
        ]);
        Categorie::create([
            'title' => 'Luxury Room'
        ]);
        Categorie::create([
            'title' => 'Ensuite Room'
        ]);
        Categorie::create([
            'title' => 'Dormitory Room'
        ]);
    }
}
