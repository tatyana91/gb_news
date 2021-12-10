<?php

use App\Http\Controllers\Admin\ParserController as AdminParserController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoriesController as AdminCategoriesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\News\NewsController;
use Illuminate\Support\Facades\Auth;
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
        Route::get('/category/{slug}', [NewsController::class, 'category'])->name('category');
        Route::get('/{slug}', [NewsController::class, 'one'])->name('one');
    });

Route::name('admin.')
    ->prefix('admin')
    ->middleware(['auth', 'is_admin'])
    ->group(function () {
        Route::get('/', [AdminIndexController::class, 'index'])->name('index');
        Route::get('/test1', [AdminIndexController::class, 'test1'])->name('test1');
        Route::get('/test2', [AdminIndexController::class, 'test2'])->name('test2');
        Route::resource('/news', AdminNewsController::class);
        Route::resource('/categories', AdminCategoriesController::class);

        Route::get('/parser', [AdminParserController::class, 'index'])->name('parser.index');

        Route::name('users.')
            ->prefix('users')
            ->group(function () {
                Route::get('/', [AdminUserController::class, 'index'])->name('index');
                Route::post('/toggleAdmin/{user}', [AdminUserController::class, 'toggleAdmin'])->name('toggleAdmin');
            });
    });

Route::match(['get', 'post'], '/profile', [ProfileController::class, 'update'])
    ->name('updateProfile')
    ->middleware('auth');

Auth::routes();

Route::name('auth.')
    ->prefix('auth')
    ->group(function () {
        Route::get('/{socName}', [LoginController::class, 'loginSoc'])->name('loginSoc');
        Route::get('/{socName}/response', [LoginController::class, 'responseSoc'])->name('responseSoc');
    });

