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
            'teams'
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
        
        session()->flash('msg', 'Create Team Succeed');
        return view('teams.create');
    }



    public function update(Request $request, Team $team)
    {
        $this->authorize('update', $team);
        //$this->stuRepo->updateStudent($team);
        $name = $request->get('name');
        $team->name = $name;
        $team->save();
        session()->flash('msg', 'Update Action Succeed');
        return back();
    }
    public function destroy(Request $request, Team $team)
    {
        $this->authorize('delete', $team);
        
        $result = $team->delete();
        session()->flash('msg', 'Delete Action Succeed');
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
}
