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

  // トップページ
  Route::get('top', [PostsController::class, 'index']);
  // プロファイル
  Route::get('profile', [ProfileController::class, 'profile']);
  Route::post('profile/{id}', [ProfileController::class, 'update'])->name('profileUpdate');
  // ユーザー検索
  Route::post('search', [UsersController::class, 'search'])->name('users.search');
  Route::get('search', [UsersController::class, 'search']);
  // Route::post('/users/{id}', [UsersController::class, 'update'])->name('users.update');
  // フォローとフォロワー
  Route::get('follows/followList', [FollowsController::class, 'followList']);
  Route::get('follows/followerList', [FollowsController::class, 'followerList']);
  Route::get('/users/{id}', [FollowsController::class, 'followList'])->name('usersProfile');
  // ユーザープロフィール
  Route::get('/users/{id}', [FollowsController::class, 'userProfile'])->name('usersProfile');

  Route::post('/follow/{id}', [UsersController::class, 'follow'])->name('follow');
  Route::post('/unfollow/{id}', [UsersController::class, 'unfollow'])->name('unfollow');

  Route::post('/follow', [FollowsController::class, 'followUser'])->name('follow-user');

  // 投稿機能
  Route::post('/post', [PostsController::class, 'store'])->name('post.store');
  Route::post('/post/{id}/update', [PostsController::class, 'update'])->name('post.update');
  Route::get('/post/{id}/delete',[PostsController::class, 'delete'])->name('post.delete');
  Route::post('/post/{id}/search',[PostsController::class, 'search'])->name('post.search');

  // ログアウト
  Route::get('logout', [AuthenticatedSessionController::class, 'logout']);

  // 登録後ページ
  Route::get('added', function () {
    return view('auth.added');
  })->name('user.success');

});

  // Route::get('/followList.blade', [FollowsController::class, 'followList']);
  // Route::get('/followerList.blade', [FollowsController::class, 'followerList']);
