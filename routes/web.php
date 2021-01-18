<?php

use App\Models\RoomSeat;
use App\Models\StudentGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
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

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth'])->name('dashboard');




Route::middleware(['auth'])->group(function(){
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

    Route::resource('studentGroup', StudentGroupController::class);


});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
