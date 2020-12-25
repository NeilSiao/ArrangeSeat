<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Support\Facades\Request;

class RoomController extends Controller
{
    public function index(Request $request){
        return Room::all();
    }
    public function create(Request $request){

    }
    public function store(Request $request){

    }
    public function show(Request $request){

    }
    public function edit(Request $request){

    }
    public function update(Request $request){

    }
    public function destroy(Request $request){
        $result = Room::where($request->input('room_id'))->delete();
        return back();
    }
}
