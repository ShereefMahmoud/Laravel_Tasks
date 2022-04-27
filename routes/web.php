<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\blogController;
use App\Http\Controllers\adminController;

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

Route::get('login',[adminController::class,'login']);
Route::post('dologin',[adminController::class,'dologin']);

Route::get('admin/',[adminController::class,'index']);
Route::get('admin/create',[adminController::class,'create']);
Route::post('admin/store',[adminController::class,'store']);
Route::get('admin/delete/{id}',[adminController::class,'destroy']);
Route::get('admin/edit/{id}',[adminController::class,'edit']);
Route::post('admin/update/{id}',[adminController::class,'update']);
Route::get('logout',[adminController::class,'logout']);


Route::get('blog/create',[blogController::class,'create']);
Route::post('blog/store',[blogController::class,'store']);
