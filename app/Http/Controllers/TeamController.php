<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Service\ExcelExporter;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreTeamRequest;

class TeamController extends Controller
{
  
    public function index(Request $request)
    {
        $user = Auth::user();
        $teams =  $user->teams()
            ->orderBy('created_at', 'Desc')
            ->paginate(10);

        return view('teams.index', compact(
            'teams',
        ));
    }
    public function create(Request $request)
    {

        return view('teams.create');
    }
    public function store(StoreTeamRequest $request)
    {
        $newTeam = new Team();
        $newTeam->user_id = Auth::id();
        $name = $request->get('name');
        $newTeam->name= $name;
        $newTeam->save();
        
        session()->flash('msg', "新增團隊${name}成功");
        return view('teams.create');
    }



    public function update(Request $request, Team $team)
    {
        $this->authorize('update', $team);
        //$this->stuRepo->updateStudent($team);
        $name = $request->get('name');
        $team->name = $name;
        $team->save();
        session()->flash('msg', "更新團隊${name}成功");
        return back();
    }
    public function destroy(Request $request, Team $team)
    {
        $this->authorize('delete', $team);
        $name= $team->name;
        $result = $team->delete();
        session()->flash('msg', "刪除團隊${name}成功");
        return back();
    }
    public function downloadExcel(Request $request)
    {
        $user = Auth::user();
        $title = ['name'];
        $data = $user->teams()->select($title)->get()->toArray();

        $exporter = new ExcelExporter('Teams', $title, $data);
        $exporter->make();
        $exporter->downloadExcel();
    }

    public function students(Request $request, Team $team){
        $user = Auth::user();
        $students = $user->students()->get();
        $alreadyInTeam = $team->students()
        ->pluck('students.id')
        ->toArray();
        foreach($students as $student){
            if(in_array($student->id, $alreadyInTeam)){
                $student->isChoose = 1;
            }else{
                $student->isChoose = 0;
            }
        }
        return response()->json($students);
    }
}
