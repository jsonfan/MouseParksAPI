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

$app->get('/', function () use ($app) {
  return 'Welcome to MouseParks API';
});

$app->get('/parks', 'DisneyParkController@index');
$app->get('/parks/{shortName}/wait', 'DisneyParkController@getWaitTimes');

$app->get('/ride/{rideId}/region/{region}', 'RidesController@show');
