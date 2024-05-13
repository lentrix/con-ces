<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Benjie Lenteria',
            'email' => 'me@lentrix-dev.com',
            'password' => bcrypt('aa')
        ]);

        $this->call(PatientSeeder::class);
    }
}
