<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use APP\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// admin privileges only
Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->Middleware('is_admin');
// user privilege page 
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//retrive data

Route::get('/status', [UsersController::class,'show']);

Route::get('status', [UserController::class,'show']);
//List of 5 Days and current weather report on admin page
Route::get('weather', [ListController::class,'show']);
Route::get('/passwords', [ResetPasswordController::class,'redirectTo']);
//Route::post('/password/reset', 'ResetPasswordController@reset');

