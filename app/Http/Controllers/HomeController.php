<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        return view('home', compact(
            'user'
        ));
    }

    public function patch(Request $request){
        $name = $request->get('name');
        $user = Auth::user();
        $user->name = $name;
        $user->save();
        session()->flash('msg', '使用者資料更新成功');
        return back();
    }
}
