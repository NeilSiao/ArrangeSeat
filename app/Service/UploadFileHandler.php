<?php 
namespace App\Service;

use Cloudinary\Cloudinary;
use Illuminate\Support\Facades\Storage;

class UploadFileHandler{

    public function __construct()
    {

    }
    public function saveStudentAvatar($file){      
        $path = Storage::putFile('public/stu_img', $file);
        //dd($path, Storage::exists('stu_img/' . $path) );
        return $path;
    }
    public function deleteStudentAvatar($path){
        Storage::delete($path);
    }

    
}

