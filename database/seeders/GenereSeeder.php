<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genere;

class GenereSeeder extends Seeder
{
    public function run(): void
    {
        $generes = [
            'Pop',
            'Rock',
            'Electrònica',
            'Jazz',
            'Hip-hop',
            'Clàssica',
            'Reggaeton',
            'Indie',
        ];

        foreach ($generes as $nom) {
            Genere::firstOrCreate([
                'nom' => $nom,
            ]);
        }
    }
}

