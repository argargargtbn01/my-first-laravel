<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Middleware\LoginMiddleware;
use App\Models\User;
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

//BACKEND ROUTES
Route::get('dashboard/index', [DashboardController::class, 'index']) -> name('dashboard.index')->middleware(\App\Http\Middleware\AuthenticateMiddleware::class);
Route::get('admin', [AuthController::class, 'index']) -> name('auth.admin')->middleware(LoginMiddleware::class);
Route::get('logout', [AuthController::class, 'logout']) -> name('auth.logout');
Route::post('login', [AuthController::class, 'login']) -> name('auth.login');
