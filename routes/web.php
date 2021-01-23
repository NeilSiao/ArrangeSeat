<?php

use App\Http\Controllers\HomeController;
use App\Models\RoomSeat;
use App\Models\StudentGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\RoomSeatController;
use App\Http\Controllers\RandomSeatController;
use App\Http\Controllers\StudentGroupController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('index');



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function(){

    Route::get('/dashboard', [HomeController::class, 'index'])
    ->name('dashboard');
    Route::patch('/dashboard', [HomeController::class, 'patch'])
    ->name('user.patch');

    Route::resource('student', StudentController::class)
    ->except(['show', 'edit']);
    Route::get('student/excel', [StudentController::class, 'downloadExcel'])
    ->name('student.excel');

    Route::resource('room', RoomController::class)
    ->except(['show', 'edit']);
    Route::get('room/excel', [RoomController::class, 'downloadExcel'])
    ->name('room.excel');

    Route::resource('roomSeat', RoomSeatController::class);

    Route::resource('randomSeat', RandomSeatController::class);

    Route::get('team/excel', [TeamController::class, 'downloadExcel'])
    ->name('team.excel');
    Route::resource('team', TeamController::class)
    ->except(['show', 'edit']);

    Route::get('team/{team}/students', [TeamController::class, 'students'])
    ->name('teamStudents.index');
    Route::post('team/{team}/students', [TeamController::class, 'storeTeamStudents'])
    ->name('teamStudents.store');
});

Auth::routes();


