<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentGroupController extends Controller
{
    public $fileHandler;
    public function __construct(         ) {
    
    }
    public function index(Request $request)
    {
        $user = Auth::user();
        $studentGroups =  $user->studentGroups()
            ->orderBy('created_at', 'Desc')
            ->paginate(10);


        return view('studentGroup.index', compact(
            'studentGroups'
        ));
    }
    public function create(Request $request)
    {

        return view('student.create');
    }
    public function store(StoreStudentRequest $request)
    {
        $this->stuRepo->storeStudent();
        session()->flash('msg', 'Create Student Succeed');
        return view('student.create');
    }



    public function update(Request $request, Student $student)
    {
        $this->authorize('update', $student);
        $this->stuRepo->updateStudent($student);

        session()->flash('msg', 'Update Action Succeed');
        return back();
    }
    public function destroy(Request $request, Student $student)
    {
        $this->authorize('delete', $student);
        $this->fileHandler->deleteStudentAvatar($student->photo);
        $result = $student->delete();
        session()->flash('msg', 'Delete Action Succeed');
        return back();
    }
}
