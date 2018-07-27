<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Accounttype;
use App\Account;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PayingController extends Controller
{
    public function payment(Request $request){
        $this->validate($request, [
            'amount' => 'required',
            'account' => 'required'
        ]);
        $date = Carbon::now()->toDateString();
        $amount = Input::get('amount');
        $accountNumber= Input::get('account');
        $accountToPay = Input::get('accountTo');
        $eMail= Input::get('email');

        DB::table('transactions')->insertGetId(
            ['ACCNUMBER' => $accountNumber,
                'DATE' => $date,
                'DESCRIPTION' => $accountToPay,
                'TRANSACTIONTYPE' => 'Payment',
                'TRANSACTIONAMOUNT' => '-'.$amount]
        );

        $oldAmount = Account::where('ACCNUMBER',$accountNumber)->first()->AMOUNT;
        $newAmount = $oldAmount - $amount;

        DB::table('accounts')
            ->where('ACCNUMBER', $accountNumber)
            ->update(['AMOUNT' => $newAmount]);

        return redirect('/home')->with('success', 'Payment is executed successfully');
    }

    public function getAccountTypes() {
        $accountTypes = AccountType::all();
        return view('accounts')->with('acTypes', $accountTypes);
    }

    public function index()
    {
        $accounts =  Account::all();
        return view('pay')->with('accounts', $accounts);
    }

}
