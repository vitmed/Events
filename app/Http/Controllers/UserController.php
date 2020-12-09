<?php

namespace App\Http\Controllers;

use App\Models\User;
//use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    public function index()
{
//$ApiDataController = new ApiDataController();
//if (Auth::user()->hasAnyRoles($ApiDataController->ApiUserControllerIndex)) {
return response()->json(User::all(), 200);
//} else {
//    return response()->json([
//        'error' => 'Forbidden.'
//    ], 403);
//}
}
    public function store(Request $request)
{
    // $ApiDataController = new ApiDataController();
    //if (Auth::user()->hasAnyRoles($ApiDataController->ApiUserControllerRegister)) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'role' => 'required|in:guest,admin,user',
        'password' => 'required|string|min:6|confirmed',
    ]);
    if ($validator->fails()) {
        return response()->json($validator->errors()->toJson(), 400);
    }
    $user = User::create([
        'name' => $request->get('name'),
        'email' => $request->get('email'),
        'role' => $request->get('role'),
        'password' => Hash::make($request->get('password')),
    ]);
    $token =
        JWTAuth::fromUser($user);
    return response()->json(compact('user', 'token'), 201);

}


    public function show(User $user)
    {
      //  $ApiDataController = new ApiDataController();
        $roles = array('admin','guest','user');
       // dd(Auth::user());
        if (Auth::user() && in_array(Auth::user()->role,$roles)){
  //          || (Auth::user()->id == $user->id)) {
            return response()->json($user, 200);
        } else {
            return response()->json([
               'error' => 'Forbidden.'
            ], 403);
        }
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required'],
            'password' => ['required']
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $credentials = $request->only('email', 'password');
        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Invalid credentials'], 400);
        }
        Auth::user()->setRememberToken($token);
        return response()->json(compact('token'));
    }
    function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
//
//    public function userProfile() {
//
//        return response()->json( auth()->user());
//    }
}
