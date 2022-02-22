<?php

use App\Http\Controllers\PracticeLearningController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\MatterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
//検索用コントローラー
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ModalController;

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

    // 社員画面
    Route::prefix('employees')->group(function() {
        Route::get('/', [UserController::class, 'search'])->name('employees.index');

        Route::post('/search', [UserController::class, 'search'])->name('employees.search');

        Route::get('/{id}', [UserController::class, 'show'])->name('employees.show');

        Route::get('/practice_learning/{skill_type}/edit', [PracticeLearningController::class, 'edit'])->name('employees.practice_learning_edit');

        Route::post('/practice_learning/{skill_type}/store', [PracticeLearningController::class, 'store'])->name('employees.practice_learning_store');

        Route::get('/career/{skill_type}/edit', [CareerController::class, 'edit'])->name('employees.career_edit');

        Route::post('/career/{skill_type}/store', [CareerController::class, 'store'])->name('employees.career_store');
    });

    // 案件画面
    Route::prefix('matters')->group(function() {
        // Route::get('/', function() {
        //     return view('matters.index');
        // })->name('matters.index');

        Route::get('/', [MatterController::class, 'index'])->name('matters.index');

        Route::get('/create', [MatterController::class, 'create'])->name('matters.create');

        Route::post('/store', [MatterController::class, 'store'])->name('matters.store');

        Route::get('/{id}', [MatterController::class, 'show'])->name('matters.show');

        Route::get('/{id}/edit', function($id) {
            return view('matters.edit');
        })->name('matters.edit');
    });

    Route::post('modal', [ModalController::class, 'store'])->name('modal.store');

    // 管理者画面
    Route::get('master', function($id) {
        return view('master');
    });

});

require __DIR__.'/auth.php';


