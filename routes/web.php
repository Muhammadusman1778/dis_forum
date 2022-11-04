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

Route::get('/',[App\Http\Controllers\DiscussionsController::class,'dashboard']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
Route::get('/home', [App\Http\Controllers\HomeController::class,'index'])->name('home');
Route::resource('discussion',App\Http\Controllers\DiscussionsController::class);
Route::resource('discussion/{discussion}/replies',App\Http\Controllers\RepliesController::class);
Route::post('discussion/{discussion}/replies/{reply}/mark-as-best-reply', [App\Http\Controllers\DiscussionsController::class,'reply'])->name('discussion.best-reply');
Route::get('users/notifications',[App\Http\Controllers\UsersController::class,'notifications'])->name('users.notifications');
