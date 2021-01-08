<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    public function getPhotoAttribute($value)
    {
        $path=  Storage::url($value);
        return $path;
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
