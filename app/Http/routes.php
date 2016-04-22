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

Route::post('approve-tweets', ['middleware' => 'auth', function (Illuminate\Http\Request $request) {
    foreach ($request->all() as $input_key => $input_val) {
        if ( strpos($input_key, 'approval-status-') === 0 ) {
            $tweet_id = substr_replace($input_key, '', 0, strlen('approval-status-'));
            $tweet = App\Tweet::where('id',$tweet_id)->first();
            if ($tweet) {
                $tweet->approved = (int)$input_val;
                $tweet->save();
            }
        }
    }
    return redirect()->back();
}]);

Route::auth();

Route::get('/home', 'HomeController@index');
