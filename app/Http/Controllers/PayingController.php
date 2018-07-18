<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Accounttype;
use App\Korisnik;
use App\Account;
use App\User;

class PayingController extends Controller
{
    public function submit(Request $request){
        $this->validate($request, [
            'amount' => 'required',
            'account' => 'required'
        ]);
       // return Account::all();
        $acc = User::find(1)->accounts;
        return $acc;
        /*
        foreach ($comments as $comment) {
            //
        }*/
        //return redirect('/home')->with('success', 'Payment is executed successfully');
    }

    public function getAccountTypes() {
        $accountTypes = AccountType::all();
        return view('accounts')->with('acTypes', $accountTypes);
    }


}
