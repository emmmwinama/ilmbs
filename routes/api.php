<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', function (){return response()->json(User::all());});

// for accounts
Route::get('/accounts', [\App\Http\Controllers\ApiController::class, 'fetchAccounts']);
Route::get('/accounts/{id}', [\App\Http\Controllers\ApiController::class, 'fetchAccount']);
Route::post('/accounts', [\App\Http\Controllers\ApiController::class, 'createAccount']);
Route::put('/accounts/{id}', [\App\Http\Controllers\ApiController::class, 'updateAccount']);
Route::delete('/accounts/{id}', [\App\Http\Controllers\ApiController::class, 'deleteAccount']);

//for loan
Route::get('/loans', [\App\Http\Controllers\ApiController::class, 'fetchLoans']);
Route::get('/loans/{id}', [\App\Http\Controllers\ApiController::class, 'fetchLoan']);
Route::post('/loans/{id}', [\App\Http\Controllers\ApiController::class, 'createLoan']);
Route::put('/loans/{id}', [\App\Http\Controllers\ApiController::class, 'updateLoan']);
Route::delete('/loans/{id}', [\App\Http\Controllers\ApiController::class, 'deleteLoan']);

// for repayment schedule
Route::get('/payment_schedule', [\App\Http\Controllers\ApiController::class, 'fetchPaymentSchedule']);
Route::post('/payment_schedule', [\App\Http\Controllers\ApiController::class, 'createPaymentSchedule']);

// for payments
Route::get('/loan_payments', [\App\Http\Controllers\ApiController::class, 'fetchLoanPayments']);
Route::get('/loan_payments/{id}', [\App\Http\Controllers\ApiController::class, 'fetchLoanPayment']);
Route::post('/loan_payments', [\App\Http\Controllers\ApiController::class, 'createLoanPayments']);
Route::put('/loan_payments/{id}', [\App\Http\Controllers\ApiController::class, 'updateLoanPayments']);
Route::delete('/loan_payments/{id}', [\App\Http\Controllers\ApiController::class, 'deleteLoanPayments']);
