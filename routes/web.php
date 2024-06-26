<?php

use App\Http\Controllers\StudentController;
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

//Route::resource('student', StudentController::class);

//Route::get('/students','App\Http\Controllers\StudentController@index')->name('students.index');
Route::get('/student',[StudentController::class, 'index'])->name('students.index');