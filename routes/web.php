<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('/projects', ProjectController::class)->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/projects/{project}/tasks',[TaskController::class,'store'])->name('addtask');

Route::patch('/projects/{project}/tasks/{task}',[TaskController::class,'update']);

Route::delete('/projects/{project}/tasks/{task}',[TaskController::class,'destroy']);

Route::get('/profile',[profileController::class,'index']);

Route::patch('/profile',[profileController::class, 'update']);
