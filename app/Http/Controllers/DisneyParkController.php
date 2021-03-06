<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Cache;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Client;
use App\Park;

class DisneyParkController extends BaseController
{
    private $park;

    public function index()
    {
      $parks = Park::all();

      return response()->json($parks);
    }

    public function getWaitTimes($shortName)
    {
      $park = Park::where('short_name', $shortName)->firstOrFail();
      $this->park = $park;

      $result = $this->getParkWaitFromCache($this->park->is_intl);

      return response()->json($result);
    }

    protected function getTokenFromCache()
    {
      if (!Cache::has('access_token')) {
        $accessToken = $this->getTokenFromAuthAPI();
        Cache::add('access_token', $accessToken, 14);
      }
      return Cache::get('access_token');
    }

    private function getTokenFromAuthAPI()
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

    private function getParkWaitFromCache($isIntl)
    {
      $URI = $isIntl ? "https://api.wdpro.disney.go.com/facility-service/theme-parks/{$this->park->park_id};destination={$this->park->resort}/wait-times?region={$this->park->region}"
              : "https://api.wdpro.disney.go.com/facility-service/theme-parks/{$this->park->park_id}/wait-times";

      $accessToken = $this->getTokenFromCache();

      $waitTimes = Cache::remember($this->park->park_id, 5, function() use ($accessToken, $URI) {
        $client = new Client();
        $result = $client->request('GET', $URI, [
          'headers' => [
            'Authorization' => "BEARER {$accessToken}",
            'Accept'        => 'application/json'
          ]
        ])->getBody()->getContents();

        $result = json_decode($result,true);
        $result['region'] = $this->park->region;
        $result['name'] = $this->park->name;
        $result['city'] = $this->park->city;
        $result['country'] = $this->park->country;

        return $result;
      });

      return $waitTimes;
    }
}
