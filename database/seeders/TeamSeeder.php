<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Repository\UserRepository;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{  public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $testAccount = $this->userRepo->testAccount();
        $id = $testAccount['id'];
        Team::factory(3)->create([
            'user_id' => $id,
        ]);
    }
}
