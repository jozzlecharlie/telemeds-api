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
        // $this->call([
        //     ServiceSeeder::class,
        // ]);
        // \App\Models\User::factory(100)->create();
        // \App\Models\Hperson::factory(100)->create();
        // \App\Models\User::factory()->create([
        //     'email' => 'admin@demo.com',
        //     'password' => bcrypt('password'),
        //     'employeeid' => \App\Models\Hpersonal::factory()->create([
        //         'deptcode' => 'MEDIC',
        //     ])->employeeid,
        // ]);

        //  \App\Models\Hperson::factory(100)->create();


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        $this->call([
            EncounterSeeder::class,
        ]);
    }
}
