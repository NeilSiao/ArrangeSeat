<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomSeat;
use App\Repository\RoomRepository;
use Illuminate\Http\Request;
use App\Repository\UserRepository;
use Illuminate\Support\Facades\Auth;

class RoomSeatController extends Controller
{

    public function __construct(UserRepository $userRepo,RoomRepository $roomRepo)
    {
        $this->userRepo = $userRepo;
        $this->roomRepo = $roomRepo;
    }
    public function index(Request $request)
    {
        $user = Auth::user();

        $roomOption = $this->userRepo->roomOption($user);

        $selRoom = $request->get('roomOption') ?: $roomOption[0]['id'] ?: '';
        $roomSeats = $this->roomRepo->roomSeat($selRoom);



        return view(
            'roomSeat.index',
            compact(
                'roomOption',
                'selRoom',
                'roomSeats',
            )
        );
    }
    public function store(Request $request){
        //dd($request->all());
        $userId = Auth::id();
        $roomId = $request->get('roomOption');

        RoomSeat::where('room_id', $roomId)
        ->delete();

        $seatList = json_decode($request->get('seatList'), true);
        $bulkInsert = [];
        foreach($seatList as $index => $seat){
            $newSeat = [
                'room_id' => $roomId,
                'pos_left' => $seat['pos_left'],
                'pos_top' => $seat['pos_top'],
                'rotate' => $seat['rotate'],
            ];
            array_push($bulkInsert, $newSeat);
        }
        RoomSeat::insert($bulkInsert);
        session()->flash('msg', 'Update Succeed!');
        return redirect()->route('roomSeat.index', ['roomOption' => $roomId]);
    }

}
