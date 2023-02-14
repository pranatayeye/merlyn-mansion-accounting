<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::group(['prefix' => 'transaction'], function(){
    Route::get("transaction", [TransactionController::class, 'index'])->name('transaction.index');
    Route::post("transaction/create", [TransactionController::class, 'store'])->name('transaction.store');
    Route::get("transaction/{transaction:id}/delete", [TransactionController::class, 'destroy'])->name('transaction.destroy');
    Route::get("transaction/search/{first}/{last}", [TransactionController::class, 'search'])->name('transaction.search');
//  });

Route::get("financial-report", [FinancialReportController::class, 'index'])->name('financialReport.index');
Route::get("financial-report/{month}/{year}", [FinancialReportController::class, 'detail'])->name('financialReport.detail');