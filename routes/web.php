<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\School_gradeController;
//use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\StudentController;
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/students',[StudentController::class, 'index'])->name('students.index');

Route::get('/students/create', [StudentController::class, 'create'])->name('student.create');
Route::post('/students/store/', [StudentController::class, 'store'])->name('student.store');

Route::get('/students/edit/{student}', [StudentController::class, 'edit'])->name('student.edit');
Route::put('/students/edit/{student}',[StudentController::class, 'update'])->name('student.update');

Route::get('/students/show/{student}', [StudentController::class, 'show'])->name('student.show');

Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('student.destroy');

Route::get('/school_grade/create', [School_gradeController::class, 'create'])->name('school_grade.create');
Route::post('/school_grade/store', [School_gradeController::class, 'store'])->name('school_grade.store');

Route::get('/school_grade/show', [School_gradeController::class, 'show'])->name('school_grade.show');