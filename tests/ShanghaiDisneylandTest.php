<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ShanghaiDisneylandTest extends TestCase
{
    public function testGetWaitTimes()
    {
      $response = $this->call('GET', '/wait/sh');

      $this->assertEquals(200, $response->status());
    }

    public function testGetExclusiveRide()
    {
      $this->json('GET', '/wait/sh')
        ->seeJson([
          'id' => "attTronLightcyclePowerRun;entityType=Attraction;destination=shdr"
        ])->seeStatusCode(200);
    }
}
