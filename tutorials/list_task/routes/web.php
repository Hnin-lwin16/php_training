<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\RegistController;
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

Route::get('/',[ListController::class,'index'])->name("index");
Route::post('/task',[ListController::class,'store'])->name("store");
Route::delete('/task/{task}',[ListController::class,'destroy'])->name("destroy");

Route::get('/student/list',[StudentController::class,'list'])->name("student.get.list");
Route::get('/student',[StudentController::class,'index'])->name("student.index");
Route::post('/student',[StudentController::class,'store'])->name("student.store");
Route::get('/student/edit/{id}',[StudentController::class,'edit'])->name("student.edit");
Route::post('/student/edit/{id}',[StudentController::class,'update'])->name("student.update");

Route::get('/major',[MajorController::class,'index'])->name("major.index");
Route::post('/major',[MajorController::class,'store'])->name("major.store");
Route::get('/major/list',[MajorController::class,'list'])->name("major.list");
Route::delete('/major/list/{id}',[MajorController::class,'destroy'])->name("major.destroy");
Route::get('/major/edit/{id}',[MajorController::class,'edit'])->name("major.edit");
Route::post('/major/edit/{id}',[MajorController::class,'update'])->name("major.update");

Route::delete('/student/list/{id}',[StudentController::class,'destroy'])->name("student.destroy");

Route::get('/excel',[StudentController::class,'exportExcel'])->name("excel");

Route::post('/student/list',[StudentController::class,'import'])->name("student.get");

Route::get('/search',[StudentController::class,'search'])->name("search");

Auth::routes([
    'verify' => true
]);

Route::get('/home',[StudentController::class,'list'])->name('home')->middleware('verified');

