<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\IndexController;
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

/*Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
*/
Route::get('/', function () {
    return Inertia::render('Main');
})->name('main');


/*Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');*/

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

// cust
//Route::get('categorys', [IndexController::class, 'index'])->name('index');




// Social route
Route::prefix('auth')->group(function () {
  Route::get('facebook', [SocialController::class, 'facebookRedirect'])->name('auth.facebook');
  Route::get('facebook/callback', [SocialController::class, 'loginWithFacebook']);

  Route::get('google', [SocialController::class, 'googleRedirect'])->name('auth.google');
  Route::get('google/callback', [SocialController::class, 'loginWithGoogle']);

  Route::get('apple', [SocialController::class, 'appleRedirect'])->name('auth.apple');
  Route::get('apple/callback', [SocialController::class, 'loginWithApple']);
});
