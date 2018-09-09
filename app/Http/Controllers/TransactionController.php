<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Transaction;
use App\Account;
use Illuminate\Support\Facades\DB;

use DateTime;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

use GuzzleHttp\Client;

class TransactionController extends Controller
{

    public function index()
    {
        $id = Auth::user()->id;
        $accounts = Account::where('USER_ID',$id)->get();
        return view('transactions')->with('accounts', $accounts);
    }

    public function transferAmount() {
        $user = app('Illuminate\Contracts\Auth\Guard')->user();
        $id = Auth::user()->id;
        $accounts = Account::where('USER_ID',"!=", $id)->get();
        $accountsUser = Account::where('USER_ID', $id)->get();
        return view('transfer')->with('user', $user)->with('accounts', $accounts )->with('accountsUser', $accountsUser );
    }

    public function executeTransfer() {
        $amount = Input::get('amount');
        $accountTo = Input::get('account');
        $accountFrom = Input::get('accountUser');

        $accountToAmount = Account::where('ACCNUMBER', $accountTo )->first()->AMOUNT;
        $accountToNewAmount = $accountToAmount + $amount;
        $accountFromAmount = Account::where('ACCNUMBER', $accountFrom )->first()->AMOUNT - $amount;
        $accountFromNewAmount = $accountFromAmount - $amount;

        if($accountFromAmount <= 0) {
            return view('/transfer')->with('success', "F");
        }

        DB::table('accounts')
            ->where('ACCNUMBER', $accountTo)
            ->update(['AMOUNT' => $accountToNewAmount]);

        DB::table('accounts')
            ->where('ACCNUMBER', $accountFrom)
            ->update(['AMOUNT' => $accountFromNewAmount]);

        return view('/transfer')->with('success', "T");
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

    public function useAPI() {
        $client = new Client();
        $res = $client->request('GET', 'http://data.fixer.io/api/latest?access_key=6c134b553eb0cba8825b0970c84652a9');
        /*, [
            'form_params' => [
                'client_id' => 'test_id',
                'secret' => 'test_secret',
            ]
        ]);*/
        //echo $res->getStatusCode();
        // "200"
        //echo $res->getHeader('content-type');
        // 'application/json; charset=utf8'
        $result = $res->getBody();
        $json_a = json_decode($result, true);
        $EUR =  $json_a["rates"]["EUR"];
        $GBP =  $json_a["rates"]["GBP"];
        $AUD =  $json_a["rates"]["AUD"];
        echo $EUR."   ".$AUD."    ".$GBP;


        //echo $jsonSubstr;
        // {"type":"User"...'
    }
}
