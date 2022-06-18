<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserProfileController;
use App\Http\Livewire\Student\StudentEdit;
use App\Http\Livewire\Student\StudentList;
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
Route::group(['middleware' => ['role:admin|faculty']], function () {
    Route::get('/studentList',StudentList::class)->name('studentList');
    Route::get('/student/{student}/edit',StudentEdit::class)->name('student.edit');
    Route::get('/student/{student}/report',[StudentController::class,'StudentReport'])->name('student.report');
});

require __DIR__.'/auth.php';
