<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender =($this->faker->numberBetween(0,1)) ? 'M' : 'F';
        $photo = 'stu_img/' . $this->faker->image(storage_path('app/public/stu_img'), 400,300,null,false);
        return [
            'no' => $this->faker->numberBetween(1000,9999),
            'name' => $this->faker->name,
            'photo' => $photo,
            'gender' => $gender
        ];
    }
}
