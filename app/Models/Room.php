<?php

namespace App\Models;

use App\Models\Student;
use App\Models\RoomSeat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory;

    public function roomSeat(){
        return $this->hasMany(RoomSeat::class);
    }
 
  
    

}
