<?php

use App\Http\Controllers\MonitoringKinerjaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PeriodeKinerjaController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/register', [RegisterController::class, 'index']) ->name('register');
Route::post('/register', [RegisterController::class, 'store']) ->name('register.store');

Route::get('/login', [LoginController::class, 'index']) ->name('login');
Route::post('/login', [LoginController::class, 'authenticate']) ->name('login.authenticate');

Route::middleware('auth')->group(function(){
Route::post('/logout', [LoginController::class, 'logout']) ->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index']) ->name('dashboard');

Route::get('/periodekinerja', [PeriodeKinerjaController::class, 'index']) ->name('periodekinerja.index');

Route::get('/user', [UserController::class, 'index']) ->name('user.index');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user', [UserController::class, 'store'])->name('user.store');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

Route::get('/role', [RoleController::class, 'index']) ->name('role.index');

Route::get('/monitoringkinerja/export', [MonitoringKinerjaController::class, 'export'])->name('monitoringkinerja.export');
Route::get('/monitoringkinerja', [MonitoringKinerjaController::class, 'index']) ->name('monitoringkinerja.index');
Route::get('/monitoringkinerja/create', [MonitoringKinerjaController::class, 'create'])->name('monitoringkinerja.create');
Route::post('/monitoringkinerja', [MonitoringKinerjaController::class, 'store'])->name('monitoringkinerja.store');
Route::get('/monitoringkinerja/edit/{id}', [MonitoringKinerjaController::class, 'edit'])->name('monitoringkinerja.edit');
Route::put('/monitoringkinerja/{id}', [MonitoringKinerjaController::class, 'update'])->name('monitoringkinerja.update');
Route::delete('/monitoringkinerja/{id}', [MonitoringKinerjaController::class, 'destroy'])->name('monitoringkinerja.destroy');

});


