<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$app->group(['namespace' => 'App\Http\Controllers','middleware' => 'auth'], function ($app) {
    $app->get('/', 'SiteController@dashboard');
    $app->get('station/{stationCode}', 'StationController@question');
    $app->post('submitQ', 'StationController@submitQ');

});
//$app->get('/', 'SiteController@dashboard')->middleware(['auth']);
$app->get('login','SiteController@login');
$app->post('checklogin', 'SiteController@checkLogin');


$app->get('submitQ', 'StationController@submitQ');