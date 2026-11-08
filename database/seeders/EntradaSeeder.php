<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Entrada;

class EntradaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // users
        User::create([
            'name' => 'Marc',
            'email' => 'marc@test.com',
            'password' => bcrypt('password'),
        ]);
        User::factory(4)->create();   // ids 2 a 5


        Entrada::create(['user_id' => 1, 'concert_id' => 1, 'preu_pagat' => 45.00]);
        Entrada::create(['user_id' => 2, 'concert_id' => 1, 'preu_pagat' => 45.00]);
        Entrada::create(['user_id' => 3, 'concert_id' => 1, 'preu_pagat' => 50.00]);
        Entrada::create(['user_id' => 4, 'concert_id' => 1, 'preu_pagat' => 50.00]);
        Entrada::create(['user_id' => 5, 'concert_id' => 1, 'preu_pagat' => 55.00]);

        Entrada::create(['user_id' => 1, 'concert_id' => 2, 'preu_pagat' => 30.00]);
        Entrada::create(['user_id' => 2, 'concert_id' => 2, 'preu_pagat' => 30.00]);
        Entrada::create(['user_id' => 3, 'concert_id' => 2, 'preu_pagat' => 35.50]);
        Entrada::create(['user_id' => 4, 'concert_id' => 2, 'preu_pagat' => 35.50]);

        Entrada::create(['user_id' => 1, 'concert_id' => 3, 'preu_pagat' => 60.00]);
        Entrada::create(['user_id' => 2, 'concert_id' => 3, 'preu_pagat' => 60.00]);
        Entrada::create(['user_id' => 5, 'concert_id' => 3, 'preu_pagat' => 65.00]);

        Entrada::create(['user_id' => 2, 'concert_id' => 4, 'preu_pagat' => 25.00]);
        Entrada::create(['user_id' => 3, 'concert_id' => 4, 'preu_pagat' => 25.00]);
        Entrada::create(['user_id' => 4, 'concert_id' => 4, 'preu_pagat' => 28.00]);
        Entrada::create(['user_id' => 5, 'concert_id' => 4, 'preu_pagat' => 28.00]);

        Entrada::create(['user_id' => 1, 'concert_id' => 5, 'preu_pagat' => 40.00]);
        Entrada::create(['user_id' => 3, 'concert_id' => 5, 'preu_pagat' => 40.00]);
        Entrada::create(['user_id' => 4, 'concert_id' => 5, 'preu_pagat' => 42.50]);

        Entrada::create(['user_id' => 1, 'concert_id' => 6, 'preu_pagat' => 70.00]);
        Entrada::create(['user_id' => 2, 'concert_id' => 6, 'preu_pagat' => 70.00]);
        Entrada::create(['user_id' => 3, 'concert_id' => 6, 'preu_pagat' => 75.00]);
        Entrada::create(['user_id' => 5, 'concert_id' => 6, 'preu_pagat' => 75.00]);

        Entrada::create(['user_id' => 2, 'concert_id' => 7, 'preu_pagat' => 20.00]);
        Entrada::create(['user_id' => 4, 'concert_id' => 7, 'preu_pagat' => 20.00]);
        Entrada::create(['user_id' => 5, 'concert_id' => 7, 'preu_pagat' => 22.00]);

        Entrada::create(['user_id' => 1, 'concert_id' => 8, 'preu_pagat' => 55.00]);
        Entrada::create(['user_id' => 3, 'concert_id' => 8, 'preu_pagat' => 55.00]);
        Entrada::create(['user_id' => 4, 'concert_id' => 8, 'preu_pagat' => 58.00]);
        Entrada::create(['user_id' => 5, 'concert_id' => 8, 'preu_pagat' => 58.00]);
    }
}
