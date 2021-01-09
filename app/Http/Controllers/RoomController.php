<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Repository\RoomRepository;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreRoomRequest;
use Illuminate\Support\Facades\Request;

class RoomController extends Controller
{
    public function __construct(RoomRepository $roomRepo)
    {
        $this->roomRepo = $roomRepo;
    }
    public function index(Request $request){
        $user = Auth::user();
        
        $rooms =  $user->rooms()
        ->orderBy('created_at', 'desc')
        ->paginate(10);
        
        return view('room.index',compact(
            'rooms'
        ));
    }
    public function create(Request $request){
        return view('room.create');
    }
    public function store(StoreRoomRequest $request){
        $result = $this->roomRepo->storeRoom(['no', 'name']);
        session()->flash('msg', 'Create Room Succeed');
        return view('room.create');
    }   

    public function update(Request $request, Room $room){
        $this->authorize('update', $room);
        $this->roomRepo->updateRoom($room, ['no', 'name']);
        return back();
    }
    public function destroy(Request $request, Room $room){
        $this->authorize('delete', $room);
        $room->delete();
        return back();
    }

    public function downloadExcel(Request $request){
        
    }
}
