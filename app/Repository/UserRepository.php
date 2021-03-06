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
   
    
    public function teamOption($user){
        return $user->teams()
        ->select('id', 'name')
        ->get();
    }
    public function teamStudents($team){
        return $team->students()->get();
    }
}