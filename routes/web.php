<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', function () {
    if(\Illuminate\Support\Facades\Auth::check()) {
        return redirect('/events/' . auth()->user()->id);
    } else return redirect('login');
});

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/events', '\App\Http\Controllers\Web\WebEventsControler');
Route::get('/login', function (){
    return view('users.auth.login');
});
//Route::get('login', [\App\Http\Controllers\Web\WebAuth::class, 'login']);//->name('users.auth.login');
Route::post('/login', [\App\Http\Controllers\Web\WebAuth::class, 'login'])->name('login');
Route::get('/users', function () {
    return view('welcome');
});
Route::get('/organisers', function () {
    return view('welcome');
});
Route::get('/register', function () {
    return view('welcome');
});


