<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomSeatController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $roomOption = $user
            ->rooms()
            ->select('id', 'name')
            ->get();

        $sel = $request->get('roomOption');
        $defRoomVal = $sel ? :  $roomOption[0]['id'] ;

        return view(
            'roomSeat.index',
            compact(
                'roomOption',
                'defRoomVal'
            )
        );
    }
}
