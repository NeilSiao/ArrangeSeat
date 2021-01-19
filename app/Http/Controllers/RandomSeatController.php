<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\RoomRepository;
use App\Repository\TeamRepository;
use App\Repository\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RandomSeatController extends Controller
{
    public function __construct(
        UserRepository $userRepo,
        RoomRepository $roomRepo,
        TeamRepository $teamRepo,
        )
    {
        $this->userRepo = $userRepo;
        $this->roomRepo = $roomRepo;
        $this->teamRepo = $teamRepo;
    }
    //
    public function index(Request $request){
        $user = Auth::user();
        $roomOption = $this->userRepo->roomOption($user);
        $selRoom = $request->get('roomOption') ?: $roomOption[0]['id'] ?: '';
        $roomSeat = $this->roomRepo->roomSeat($selRoom);
        
        $teamOption = $this->userRepo->teamOption($user);
        $selTeam = $request->get('teamOption') ?: $teamOption[0]['id'] ?: '';

        $teamStudent = $this->teamRepo->teamStudents($selTeam);
     

        return view('randomSeat.index', compact(
            'roomOption',
            'selRoom',
            'roomSeat',
            'teamOption',
            'teamStudent',
        ));
    }
}
