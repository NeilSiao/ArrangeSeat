<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RoomSeeder;
use Database\Seeders\StudentSeeder;

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
        
        $this->call([
            RoomSeeder::class,
            StudentSeeder::class
        ]);
        
    }
}
