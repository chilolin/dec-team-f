<?php

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
//検索用コントローラー
use App\Http\Controllers\SearchController;

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
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    // 社員画面
    Route::prefix('employees')->group(function() {
        // Route::resource('/', SearchController::class, ['only' => ['index']]);

        Route::get('/', [UserController::class, 'search'])->name('employees.index');

        Route::get('/{id}', function ($id) {
            if (User::find($id) == null) {
                return redirect()->route('employees.index');
            }
            return view('employees.show', [ 'uid' => $id ]);
        })->name('employees.show');

        Route::get('/learning/{skill_type}/edit', [UserController::class, 'learning_edit'])->name('employees.learning_edit');

        Route::get('/career/{skill_type}/edit', function ($skill_type) {
            return view('employees.edit', ['skill_type' => $skill_type]);
        })->name('employees.career_edit');
    });

    // 案件画面
    Route::prefix('matters')->group(function() {
        Route::get('/', function() {
            return view('matters.index');
        })->name('matters.index');

        Route::get('/create', function() {
            return view('matters.create');
        })->name('matters.create');

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

    Route::get('modal', function() {
        return view('modal');
    });
});

require __DIR__.'/auth.php';


