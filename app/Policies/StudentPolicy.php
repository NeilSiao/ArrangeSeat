<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Student;
use Illuminate\Auth\Access\HandlesAuthorization;

class StudentPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function update(User $user, Student $student){
        return $user->id === $student->user_id;
    }
    public function delete(User $user, Student $student){
        return $user->id === $student->user_id;
    }
}
