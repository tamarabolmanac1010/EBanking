<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Account;
use App\Notification;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Contracts\Auth\Guard;


class NotificationController extends Controller
{
    public function newNotification() {
        $accounts =  Account::all();
        return view('newNotification')->with('accounts', $accounts);
    }

    public function createNotification(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'text' => 'required'
        ]);

        $accountNumber= Input::get('account');
        $text = Input::get('text');
        $title = Input::get('title');

        DB::table('notifications')->insertGetId(
                ['ACCNUMBER' => $accountNumber,
                'TEXT' => $text,
                'TITLE' => $title,]
        );
        return redirect('/home')->with('success', 'Notification sent');
    }

    public function userNotifications() {
        $user = app('Illuminate\Contracts\Auth\Guard')->user();
        $accNuber = $user->ACCNUMBER;

        $notfications = Notification::where('ACCNUMBER',$accNuber)->get();

        return view('notfications')->with('notfications', $notfications);
    }
}
