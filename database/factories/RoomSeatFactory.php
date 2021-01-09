<?php

namespace Database\Factories;

use App\Models\Room;
use App\Models\Model;
use App\Models\Student;
use App\Models\RoomSeat;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomSeatFactory extends Factory
{
    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }
    
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RoomSeat::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'student_id'=> Student::random()->first()->id,
            'room_id' => Room::random()->first()->id,
            'left' => $this->faker->numberBetween(10, 20),
            'top' => $this->faker->numberBetween(10, 20),
            'rotate' => $this->faker->numberBetween(10, 20),
        ];
    }
}
