<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function __construct(UserRepository $userRepo)
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
        $path = public_path('stu_img');
        array_map('unlink', glob(public_path('stu_img/*.png')));
        
        $testAccount = $this->userRepo->testAccount();
        $id = $testAccount['id'];

        Student::factory(10)->create(
            ['user_id' => $id]
        );
    }
}
