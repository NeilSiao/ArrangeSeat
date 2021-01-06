<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Support\Facades\Request;

class RoomController extends Controller
{
    public function index(Request $request){
        
        $rooms =  Room::paginate(10);
        
        return view('room.index',compact(
            'rooms'
        ));
    }
    public function create(Request $request){
        return view('room.create');
    }
    public function store(Request $request){
        dd(12);
    }   
    public function show(Request $request){ 
        dd(13);
    }
    
    public function edit(Request $request){
        return view('room.edit');
    }
    public function update(Request $request){
        dd(14);
    
    }
    public function destroy(Request $request){
        $result = Room::where($request->input('room_id'))->delete();
        return back();
    }
}
