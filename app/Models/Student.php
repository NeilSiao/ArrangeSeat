<?php

namespace App\Models;

use App\Models\Team;
use App\Models\RoomSeat;
use App\Models\CloudImage;
use App\Service\ExcelExporter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

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

    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }

    public function image(){
        return $this->hasOne(CloudImage::class);
    }

}
