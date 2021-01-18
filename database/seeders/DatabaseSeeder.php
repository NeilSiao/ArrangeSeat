<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RoomSeeder;
use Database\Seeders\TeamSeeder;
use Database\Seeders\StudentSeeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\StudentTeamSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\User::factory()->create([
            'email' => config('project.testAccount'),
            'password' => Hash::make(config('project.testPassword')),
            'name' => config('project.testName'),
            ]
        );
        $this->call([
            RoomSeeder::class,
            StudentSeeder::class,
            TeamSeeder::class,
            StudentTeamSeeder::class,
        ]);
        
    }
}
