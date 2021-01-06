<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function getPhotoAttribute($value)
    {
        $path= 'stu_img' . DIRECTORY_SEPARATOR . $value;
        return asset($path);
    }
    public function getGenderAttribute($value)
    {
        switch ($value) {
            case 'F':
                return 'Female';
                break;
            case 'M':
                return 'Male';
                break;
            default:
                return '';
                break;
        }
    }
}
