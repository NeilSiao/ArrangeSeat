<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Models\Student;
use App\Service\UploadFileHandler;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public $fileHandler;
    public function __construct(UploadFileHandler $fileHandler) {
        $this->fileHandler = $fileHandler;

    }
    public function index(Request $request)
    {

        $students =  Student::orderBy('created_at', 'Desc')
        ->paginate(10);
        
        
        return view('student.index', compact(
            'students'
        ));
    }
    public function create(Request $request)
    {
        
        return view('student.create');
    }
    public function store(StoreStudentRequest $request)
    {
        dd($request->all());
    }
    public function show(Request $request, Student $student)
    {
        return view('student.show');
    }

    public function edit(Request $request)
    {
        return view('student.edit');
    }
    public function update(Request $request, Student $student)
    {
        $no = $request->get('no');
        $name = $request->get('name');
        $gender = $request->get('gender');
        $file = $request->file('upload_img');
        if($file != null){
            $path = $this->fileHandler->saveStudentAvatar($file);
            $student->photo = $path;
        }
        $student->no = $no;
        $student->name = $name;
        $student->gender = $gender;
        $student->save();

        session()->flash('msg', 'Update Action Succeed');
        return back();
    }
    public function destroy(Request $request, Student $student)
    {
        $this->fileHandler->deleteStudentAvatar($student->photo);
        $result = $student->delete();
        session()->flash('msg', 'Delete Action Succeed');
        return back();
    }
}
