<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\Auth\LogoutController;

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
Route::get('/', function(){
    return redirect()->route('admin.home');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function(){
    Route::get('/home', function () {
        return view('admin.home');
    })->name('home');
    Route::resource('user', UserController::class);
    Route::post('/user/filter/', [UserController::class, 'filter'])->name('user.filter');
    Route::get('users-export', [UserController::class, 'exportExcel'])->name('user.export');
    Route::resource('role', RoleController::class);
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
});

Auth::routes();
