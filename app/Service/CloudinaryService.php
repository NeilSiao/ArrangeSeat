<?php

namespace App\Service;

use Cloudinary\Cloudinary;

class CloudinaryService
{

    public function __construct(
        Cloudinary $cloud
    ) {
        $this->uploadApi = $cloud->uploadApi();
    }

    public function saveImgToCloud($file)
    {
        $path   = $file->getRealPath();
        $option = [
            'folder' => 'arrange_student_avatar',
            'width'  => '300',
            'height' => '200',
        ];
        return $this->uploadApi->upload($path, $option);
    }

    public function delCloudImg($public_id)
    {
        return $this->uploadApi->destroy($public_id);
    }

}
