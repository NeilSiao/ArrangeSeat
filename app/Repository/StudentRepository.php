<?php 
namespace App\Repository;

use App\Models\Student;
use App\Service\UploadFileHandler;
use Illuminate\Support\Facades\Auth;



class StudentRepository{    

    public function __construct(UploadFileHandler $fileHandler){
        $this->fileHandler = $fileHandler;
    }
    public function updateStudent($student){
        $student->no= request()->get('no');
        $student->name= request()->get('name');
        $student->gender= request()->get('gender');
        $file= request()->file('upload_img');
        if($file != null){
            $path = $this->fileHandler->saveStudentAvatar($file);
            $student->photo = $path;
        }
        return $student->save();
    }

    public function storeStudent(){
        $student = new Student();
        $student->user_id = Auth::id();
        $student->no= request()->get('no');
        $student->name= request()->get('name');
        $student->gender= request()->get('gender');
        $file= request()->file('upload_img');
        if($file != null){
            $path = $this->fileHandler->saveStudentAvatar($file);
            $student->photo = $path;
        }
        $student->save();
        return $student;
    }

}