<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request){
        
        $students =  Student::paginate(5);

        return view('student.index',compact(
            'students'
        ));
    }
    public function create(Request $request){
        return view('student.create');
    }
    public function store(Request $request){
        dd(12);
    }   
    public function show(Request $request, Student $student){ 
        return view('student.show');
    }
    
    public function edit(Request $request){
        return view('student.edit');
    }
    public function update(Request $request){
        dd(14);
    
    }
    public function destroy(Request $request){
        $result = Room::where($request->input('room_id'))->delete();
        return back();
    }
}
