<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PayingController extends Controller
{
    public function submit(Request $request){
        return $request->input('account');
    }
}
