<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AccountType;
use App\Korisnik;

class PayingController extends Controller
{
    public function submit(Request $request){
        $this->validate($request, [
            'amount' => 'required',
            'account' => 'required'
        ]);
        return Korisnik::all();
        //return redirect('/home')->with('success', 'Payment is executed successfully');
    }

    public function getAccountTypes() {
        $accountTypes = AccountType::all();
        return view('accounts')->with('acTypes', $accountTypes);
    }


}
