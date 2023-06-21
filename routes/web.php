<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TampilanController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
})->name('login');

// Route::get('/tampilan', function () {
//     return view('tampilan');
// });

Route::post('auth',[UserController::class,'auth']);
Route::get('register',[UserController::class,'register']);
Route::post('register/daftar',[UserController::class,'daftar']);
Route::get('logout',[UserController::class,'logout']);

Route::middleware('auth')->group(function () {
Route::get('home',[UserController::class,'view'])->middleware('auth');
Route::get('admin',[UserController::class,'show']);

Route::get('tampilan',[TampilanController::class,'tampilan']);

Route::get('menu',[MenuController::class,'show']);
Route::get('menu/view/{id}',[MenuController::class,'cart']);
Route::get('menu/add',[MenuController::class,'add']);
Route::post('menu/create',[MenuController::class,'create']);
Route::get('menu/delete/{id}',[MenuController::class,'delete']);
Route::get('menu/edit/{id}',[MenuController::class,'edit']);
Route::post('menu/update/{id}',[MenuController::class,'update']);

});

