<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function editProfile($id) {
        $user = User::where('id',$id)->first();
        if($user->name == 'admin')
            return view('edit')->with('user', $user);
        return view('editUser')->with('user', $user);
    }

    public function viewProfile($id){
        $user = User::where('id',$id)->first();;
        return view('user')->with('user', $user);
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
}
