<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PhaseController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StatusController;
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
Auth::routes();
Route::get('/', function () {return redirect()->route('login');});
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('menus',MenuController::class);
Route::resource('roles',RoleController::class);
Route::resource('department',DepartmentController::class);
Route::resource('phase',PhaseController::class);
Route::resource('status',StatusController::class);
Route::resource('role_type',StatusController::class);

