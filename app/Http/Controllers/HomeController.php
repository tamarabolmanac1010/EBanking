<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Contracts\Auth\Guard;

use GuzzleHttp\Client;

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
        $USD =  $json_a["rates"]["USD"];
        $CAD =  $json_a["rates"]["CAD"];
        $RSD =  $json_a["rates"]["RSD"];

        session(['user' => $user]);
        return view('home')->with('user',$user )->with('GBP', $GBP)->with('AUD', $AUD)->with('USD', $USD)->with('CAD', $CAD)->with('RSD', $RSD);
    }
}
