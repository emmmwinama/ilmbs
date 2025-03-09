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
        $validated = $request->validate([
           'account_number' => 'required|unique:accounts|digits:12',
           'account_name' => 'required|string|max:255'
        ]);

        $account = Account::create($validated);
        return response()->json($account, 201);
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
        $validated = $request->validate([
            'account_id' => 'required|exists:accounts,id',
            'loan_amount' => 'required|numeric|min:50000|max:10000000',
            'loan_term' => 'required|integer|min:1',
            'interest_rate' => 'required|numeric|min:0',
            'status' => 'required|in:pending,approved,repaid'
        ]);
        $loan = Loan::create($validated);
        return response()->json($loan, 201);
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
        $validated = $request->validate([
            'loan_id' => 'required|exists:loans,id',
            'installment_number' => 'required|integer|min:1',
            'amount_due' => 'required|numeric|min:1',
            'due_date' => 'required|date',
            'status' => 'required|in:pending,paid'
        ]);
        $schedule = RepaymentSchedule::create($validated);
        return response()->json($schedule, 201);
    }

    public function fetchLoanPayments(){
        return response()->json(Repayment::with('loan')->get());
    }

    public function fetchLoanPayment($id){
        return response()->json(Repayment::with('loan')->find($id));
    }


    public function createLoanPayments(Request $request){
        $validated = $request->validate([
            'loan_id' => 'required|exists:loans,id',
            'amount_paid' => 'required|numeric|min:1',
            'paid_on' => 'required|date',
        ]);
        $payment = Repayment::create($validated);
        return response()->json($payment, 201);
    }

    public function updateLoanPayments(Request $request){
        return response()->json(['message', 'good']);
    }

    public function deleteLoanPayments(Request $request){
        return response()->json(['message', 'good']);
    }
}
