<?php

use App\Http\Controllers\MatterController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
//検索用コントローラー
use App\Http\Controllers\SearchController;
use App\Http\Controllers\DashboardController;

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


Route::middleware('auth')->group(function() {
    // ダッシュボード
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    //モーダルはbootstrapで出したり消したりしてた。ここでルーティングする、/modalで侵入可能になってしまう。
    //ダッシュボードからパラメータを渡す
    // Route::get('/modal', [DashboardController::class, 'modal'] )->name('layouts/modal');

    // 社員画面
    Route::prefix('employees')->group(function() {
        // Route::resource('/', SearchController::class, ['only' => ['index']]);

        Route::get('/', [UserController::class, 'search'])->name('employees.index');

        Route::get('/{id}', [UserController::class, 'show'])->name('employees.show');

        Route::get('/learning/{skill_type}/edit', [UserController::class, 'learning_edit'])->name('employees.learning_edit');

        Route::get('/career/{skill_type}/edit', [UserController::class, 'career_edit'])->name('employees.career_edit');
    });

    // 案件画面
    Route::prefix('matters')->group(function() {
        Route::get('/', function() {
            return view('matters.index');
        })->name('matters.index');

        Route::get('/create', [MatterController::class, 'create'])->name('matters.create');

        Route::post('/store', [MatterController::class, 'store'])->name('matters.store');

        Route::get('/{id}', function($id) {
            return view('matters.show');
        })->name('matters.show');

        Route::get('/{id}/edit', function($id) {
            return view('matters.edit');
        })->name('matters.edit');
    });

    // 管理者画面
    Route::get('master', function($id) {
        return view('master');
    });

    
});

require __DIR__.'/auth.php';


