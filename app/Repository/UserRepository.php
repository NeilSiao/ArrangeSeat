<?php 
namespace App\Repository;

use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRepository{


    public function testAccount(){
        return User::where('email', 'test@test.com')->first();
    }

    public function roomOption(User $user){
        return $user
        ->rooms()
        ->select('id', 'name')
        ->get();
    }
    public function roomSeat($roomId){
        return Room::where('id', $roomId)
        ->first()
        ->roomSeat()
        ->get()
        ->toJson();
    }
    public function classes(){
        return $this->hasMany(StudentGroup::class);
    }
}