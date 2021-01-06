<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = public_path('stu_img');
        array_map('unlink', glob(public_path('stu_img/*.png')));
   
        Student::factory(10)->create();
    }
}
