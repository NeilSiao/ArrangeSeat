<?php 
namespace App\Repository;

use App\Models\Team;
use Illuminate\Support\Facades\Auth;



class TeamRepository{    

    
    

    public function teamStudents($teamId){
        $student =  Team::where('id', $teamId)
        ->first()
        ->students()
        ->get();
        
        return $student->each(function($stu) use ($teamId){
            $stu->team_id = $teamId;
            $stu->photo = $stu->image->secure_url ?? asset('img/fake.png');
        });
        
    }
}