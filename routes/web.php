<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\FinancialReportController;
use App\Http\Controllers\ActivityLogController;

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

Auth::routes([
    'register' => false,
    'reset' => false, 
    'confirm'  => false,
    'verify' => false,
    
]);

Route::middleware('permission:dashboard')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
});
Route::post('change-password', [UserController::class, 'update'])->name('user.update');
Route::get('help', [HomeController::class, 'help'])->name('help');

/* transaction modul */
    Route::middleware('permission:readTransaction')->group(function () {
        Route::get("transaction", [TransactionController::class, 'index'])->name('transaction.index');
        Route::get("transaction/search/{first}/{last}", [TransactionController::class, 'search'])->name('transaction.search');
    });
    Route::middleware('permission:createTransaction')->group(function () {
        Route::post("transaction/create", [TransactionController::class, 'store'])->name('transaction.store');
    });
    Route::middleware('permission:deleteTransaction')->group(function () {
        Route::get("transaction/{transaction:id}/delete", [TransactionController::class, 'destroy'])->name('transaction.destroy');
    });
/* end transacton modul */

/* report modul */
    Route::middleware('permission:readReport')->group(function () {
        Route::get("financial-report", [FinancialReportController::class, 'index'])->name('financialReport.index');
        Route::get("financial-report/{month}/{year}", [FinancialReportController::class, 'detail'])->name('financialReport.detail');
        Route::get("pdf/{month}/{year}", [FinancialReportController::class, 'generatePdf'])->name('financialReport.generatePdf');
    });
/* end report modul */

/* user modul */
    Route::middleware('permission:readUser')->group(function () {
        Route::get("users", [UserController::class, 'index'])->name('user.index');
    });
    Route::middleware('permission:createUser')->group(function () {
        Route::post("users/role", [UserController::class, 'role'])->name('user.role');
        Route::post("users/create", [UserController::class, 'store'])->name('user.store');
    });
    Route::middleware('permission:deleteUser')->group(function () {
        Route::get("users/{user:id}/delete", [UserController::class, 'destroy'])->name('user.destroy');
    });
    Route::middleware('permission:editRoleUser')->group(function () {
        Route::post("users/{user:id}/edit-role", [UserController::class, 'editRole'])->name('user.editRole');
    });
/* end user modul */

/* log modul */
    Route::middleware('permission:readLog')->group(function () {
        Route::get("activity-log", [ActivityLogController::class, 'index'])->name('log.index');
    });
/* end log modul */