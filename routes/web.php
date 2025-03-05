<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\FollowsController;
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

require __DIR__ . '/auth.php';
Route::middleware('auth')->group(function () {

  Route::get('top', [PostsController::class, 'index']);
  Route::get('profile', [ProfileController::class, 'profile']);

  Route::get('search', [UsersController::class, 'index']);
  Route::get('follow-list', [PostsController::class, 'index']);

  Route::get('follower-list', [PostsController::class, 'index']);
  Route::get('added', function () {
    return view('auth.added');
  })->name('user.success');
  Route::get('logout', [AuthenticatedSessionController::class, 'logout']);

  Route::get('/followList.blade', [FollowsController::class, 'followList']);
  Route::get('/followerList.blade', [FollowsController::class, 'followerList']);

  Route::post('/follow', [FollowsController::class, 'followUser'])->name('follow-user');

});
