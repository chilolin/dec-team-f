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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('employees/{id}', function ($id) {
    return view('employee.detail', [ 'uid' => $id ]);
})->middleware(['auth'])->name('employee');

Route::get('employees/{id}/edits/{skill_type}', function ($id, $skill_type) {
    if (Auth::id() != $id) {
        return redirect()->route('employee', ['id' => $id]);
    }
    return view('employee.edit', ['uid' => $id, 'skill_type' => $skill_type]);
})->middleware(['auth']);

require __DIR__.'/auth.php';
