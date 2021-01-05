<?php

use App\Models\RoomSeat;
use App\Models\StudentGroup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\RoomSeatController;

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
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');




Route::middleware(['auth'])->prefix('source')->group(function(){
    Route::resources([
        'room'=>RoomController::class,
        'student'=>StudentController::class,
        'roomSeat' => RoomSeatController::class,
        'StudentGroup' => StudentGroup::class
    ]);



});
