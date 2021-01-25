<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
use Illuminate\Database\Seeder;
use App\Repository\UserRepository;

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
        if(config('app.APP_ENV') == 'local'){
            $path = storage_path('app/public/stu_img') . '/*.png';
            array_map('unlink', glob($path));
        }
        
        $testAccount = $this->userRepo->testAccount();
        $id = $testAccount['id'];

        Student::factory(10)->create(
            ['user_id' => $id]
        );
    }
}
