<?php 
namespace App\Repository;

use App\Models\Room;
use Illuminate\Support\Facades\Auth;



class RoomRepository{    

    public function updateRoom($room, $columns){
        foreach($columns as $value){
            $room->$value = request()->get($value);
        }        
        return $room->save();
    }

    public function storeRoom($columns){
        $room = new Room();
        foreach($columns as $value){
            $room->$value = request()->get($value);
        }        
        $id = Auth::id();
        $room->user_id = $id;
        return $room->save();
    }

    public function testAccount(){
        return Room::where('email', 'test@test.com')->first();
    }

    public function roomSeat($roomId){
        return Room::where('id', $roomId)
        ->first()
        ->roomSeat()
        ->get()
        ->toJson();
    }
}