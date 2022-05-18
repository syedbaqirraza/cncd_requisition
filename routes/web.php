<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhaseController;
use App\Http\Controllers\PurchaseRequestController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StatusController;
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
Route::get('purchase/reject/{id}',[PurchaseRequestController::class,'reject'])->name('purchase.reject');
Route::post('purchase/reject/store',[PurchaseRequestController::class,'rejectStore'])->name('purchase.reject.store');
Route::get('log',function(){
    Auth::logout();
    return redirect('login');
})->name('log');

Route::get('role',[
    'middleware' => 'role:editor',
    'uses' => 'App\Http\Controllers\TestController@index',
 ]);
 Route::post('purchase/approved/IT',[PurchaseRequestController::class,'itApprovedStore'])->name('purchase.approved.store.it');
 Route::get('purchase/approved/IT/{id}',[PurchaseRequestController::class,'itApproved'])->name('purchase.approved.it');
 Route::get('purchase/reject/IT{id}',[PurchaseRequestController::class,'itReject'])->name('purchase.reject.it');
Route::post('purchase/reject/store/IT',[PurchaseRequestController::class,'itRejectStore'])->name('purchase.reject.store.it');

 Route::post('purchase/administration/deliver',[PurchaseRequestController::class,'administrationDeliverStore'])->name('purchase.administration.deliver.store');
 Route::get('purchase/administration/deliver/{id}',[PurchaseRequestController::class,'administrationDeliver'])->name('purchase.administration.deliver');
 Route::get('purchase/quotation/administration/{id}',[PurchaseRequestController::class,'administrationQuotation'])->name('purchase.quotation.administration');
 Route::post('purchase/quotation/administration/store',[PurchaseRequestController::class,'administrationQuatationStore'])->name('purchase.quotation.administration.store');
 Route::get('purchase/administration/{id}',[PurchaseRequestController::class,'administrationPurchasing'])->name('purchase.administration');
 Route::post('purchase/administration/store',[PurchaseRequestController::class,'administrationPurchasingStore'])->name('purchase.administration.store');
Route::post('purchase/reject/administration/store',[PurchaseRequestController::class,'administrationRejectStore'])->name('purchase.reject.store.administration');

 Route::post('purchase/approved/call-back',[PurchaseRequestController::class,'callBackApprovedStore'])->name('purchase.approved.store.callBack');
 Route::get('purchase/approved/call-back/{id}',[PurchaseRequestController::class,'callBackApproved'])->name('purchase.approved.callBack');
 Route::get('purchase/reject/call-back/{id}',[PurchaseRequestController::class,'callBackReject'])->name('purchase.reject.callBack');
Route::post('purchase/reject/call-back/store',[PurchaseRequestController::class,'callBackRejectStore'])->name('purchase.reject.store.callBack');

 Route::post('purchase/approved/data-science',[PurchaseRequestController::class,'dataScienceApprovedStore'])->name('purchase.approved.store.dataScience');
 Route::get('purchase/approved/data-science/{id}',[PurchaseRequestController::class,'dataScienceApproved'])->name('purchase.approved.dataScience');
 Route::get('purchase/reject/data-science/{id}',[PurchaseRequestController::class,'dataScienceReject'])->name('purchase.reject.dataScience');
Route::post('purchase/reject/data-science/store',[PurchaseRequestController::class,'dataScienceRejectStore'])->name('purchase.reject.store.dataScience');

 Route::post('purchase/approved/department-of-biochemistry',[PurchaseRequestController::class,'departmentOfBiochemistryApprovedStore'])->name('purchase.approved.store.departmentOfBiochemistry');
 Route::get('purchase/approved/department-of-biochemistry/{id}',[PurchaseRequestController::class,'departmentOfBiochemistryApproved'])->name('purchase.approved.departmentOfBiochemistry');
 Route::get('purchase/reject/department-of-biochemistry/{id}',[PurchaseRequestController::class,'departmentOfBiochemistryReject'])->name('purchase.reject.departmentOfBiochemistry');
Route::post('purchase/reject/department-of-biochemistry/store',[PurchaseRequestController::class,'departmentOfBiochemistryRejectStore'])->name('purchase.reject.store.departmentOfBiochemistry');

 Route::post('purchase/approved/department-of-hematology',[PurchaseRequestController::class,'departmentOfHematologyApprovedStore'])->name('purchase.approved.store.departmentOfHematology');
 Route::get('purchase/approved/department-of-hematology/{id}',[PurchaseRequestController::class,'departmentOfHematologyApproved'])->name('purchase.approved.departmentOfHematology');
 Route::get('purchase/reject/department-of-hematology/{id}',[PurchaseRequestController::class,'departmentOfHematologyReject'])->name('purchase.reject.departmentOfHematology');
Route::post('purchase/reject/department-of-hematology/store',[PurchaseRequestController::class,'departmentOfHematologyRejectStore'])->name('purchase.reject.store.departmentOfHematology');

 Route::post('purchase/approved/department-of-molecular',[PurchaseRequestController::class,'departmentOfMolecularApprovedStore'])->name('purchase.approved.store.departmentOfMolecular');
 Route::get('purchase/approved/department-of-molecular/{id}',[PurchaseRequestController::class,'departmentOfMolecularApproved'])->name('purchase.approved.departmentOfMolecular');
 Route::get('purchase/reject/department-of-molecular/{id}',[PurchaseRequestController::class,'departmentOfMolecularReject'])->name('purchase.reject.departmentOfMolecular');
Route::post('purchase/reject/department-of-molecular/store',[PurchaseRequestController::class,'departmentOfMolecularRejectStore'])->name('purchase.reject.store.departmentOfMolecular');

 Route::post('purchase/approved/finance',[PurchaseRequestController::class,'financeApprovedStore'])->name('purchase.approved.store.finance');
 Route::get('purchase/approved/finance/{id}',[PurchaseRequestController::class,'financeApproved'])->name('purchase.approved.finance');
 Route::get('purchase/approved/finance/quatation/{id}',[PurchaseRequestController::class,'financeApprovedQuatation'])->name('purchase.approved.finance.quatation');
 Route::post('purchase/approved/finance/quatation/store',[PurchaseRequestController::class,'financeApprovedQuatationStore'])->name('purchase.approved.finance.quatation.store');
 Route::get('purchase/finance/quatation/{id}',[PurchaseRequestController::class,'financeQuatation'])->name('purchase.quatation');
 Route::post('purchase/finance/quatation/store',[PurchaseRequestController::class,'financeQuatationStore'])->name('purchase.finance.quatation.store');
 Route::get('purchase/reject/finance/{id}',[PurchaseRequestController::class,'financeReject'])->name('purchase.reject.finance');
Route::post('purchase/reject/finance/store',[PurchaseRequestController::class,'financeRejectStore'])->name('purchase.reject.store.finance');

 Route::post('purchase/approved/hr',[PurchaseRequestController::class,'hrApprovedStore'])->name('purchase.approved.store.hr');
 Route::get('purchase/approved/hr/{id}',[PurchaseRequestController::class,'hrApproved'])->name('purchase.approved.hr');
 Route::get('purchase/reject/hr/{id}',[PurchaseRequestController::class,'hrReject'])->name('purchase.reject.hr');
Route::post('purchase/reject/hr/store',[PurchaseRequestController::class,'hrRejectStore'])->name('purchase.reject.store.hr');

 Route::post('purchase/available/inventory/store',[PurchaseRequestController::class,'inventoryAvailableStore'])->name('purchase.available.store');
 Route::get('purchase/inventory/available-requested-item/{id}',[PurchaseRequestController::class,'inventoryAvailable'])->name('purchase.inventory.available');
 Route::get('purchase/inventory/issue-requested-item/{id}',[PurchaseRequestController::class,'inventoryIssue'])->name('purchase.inventory.issue');
 Route::post('purchase/inventory/issue-requested-item/store',[PurchaseRequestController::class,'inventoryIssueStore'])->name('purchase.inventory.issue.store');
 Route::get('purchase/inventory/send-request-to-buy/{id}',[PurchaseRequestController::class,'inventoryReject'])->name('purchase.inventory.sendRequestToBuy');
Route::post('purchase/inventory/send-request-to-buy',[PurchaseRequestController::class,'inventoryBuyRequestStore'])->name('purchase.inventory.sendRequestToBuy.store');

 Route::post('purchase/approved/qc',[PurchaseRequestController::class,'qcApprovedStore'])->name('purchase.approved.store.qc');
 Route::get('purchase/approved/qc/{id}',[PurchaseRequestController::class,'qcApproved'])->name('purchase.approved.qc');
 Route::get('purchase/reject/qc/{id}',[PurchaseRequestController::class,'qcReject'])->name('purchase.reject.qc');
Route::post('purchase/reject/qc/store',[PurchaseRequestController::class,'qcRejectStore'])->name('purchase.reject.store.qc');

Route::get('purchase/received/user/{id}',[PurchaseRequestController::class,'purchaseReceivedUser'])->name('purchase.received.user');
Route::post('purchase/received/store',[PurchaseRequestController::class,'purchaseReceivedUserStore'])->name('purchase.received.user.store');
