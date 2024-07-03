<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserFollowController;
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
    
    Route::prefix('users/{id}')->group(function(){
       Route::get('/',[UserController::class,'show'])->name('users.show'); 
       
       Route::post('follow', [UserFollowController::class, 'store'])->name('user.follow');
       Route::delete('unfollow', [UserFollowController::class, 'destroy'])->name('user.unfollow');
    //   Route::get('followings', [UsersController::class, 'followings'])->name('users.followings');
    //   Route::get('followers', [UsersController::class, 'followers'])->name('users.followers');
    //   Route::get('favorites', [UsersController::class, 'favorites'])->name('users.favorites');
    });
});
    Route::resource('posts',PostsController::class,['only' => ['store']])->names(['posts.store']);

require __DIR__.'/auth.php';
