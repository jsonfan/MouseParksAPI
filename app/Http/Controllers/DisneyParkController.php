<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Cache;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Client;

/**
 * [DisneyParkController description]
 */
class DisneyParkController extends BaseController
{
    /**
     * [$parkId description]
     * @var string
     */
    protected $parkId = '330339';
    protected $region = 'us';

    /**
     * [getWaitTimes description]
     * @return [type] [description]
     */
    public function getWaitTimes()
    {
      $result = $this->getParkWaitFromCache();

      return response($result)
                ->header('Content-Type', 'application/json');
    }

    /**
     * [getTokenFromCache description]
     * @return [type] [description]
     */
    protected function getTokenFromCache()
    {
      if (!Cache::has('access_token')) {
        //store token in cache
        // error_log('no access token');
        $accessToken = $this->getTokenFromAuthAPI();
        Cache::add('access_token', $accessToken, 14);
      }
      return Cache::get('access_token');
    }

    /**
     * [getTokenFromAuthAPI description]
     * @return [type] [description]
     */
    protected function getTokenFromAuthAPI()
    {
      $client = new Client();
      $result = $client->request('POST', 'https://authorization.go.com/token/', [
        'form_params' => [
          'grant_type'      => 'assertion',
          'assertion_type'  => 'public',
          'client_id'       => 'WDPRO-MOBILE.MDX.WDW.IOS-PROD'
        ]
      ])->getBody();

      $result = json_decode($result, true);

      return $result['access_token'];
    }

    /**
     * [getParkWaitFromCache description]
     * @return [type] [description]
     */
    protected function getParkWaitFromCache()
    {
      $accessToken = $this->getTokenFromCache();

      $waitTimes = Cache::remember($this->parkId, 5, function() use ($accessToken) {
        $client = new Client();
        $result = $client->request('GET', "https://api.wdpro.disney.go.com/facility-service/theme-parks/{$this->parkId}/wait-times", [
          'headers' => [
            'Authorization' => "BEARER {$accessToken}",
            'Accept'        => 'application/json'
          ]
        ])->getBody()->getContents();

        $result = json_decode($result,true);
        $result['region'] = $this->region;

        return $result;
      });

      return $waitTimes;
    }
}
