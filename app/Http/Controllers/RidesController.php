<?php

namespace App\Http\Controllers;

use Cache;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Client;
/**
 * [RidesController description]
 */
class RidesController extends DisneyParkController
{
  /**
   * [BASE_URI description]
   * @var string
   */
  protected $BASE_URI = "https://api.wdpro.disney.go.com/global-pool-override-B/facility-service/attractions/";

  public function show($rideId, $region)
  {
    $result = $this->getRideInfoFromCache($rideId, $region);

    return response($result)
              ->header('Content-Type', 'application/json');
  }

  private function getRideInfoFromCache($rideId, $region)
  {
    $accessToken = $this->getTokenFromCache();

    $rideInfo = Cache::remember($rideId, 5, function() use ($accessToken, $rideId, $region) {
      $client = new Client();
      $result = $client->request('GET', "{$this->BASE_URI}{$rideId}?region={$region}", [
        'headers' => [
          'Authorization' => "BEARER {$accessToken}",
          'Accept'        => 'application/json'
        ]
      ])->getBody()->getContents();

      return $result;
    });

    return $rideInfo;
  }
}
