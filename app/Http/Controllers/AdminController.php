<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function admin()
    {
        return view('admin');
    }

    public function addUser(){
        return view('addUser');
    }

    public function users()
    {
        $users = User::all();
        return view('users')->with('users', $users);
    }
}
