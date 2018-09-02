<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\User;
use App\Account;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function editProfile($id) {
        $user = User::where('id',$id)->first();
        $userA = app('Illuminate\Contracts\Auth\Guard')->user();
        if($userA->name == 'admin')
            return view('edit')->with('user', $user);
        return view('editUser')->with('user', $user);
    }

    public function viewProfile($id){
        $user = User::where('id',$id)->first();
        return view('userView')->with('user', $user);
    }

    public function saveChanges(Request $request) {
        $name = Input::get('name');
        $mail = Input::get('mail');
        $id = Input::get('id');

        if($name != ''){
            DB::table('users')
                ->where('id', $id)
                ->update(['name' => $name]);
        }

        if($mail != ''){
            DB::table('users')
                ->where('id', $id)
                ->update(['email' => $mail]);
        }

        $user = User::where('id',$id)->first();
        return view('user')->with('user', $user);
    }

    public function registerUser(Request $request){

        $username = Input::get('username');
        $password = Input::get('password');
        $email = Input::get('email');

        $user = User::create([
            'name' => $username,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $accNumber = Input::get('accNumber');
        $accType = Input::get('accType');

        if(Input::get('onlyProfile') == false){

            if($accType == 'C')
                $accTypeId = 1;
            else
                $accTypeId = 2;

            Account::create([
                'ACCNUMBER' => (int)$accNumber,
                'ACTYPEID' => $accTypeId,
                'AMOUNT'=> 0,
                'USER_ID' => $user->id,
            ]);
        }

        $users = User::all();
        return view('users')->with('users', $users);
    }

    public function searchUser(Request $request){
        $name = $request->input('searchName');
        $users = User::where('name', 'LIKE', '%'.$name.'%')->get();
        return view('users')->with('users', $users);
    }
}
