<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ArticleController;
use Inertia\Inertia;

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

Route::prefix('admin')->group(function () {

  Route::get('/dashboard', [IndexController::class, 'index'])->name('index');

  Route::get('/users', [UsersController::class, 'index'])->name('users');

  Route::resource('/article', ArticleController::class);

  Route::get('/logs', function () {
      return Inertia::render('Admin/Logs');
  })->name('logs');

});
