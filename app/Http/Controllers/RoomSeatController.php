<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomSeatController extends Controller
{
    public function index(Request $request){
        return view('arrangeSeat');
    }
}
