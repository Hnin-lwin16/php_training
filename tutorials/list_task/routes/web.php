<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListController;
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