<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PhaseController;
use App\Http\Controllers\PurchaseRequestController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UserController;
use App\Models\PurchaseRequest;
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
Route::resource('roles',RoleController::class);
Route::resource('department',DepartmentController::class);
Route::resource('phase',PhaseController::class);
Route::resource('status',StatusController::class);
Route::resource('user',UserController::class);
Route::resource('role_type',StatusController::class);
Route::put('user/status/{id}',[UserController::class,'statusUpdate'])->name('user.status.update');
Route::resource('purchase',PurchaseRequestController::class);
Route::get('purchase/destroy/{id}',[PurchaseRequestController::class,'destroy'])->name('purchase.destroy');
Route::get('purchase/approved/{id}',[PurchaseRequestController::class,'approved'])->name('purchase.approved');
Route::get('purchase/reject/{id}',[PurchaseRequestController::class,'reject'])->name('purchase.reject');
Route::post('purchase/approved/store',[PurchaseRequestController::class,'approvedStore'])->name('purchase.approved.store');
Route::post('purchase/reject/store',[PurchaseRequestController::class,'rejectStore'])->name('purchase.reject.store');
Route::get('log',function(){
    Auth::logout();

        return redirect('login');
})->name('log');

