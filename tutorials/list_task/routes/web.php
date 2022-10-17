<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MajorController;
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
//Route::post('/student/list',[StudentController::class,'store'])->name("student.list");
Route::get('/student',[StudentController::class,'index'])->name("student.index");
Route::post('/student',[StudentController::class,'store'])->name("student.store");
Route::get('/major',[MajorController::class,'index'])->name("major.index");
Route::post('/major',[MajorController::class,'store'])->name("major.store");
Route::delete('/student/list/{id}',[StudentController::class,'destroy'])->name("student.destroy");
Route::get('/student/edit/{id}',[StudentController::class,'edit'])->name("student.edit");
Route::post('/student/edit/{id}',[StudentController::class,'update'])->name("student.update");
Route::get('/excel',[StudentController::class,'exportExcel'])->name("excel");
//Route::get('/student/list/import',[StudentController::class,'import'])->name("import.post");
//Route::get('/student/list/post',[StudentController::class,'test'])->name("import");
//Route::post('/major',[StudentController::class,'import'])->name("import.store");
Route::post('/student/list',[StudentController::class,'import'])->name("student.get");
//Route::get('/import',[StudentController::class,'import'])->name("import");


