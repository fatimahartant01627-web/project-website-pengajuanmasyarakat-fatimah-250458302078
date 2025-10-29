<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\categoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    $nama = 'jay';
    $jurusan = 'trpl';
    $asal = 'cibanjar';
    return view('index', compact('nama', 'jurusan', 'asal'));
});

Route::get('/table', function () {
    return view('table');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'iniAdmin'])->group(function () {

    // Route Per Controller
    Route::controller(FrontController::class)->group(function() {
        Route::get('/dashboard', 'indexFront')->name('dashboard.admin');
    });
     Route::controller(categoryController::class)->group(function() {
        Route::get('/category', 'indexCategory')->name('index.category');
        route::post('/create-category', 'createCategory')->name('create.category');
        route::put('/update-category', 'updateCategory')->name('update.category');
        route::delete('/delete-category', 'deleteCategory')->name('delete.category');
    });
     Route::controller(UserController::class)->group(function() {
        Route::get('/user', 'indexUser')->name('User.admin');
        Route::post('/user-create', 'createUser')->name('user.create');
    });
});
