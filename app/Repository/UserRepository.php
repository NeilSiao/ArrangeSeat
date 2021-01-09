<?php 
namespace App\Repository;

use App\Models\User;

class UserRepository{

    public function testAccount(){
        return User::where('email', 'test@test.com')->first();
    }
}