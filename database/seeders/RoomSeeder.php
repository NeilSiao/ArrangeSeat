<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;
use App\Repository\UserRepository;

class RoomSeeder extends Seeder
{
    public function __construct(UserRepository $userRepo){
        $this->userRepo = $userRepo;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = $this->userRepo->testAccount();
        $id = $user['id'];
        Room::factory(10)->create([
            'user_id' => $id
        ]);
    }
}
