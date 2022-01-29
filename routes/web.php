<?php

use App\Http\Controllers\UserController;
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


Route::middleware('auth')->group(function() {
    // ダッシュボード
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    // 社員画面
    Route::prefix('employees')->group(function() {
        Route::get('/', function () {
            return view('employees.index');
        });

        Route::get('/{id}', function ($id) {
            return view('employees.show', [ 'uid' => $id ]);
        });

        Route::get('/{id}/{skill_type}/edit', function ($id, $skill_type) {
            if (Auth::id() != $id) {
                return redirect()->route('employees.show', ['id' => $id]);
            }
            return view('employees.edit', ['uid' => $id, 'skill_type' => $skill_type]);
        });
    });

    // 案件画面
    Route::prefix('matters')->group(function() {
        Route::get('/', function() {
            return view('matters.index');
        });

        Route::get('/create', function() {
            return view('matters.create');
        });

        Route::get('/{id}', function($id) {
            return view('matters.show');
        });

        Route::get('/{id}/edit', function($id) {
            return view('matters.edit');
        });
    });

    // 管理者画面
    Route::get('master', function($id) {
        return view('master');
    });
});

require __DIR__.'/auth.php';


