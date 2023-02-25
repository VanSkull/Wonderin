<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('categories')->insert([
            'name' => 'Fantastique',
        ]);
        DB::table('categories')->insert([
            'name' => 'Romantique',
        ]);
        DB::table('categories')->insert([
            'name' => 'Aventure',
        ]);
        DB::table('categories')->insert([
            'name' => 'Historique',
        ]);
        DB::table('categories')->insert([
            'name' => 'Shonen',
        ]);
        DB::table('categories')->insert([
            'name' => 'Enfant',
        ]);
        DB::table('categories')->insert([
            'name' => 'Horreur',
        ]);
        DB::table('categories')->insert([
            'name' => 'Futuriste',
        ]);
        DB::table('categories')->insert([
            'name' => 'Philosophie',
        ]);
    }
}
