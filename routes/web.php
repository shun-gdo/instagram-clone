<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UserController;
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
    return view('auth/login');
});

Route::get('/', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('index');

Route::get('/searchUser', function () {
    return view('Users/search_user');
})->middleware(['auth'])->name('searchUser');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/',[PostsController::class,'index'])->name('posts.index');
    
    Route::get('/search',[UserController::class, 'search'])->name('search');
});
    Route::resource('posts',PostsController::class,['only' => ['store']])->names(['posts.store']);

require __DIR__.'/auth.php';
