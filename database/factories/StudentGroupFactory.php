<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\StudentTeam;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentGroupFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StudentTeam::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->streetName,
            'student_id' => Student::random()->first()->id,
        ];
    }
}
