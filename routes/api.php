<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganiserController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'App\Http\Controllers\UserController@login');
Route::post('logout', 'App\Http\Controllers\UserController@logout');
//Route::get('user-profile', 'App\Http\Controllers\UserController@userProfile');

Route::resource('events.comments.sub_comments', \App\Http\Controllers\SubComment::class);

Route::resource('events.comments', \App\Http\Controllers\CommentControler::class, ['only' => ['index']]);
//Route::get('events/{event_id}/comments/{id}/text', 'App\Http\Controllers\CommentControler@gettext');
//Route::resource('events.comments', 'App\Http\Controllers\CommentControler@gettext');

Route::resource('events', \App\Http\Controllers\EventController::class, ['only' => ['index']]);
Route::resource('organisers', \App\Http\Controllers\OrganiserController::class, ['only' => ['index']]);
Route::resource('users', \App\Http\Controllers\UserController::class, ['only' => ['store']]);

Route::group(['middleware' => ['jwt.auth']], function () {
    Route::apiResource('events',\App\Http\Controllers\EventController::class, ['except' => ['index']]);

    Route::apiResource('organisers',\App\Http\Controllers\OrganiserController::class, ['except' => ['index']]);

    Route::apiResource('users',\App\Http\Controllers\UserController::class, ['except' => ['store']]);

    Route::resource('events.comments', \App\Http\Controllers\CommentControler::class, [
        'only' => ['store', 'destroy', 'update', 'show']
    ]);
});

//'only' => ['store', 'destroy', 'update', 'show']
//          'except' => ['edit', 'create']
//Route::apiResource('users',\App\Http\Controllers\UserController::class);
//Route::apiResource('/add-events/{id}/comments,\App\Http\Controllers\EventController::class,);
//Route::get('organisers', 'App\Http\Controllers\OrganiserController@getAllOrganisers');
//Route::get('organisers/{id}', 'App\Http\Controllers\OrganiserController@getOrganiser');
//Route::post('organisers', 'App\Http\Controllers\OrganiserController@createOrganiser');
//Route::put('organisers/{id}', 'App\Http\Controllers\OrganiserController@updateOrganiser');
//Route::delete('organisers/{id}','App\Http\Controllers\OrganiserController@deleteOrganiser');
//Route::post('/add-comment',[\App\Http\Controllers\EventController::class,'createComment']);
