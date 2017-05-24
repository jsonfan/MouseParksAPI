<?php
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
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

$app->group(['prefix' => 'wait'], function () use ($app) {
  $app->get('dlusa', 'DisneylandUSAController@getWaitTimes');
  $app->get('caladv', 'CaliforniaAdventureController@getWaitTimes');
  $app->get('ak', 'AnimalKingdomController@getWaitTimes');
  $app->get('epcot', 'EpcotController@getWaitTimes');
  $app->get('hlyst', 'HollywoodStudiosController@getWaitTimes');
  $app->get('mk', 'MagicKingdomController@getWaitTimes');

  $app->group(['namespace' => 'DisneyIntl'], function() use ($app) {
    $app->get('sh', 'ShanghaiDisneylandController@getWaitTimes');
    $app->get('hk', 'HongKongDisneylandController@getWaitTimes');
    $app->get('dlp', 'DisneylandParisController@getWaitTimes');
    $app->get('wdsp', 'WaltDisneyStudiosParisController@getWaitTimes');
  });

});

$app->get('/ride/{rideId}/region/{region}', 'RidesController@show');
