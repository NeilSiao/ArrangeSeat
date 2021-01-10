<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Service\ExcelExporter;
use App\Service\UploadFileHandler;
use Illuminate\Support\Facades\Auth;
use App\Repository\StudentRepository;
use App\Http\Requests\StoreStudentRequest;

class StudentController extends Controller
{

    public $fileHandler;
    public function __construct(
        StudentRepository $stuRepo,
        UploadFileHandler $fileHandler
    ) {
        $this->stuRepo = $stuRepo;
        $this->fileHandler = $fileHandler;
    }
    public function index(Request $request)
    {
        $user = Auth::user();
        $students =  $user->students()
            ->orderBy('created_at', 'Desc')
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

    public function downloadExcel(Request $request){
        $title = ['no', 'name', 'gender'];
        $data = Student::select($title)
        ->get()
        ->toArray();
        

        $exporter = new ExcelExporter('room',$title ,$data );
        $exporter->make();
        $exporter->downloadExcel();
    }
}
