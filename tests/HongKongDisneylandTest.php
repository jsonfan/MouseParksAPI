<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class HongKongDisneylandTest extends TestCase
{
    public function testGetWaitTimes()
    {
      $response = $this->call('GET', '/wait/hk');

      $this->assertEquals(200, $response->status());
    }

    public function testGetExclusiveRide()
    {
      $this->json('GET', '/wait/hk')
        ->seeJson([
          'name' => 'Mystic Manor'
        ])->seeStatusCode(200);
    }
}
