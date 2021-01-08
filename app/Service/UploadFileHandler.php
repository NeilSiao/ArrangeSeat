<?php 
namespace App\Service;

use Illuminate\Support\Facades\Storage;

class UploadFileHandler{

    public function saveStudentAvatar($file){      
        $path = Storage::putFile('public/stu_img', $file);
        //dd($path, Storage::exists('stu_img/' . $path) );
        return $path;
    }

}

