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
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/login/basic', ['middleware' => 'auth.basic', function () {
    return redirect('/home');
}]);

Route::get('/auth/github', 'SocialAuthController@redirectToProvider');
Route::get('/auth/github/callback', 'SocialAuthController@handleProviderCallback');

Route::get('/cookie-sample/raw/set', 'RawPHPCookieController@setCookie');
Route::get('/cookie-sample/raw/unset', 'RawPHPCookieController@unsetCookie');

Route::get('/cookie-sample/laravel/set', 'LaravelCookieController@setCookie');
Route::get('/cookie-sample/laravel/unset', 'LaravelCookieController@unsetCookie');

Route::get('/session-sample/raw/set', 'RawPHPSessionController@setSession');
Route::get('/session-sample/raw/unset', 'RawPHPSessionController@unsetSession');

Route::get('/session-sample/laravel/set', 'LaravelSessionController@setSession');
Route::get('/session-sample/laravel/unset', 'LaravelSessionController@unsetSession');

Route::get('/articles/{id}/edit', [
    'middleware' => 'auth',
    'uses' => 'ArticlesController@edit'
]);
