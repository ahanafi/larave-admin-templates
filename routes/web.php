<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('users', UserController::class);
});


Route::group([
    'prefix' => 'common-pages',
    'as' => 'common-pages.'
], function () {
    Route::get('blank', [PagesController::class, 'blank'])->name('blank');
    Route::get('starter', [PagesController::class, 'starter'])->name('starter');
});

Route::group([
    'prefix' => 'error-pages',
    'as' => 'error-pages.'
], function () {
    Route::get('500', [PagesController::class, 'error500'])->name('error500');
    Route::get('404', [PagesController::class, 'error404'])->name('error404');
});
