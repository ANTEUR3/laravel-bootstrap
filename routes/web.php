<?php

use Illuminate\Support\Facades\Route;

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




Route::view('/','home-page');
Route::post('/add_user', [App\Http\Controllers\UserController::class,'store']);
Route::post('/authentification', [App\Http\Controllers\UserController::class,'authentification']);
Route::post('/addSkill',[App\Http\Controllers\UserController::class,'addSkill'])->name('newSkill');

Route::get('/profile/{user}',[App\Http\Controllers\UserController::class,'profile'] )->name('profile');

Route::view('/visit','visitor');
Route::view('/singUp','singUp');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
