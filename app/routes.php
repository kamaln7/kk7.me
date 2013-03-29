<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function(){
    return Redirect::to(URL::action('UrlController@create'));
});
Route::resource('url', 'UrlController', ['only' => ['create', 'store', 'show']]);

// Fallback to checking if it's a short URL hash
Route::get('/{hash}', 'UrlController@redirect');

/*
 * View composers
 */

View::composer('template.master', function($view)
{
    $view->with('lastten', kk7\URL::orderBy('created_at', 'desc')->take(10)->get());
});