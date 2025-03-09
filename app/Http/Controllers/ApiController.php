<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Loan;
use App\Models\Repayment;
use App\Models\RepaymentSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    //
    public function fetchAccounts(){
        return response()->json(Account::with('loan')->get());
    }

    public function fetchAccount($id){
        $account = Account::with('loan')->find($id);
        return response()->json($account);
    }

    public function createAccount(Request $request){
        return response()->json(['message', 'good']);
    }

    public function updateAccount(Request $request){
        return response()->json(['message', 'good']);
    }

    public function deleteAccount(Request $request){
        return response()->json(['message', 'good']);
    }

    public function fetchLoans(){
        return response()->json(Loan::with('account')->get());
    }

    public function fetchLoan($id){
        return response()->json(Loan::with('account')->find($id));
    }

    public function createLoan(Request $request){
        return response()->json(['message', 'good']);
    }

    public function updateLoan(Request $request){
        return response()->json(['message', 'good']);
    }

    public function deleteLoan(Request $request){
        return response()->json(['message', 'good']);
    }

    public function fetchPaymentSchedule(Request $request){
        return response()->json(RepaymentSchedule::with('loans')->get());
    }

    public function createPaymentSchedule(Request $request){
        return response()->json(['message', 'good']);
    }

    public function fetchLoanPayments(){
        return response()->json(Repayment::with('loan')->get());
    }

    public function fetchLoanPayment($id){
        return response()->json(Repayment::with('loan')->find($id));
    }


    public function createLoanPayments(Request $request){
        return response()->json(['message', 'good']);
    }

    public function updateLoanPayments(Request $request){
        return response()->json(['message', 'good']);
    }

    public function deleteLoanPayments(Request $request){
        return response()->json(['message', 'good']);
    }
}
