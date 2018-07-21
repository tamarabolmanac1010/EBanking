<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Transaction;
use App\Account;

use DateTime;
use Carbon\Carbon;

class TransactionController extends Controller
{

    public function index()
    {
        $accounts =  Account::all();
        return view('transactions')->with('accounts', $accounts);
    }

    public function create()
    {
        //te
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function submit(Request $request){
        $account = Input::get('account');
        $month= Input::get('month');

        $month++;

        $current = Carbon::now()->toDateString();
        $from = Carbon::now()->subMonth($month)->toDateString();

        $transactions = Transaction::where('ACCNUMBER',$account)
                                    ->whereBetween('DATE', [$from, $current])
                                     ->get();

        $accounts =  Account::all();
        return view('transactions')->with('transactions', $transactions)->with('accounts', $accounts)->with('current', $month);
    }
}
