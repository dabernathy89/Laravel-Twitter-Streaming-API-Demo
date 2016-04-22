<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    if (Auth::check()) {
        $tweets = App\Tweet::orderBy('created_at','desc')->paginate(5);
    } else {
        $tweets = App\Tweet::where('approved',1)->orderBy('created_at','desc')->take(5)->get();
    }

    return view('welcome', ['tweets' => $tweets]);
});

Route::auth();

Route::get('/home', 'HomeController@index');
