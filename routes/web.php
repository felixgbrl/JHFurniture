<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\FurnitureController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;





Route::get('/',[FurnitureController::class,'index']);

Route::GET('/login', function () {
    return view('login');
})->middleware('guest');
Route::post('/login',[LoginController::class,'authenticate']);

Route::get('/register',[RegisterController::class,'index']);
Route::post('/register',[RegisterController::class,'store']);

Route::post('/addfurniture', [FurnitureController::class, 'addFurniture']);

Route::get('/addfurniture', function(){
    return view('add');
});

Route::get('/logout', function(){
    return view('login');
});
Route::POST('/logout', [LoginController::class, 'logout']);
