<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\UserRepository;
use Illuminate\Support\Facades\Auth;

class RandomSeatController extends Controller
{
    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }
    //
    public function index(Request $request){
        $user = Auth::user();
        $roomOption = $this->userRepo->roomOption($user);
        $selRoom = $request->get('roomOption') ?: $roomOption[0]['id'] ?: '';
        $roomSeat = $this->userRepo->roomSeat($selRoom);
        
        $teamOption = $this->userRepo->teamOption($user);


        return view('randomSeat.index', compact(
            'roomOption',
            'selRoom',
            'roomSeat',
            'teamOption',
        ));
    }
}
