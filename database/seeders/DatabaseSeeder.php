<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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

//         \App\Models\User::factory()->create([
//             'name' => 'Alen Pariyar',
//             'email' => 'alen@example.com',
//         ]);

         \App\Models\Setting::factory()->create([
             'dynamic_typer_prefix'=>"I am",
             'dynamic_typer_array'=>"Alen Pariyar, From Lamjung, a BCA Student",
         ]);
    }
}
