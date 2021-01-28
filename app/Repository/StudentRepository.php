<?php 
namespace App\Repository;

use App\Models\Student;
use App\Models\CloudImage;
use App\Service\CloudinaryService;
use App\Service\UploadFileHandler;
use Illuminate\Support\Facades\Auth;
use App\Repository\CloudImageRepository;



class StudentRepository{    

    public function __construct(
        UploadFileHandler $fileHandler,
        CloudinaryService $cloud,
        CloudImageRepository $imageRepo
        ){
        $this->fileHandler = $fileHandler;
        $this->cloud = $cloud;
        $this->imageRepo = $imageRepo;
    }
    public function updateStudent($student){
        $student->no= request()->get('no');
        $student->name= request()->get('name');
        $student->gender= request()->get('gender');
        $file= request()->file('upload_img');
        if($file != null){
            $image = $student->image;
            if($image != null){
                $this->cloud->delCloudImg($image->public_id);
            }else{
                $image = new CloudImage();
            }
            $apiInfo = $this->cloud->saveImgToCloud($file);
            $this->imageRepo->storeImg($image, $apiInfo);

            $student->image()->save($image);
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
        $student->save();
        if($file != null){
            $apiInfo = $this->cloud->saveImgToCloud($file);
            $image = new CloudImage;
            $this->imageRepo->storeImg($image, $apiInfo);
            $student->image()->save($image);
        }

        return $student;
    }

}