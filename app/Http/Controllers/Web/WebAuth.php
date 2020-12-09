<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Controllers\WebApi;
use Illuminate\Http\Request;

class WebAuth extends Controller
{
    private const ROUTE_PREF_LOGIN = 'api/login';

    public function login(Request $request)
    {
        $options = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $i = new WebApi();
       // $status = $i->getToken($options);
        $status = $i->getLogin(self::ROUTE_PREF_LOGIN, $options);
        dd($status);
        if($status['code']=="200"){

            return view('events');
        }
        else {
            $request->session()->flash('message', $status['code']);
            return view('users.auth.login');
        }
    }
}
