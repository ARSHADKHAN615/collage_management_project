<?php

use App\Http\Controllers\UserProfileController;
use App\Http\Livewire\Student\StudentList;
use App\Http\Livewire\Test;
use App\Http\Livewire\UserProfile;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



Route::get('/profile',[UserProfileController::class,'index'])->name('profile');
Route::get('/studentList',StudentList::class)->name('studentList');



require __DIR__.'/auth.php';
