<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// route for user model

Route::get('/users', [App\Http\Controllers\UserController::class,'index']);
Route::get('/users/{user}', [App\Http\Controllers\UserController::class,'show']);
Route::get('/users/{user}/edit', [App\Http\Controllers\UserController::class,'edit']);
Route::post('/users/{user}/edit', [App\Http\Controllers\UserController::class,'update']);
Route::get('/users/{user}/delete', [App\Http\Controllers\UserController::class,'delete']);

//route for animal model
Route::get('/animals', [App\Http\Controllers\AnimalController::class,'index']);
Route::get('/animals/create', [App\Http\Controllers\AnimalController::class,'create'])->middleware('auth');
Route::post('/animals/create', [App\Http\Controllers\AnimalController::class,'store']);
Route::get('/animals/{animal}', [App\Http\Controllers\AnimalController::class,'show']);
Route::get('/animals/{animal}/edit', [App\Http\Controllers\AnimalController::class,'edit']);
Route::post('/animals/{animal}/edit', [App\Http\Controllers\AnimalController::class,'update']);
Route::get('/animals/{animal}/delete', [App\Http\Controllers\AnimalController::class,'delete']);