<?php

namespace App\Policies;

use App\Models\Room;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RoomPolicy
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

    public function update(User $user, Room $room){
        return $user->id === $room->user_id;
    }

    public function delete(User $user, Room $room){
        return $user->id === $room->user_id;
    }
}
