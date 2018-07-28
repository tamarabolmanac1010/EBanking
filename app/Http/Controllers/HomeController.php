<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Contracts\Auth\Guard;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = app('Illuminate\Contracts\Auth\Guard')->user();
        $name = $user->name;
        if($name === 'admin'){
            return view('homeAdmin');
        }
        session(['user' => $user]);
        return view('home')->with('user',$user );
    }
}
