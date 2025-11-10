<?php

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ComplainsController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\User\ComplainsController as UserComplainsController;
use App\Http\Controllers\UserController;
use App\Models\Complains;
use Illuminate\Routing\Route as RoutingRoute;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

use function Pest\Laravel\options;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    // misalnya mau bawa data
    $nama = 'Jeongwoo';
    $jurusan = 'TRKJ';
    $asal = 'Payakumbuh';
    // ini buat nampilin view yang mana yang mau dikeluarin
    return view('index', compact('nama', 'jurusan', 'asal'));
});

Route::get('/table', function () {
    return view('table');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'iniAdmin'])->group(function () {
    Route::controller(FrontController::class)->group(function () {
        Route::get('/dashboard', 'IndexFront')->name('dashboard.admin');
    });
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category', 'IndexCategory')->name('index.category');
        Route::post('/create/category', 'createCategory')->name('create.category');
        Route::put('/update/category', 'updateCategory')->name('update.category');
        Route::delete('/delete/category', 'deleteCategory')->name('delete.category');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/user', 'IndexUser')->name('user.admin');
        //create biasanya buat form,store buat nyimpan data
        Route::post('/user-create', 'createUser')->name('user.create');
        Route::put('/user-update', 'updateUser')->name('user.update');
        Route::delete('/user-delete', 'deleteUser')->name('user.delete');
    });

    Route::controller(ComplainsController::class)->group(function () {
        Route::get('/complains', 'indexComplains')->name('index.complains');
        Route::put('/update/status/{id}', 'updateStatus')->name('update.status');
    });
    Route::controller(ResponseController::class)->group(function () {
        Route::get('/response', 'indexResponse')->name('index.response');
        Route::get('/response/form/{complain_id}', 'formResponse')->name('form.response');
        Route::post('/response/create', 'createResponse')->name('create.response');
        Route::put('/response/update', 'updateResponse')->name('update.response');
        Route::delete('/response/delete', 'deleteResponse')->name('delete.response');
        
    });
});

//Route untuk akses user
Route::prefix('user')->middleware(['auth', 'iniUser'])->group(function () {
    Route::controller(DashboardUserController::class)->group(function () {
        Route::get('/dashboard-user', 'indexUser')->name('dashboard.user');
    });
      Route::controller(UserComplainsController::class)->group(function () {
        Route::get('/pengaduan-my', 'tableUser')->name('pengaduan.my');
        Route::get('/form-aduan', 'formAduan')->name('form.aduan');
        Route::post('/form-aduan/store', 'storeAduan')->name('store.aduan');
        Route::delete('/form-aduan/delete', 'deleteAduan')->name('delete.aduan');
    });
});