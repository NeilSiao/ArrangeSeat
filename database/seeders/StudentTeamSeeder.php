<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Database\Factories\UserFactory;

class StudentTeamSeeder extends Seeder
{
    public function __construct(UserFactory $userRepo)
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
        
        $team = Team::first();
        $students = Student::all()->pluck('id');
        $team->students()->attach($students);
    }
}
