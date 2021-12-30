<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\FurnitureController;
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



Route::get('/', [FurnitureController::class, 'index']);


Route::get('/login', function () {
    return view('login');
})->middleware('guest');

Route::POST('/login', [UserController::class, 'login']);


Route::GET('/register', function(){
    return view('register');
});


Route::POST('/register', [UserController::class, 'register']);


ROute::POST('/logout', [UserController::class, 'logout']);

Route::post('/addfurniture', [FurnitureController::class, 'addFurniture']);

Route::get('/addfurniture', function(){
    return view('add');
});

Route::POST('/updateFurniture/{furniture:furniture_name}', [FurnitureController::class, 'updateFurniture'])->middleware('auth');
Route::GET('/updateFurniture/{furniture:furniture_name}', [FurnitureController::class, 'UpdateIndex'])->middleware('auth');

Route::GET('/deleteFurniture/{furniture:id}', [FurnitureController::class, 'deleteFurniture'])->middleware('auth');

Route::GET('/detail/{furniture:furniture_name}', [FurnitureController::class, 'displayDetail']);
