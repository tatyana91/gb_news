<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\News\NewsController;
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

Route::get('/', [IndexController::class, 'index'])->name('home');

Route::view('/about', 'about')->name('about');

Route::name('news.')
    ->prefix('news')
    ->group(function () {
        Route::get('/', [NewsController::class, 'all'])->name('all');
        Route::get('/categories', [NewsController::class, 'categories'])->name('categories');
        Route::get('/categories/{slug}', [NewsController::class, 'category'])->name('category');
        Route::get('/{slug}', [NewsController::class, 'one'])->name('one');
    });

Route::name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::get('/test1', [AdminController::class, 'test1'])->name('test1');
        Route::get('/test2', [AdminController::class, 'test2'])->name('test2');
        Route::get('/create', [AdminController::class, 'create'])->name('create');
        Route::post('/create', [AdminController::class, 'create'])->name('create');
    });

Auth::routes();
