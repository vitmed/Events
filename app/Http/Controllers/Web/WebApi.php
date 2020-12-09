<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;
use GuzzleHttp;

class WebApi extends Controller
{
    //
    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    const ROUTE_PREFIX_LOGIN = 'api/login';
    const ROUTE_PREFIX_LOGOUT = 'api/logout';
    //protected $redirectTo =  '/';
    protected $redirectTo = '/home';
    protected $defaultHeaders = [];


    public function withHeader(string $name, string $value)
    {
        $this->defaultHeaders[$name] = $value;

        return $this;
    }

    /**
     * Create a new controller instance.
     *
     * @return GuzzleHttp\Client
     */
    /* public function __construct()
     {
         $this->middleware('guest')->except('logout');
     }*/

    public function getClient()
    {
        $client = new GuzzleHttp\Client([
            // 'base_uri' => 'https://event-web7.herokuapp.com'
            'base_uri' => 'http://localhost:8000/'
        ]);
        return $client;
    }

    public function getLogin($url, $options)
    {
        try {
            $request = $this->getClient();
            $request =  $request->request('POST', $url, [
               // 'verify' => false,
                // 'headers' => $this->getHeader(),
                'form_params' => $options,
            ]);//->getBody()->getContents();
            dd( $request);

            dd($url);
            $request2 = json_decode($request->getBody()->getContents(), true);
            $response = $request->getStatusCode();
            $arr = [
                'code' => $response,
                'id' => $request2['id'],
                'token' => $request2,
            ];
            dd($arr);
            return $arr;
        } catch (GuzzleHttp\Exception\ClientException $ex) {
            $errResponse = json_decode($ex->getResponse()->getStatusCode(), true);
            if ($errResponse == '422') {
                $response = json_decode($ex->getResponse()->getBody()->getContents(), true);
                $errors = $response['message'] . " " . implode("&", array_map(function ($a) {
                        return implode("~", $a);
                    }, $response['errors']));
                $arr = [
                    'code' => $errors,
                    'id' => 'zz'
                ];
                return $arr;
            } else {
                $arr = [
                    'code' => "Error code: " . $errResponse,
                    'id' => 'zz'
                ];
                return $arr;
            }
        } catch (GuzzleHttp\Exception\GuzzleException $e) {
        }
    }

    public function getToken($options)
    {
        /* $options = [
             'verify' => false,
             'form_params' => [
                 "email" => "admin@gamil.com",
                 "password" => "123456"
             ]
         ];*/
        $token = session()->get('token');
        //$response = $this->getClient()->request('POST', "/api/login", $options)->getBody()->getContents();
        // $array = json_decode($response, true);
        // $token = $array['token'];

        // session()->put('token', $token );
        dd(session()->get('token'));
        return $token;
    }

    public function getHeader()
    {
        $headers = [
            'Authorization' => 'Bearer ' . $this->getToken(),
            'Accept' => 'application/json',
        ];
        return $headers;
    }

    //get, edit, show
    public function getIndex($url)
    {

        $response = $this->getClient()->request('GET', $url, [
            'verify' => false,
            'headers' => $this->getHeader()
        ])->getBody()->getContents();
        $array = json_decode($response, true);
        return $array;
    }

    public function getPost($url, $options)
    {
        try {
            $request = $this->getClient()->request('POST', $url, [
                'verify' => false,
                'headers' => $this->getHeader(),
                'form_params' => $options,
            ]);//->getBody()->getContents();
            $request2 = json_decode($request->getBody()->getContents(), true);
            $response = $request->getStatusCode();
            $arr = [
                'code' => $response,
                'id' => $request2['id']
            ];
            return $arr;
        } catch (GuzzleHttp\Exception\ClientException $ex) {
            $errResponse = json_decode($ex->getResponse()->getStatusCode(), true);
            if ($errResponse == '422') {
                $response = json_decode($ex->getResponse()->getBody()->getContents(), true);
                $errors = $response['message'] . " " . implode("&", array_map(function ($a) {
                        return implode("~", $a);
                    }, $response['errors']));
                $arr = [
                    'code' => $errors,
                    'id' => 'zz'
                ];
                return $arr;
            } else {
                $arr = [
                    'code' => "Error code: " . $errResponse,
                    'id' => 'zz'
                ];
                return $arr;
            }
        }
    }

    public function getPatch($url, $options)
    {
        try {
            $request = $this->getClient()->request('PATCH', $url, [
                'verify' => false,
                'headers' => $this->getHeader(),
                'form_params' => $options,
            ]);//->getBody()->getContents();
            $request2 = json_decode($request->getBody()->getContents(), true);
            $response = $request->getStatusCode();
            $arr = [
                'code' => $response,
                'id' => $request2['id']
            ];
            return $arr;
        } catch (GuzzleHttp\Exception\ClientException $ex) {
            $errResponse = json_decode($ex->getResponse()->getStatusCode(), true);
            if ($errResponse == '422') {
                $response = json_decode($ex->getResponse()->getBody()->getContents(), true);
                $errors = $response['message'] . " " . implode("&", array_map(function ($a) {
                        return implode("~", $a);
                    }, $response['errors']));
                $arr = [
                    'code' => $errors,
                    'id' => 'zz'
                ];
                return $arr;
            } else {
                $arr = [
                    'code' => "Error code: " . $errResponse,
                    'id' => 'zz'
                ];
                return $arr;
            }
        }
    }

    public function getDelete($url)
    {
        $response = $this->getClient()->request('DELETE', $url, [
            'verify' => false,
            'headers' => $this->getHeader()
        ])->getBody()->getContents();
        $array = json_decode($response, true);
        return $array;
    }
}
