<?php 
namespace App\Repository;

use App\Models\Team;
use Illuminate\Support\Facades\Auth;



class TeamRepository{    

    
    

    public function teamStudents($teamId){
        return Team::where('id', $teamId)
        ->first()
        ->students()
        ->get();
        
        
    }
}