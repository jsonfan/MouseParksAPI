<?php

namespace App\Http\Controllers\DisneyIntl;

use App\Http\Controllers\DisneyParkController;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Client;
use Cache;

/**
 * [DisneyIntlParkController description]
 */
class DisneyIntlParkController extends DisneyParkController
{
  protected $parkId = 'P2';
  protected $resortId = 'dlp';
  protected $region = 'INTL';

  /**
   * [getParkWaitFromCache description]
   * @return [type] [description]
   */
  public function getParkWaitFromCache()
  {
    $accessToken = $this->getTokenFromCache();

    $waitTimes = Cache::remember($this->parkId, 5, function() use ($accessToken) {
      $client = new Client();
      $result = $client->request('GET', "https://api.wdpro.disney.go.com/facility-service/theme-parks/{$this->parkId};destination={$this->resortId}/wait-times?region={$this->region}", [
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
