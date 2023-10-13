<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('google-login', [GoogleController::class, 'loginWithGoogle'])->name('google.login');
Route::any('callback', [GoogleController::class, 'callbackFromGoogle'])->name('callback');


Route::resource('posts',PostController::class);
Route::post('like/{post}/store', [LikeController::class, 'store'])->name('like.store');
Route::delete('like/{post}/delete', [LikeController::class, 'destroy'])->name('like.delete');
