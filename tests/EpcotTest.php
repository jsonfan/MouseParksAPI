<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class EpcotTest extends TestCase
{
    public function testGetWaitTimes()
    {
      $response = $this->call('GET', '/wait/epcot');

      $this->assertEquals(200, $response->status());
    }

    public function testGetExclusiveRide()
    {
      $this->json('GET', '/wait/epcot')
        ->seeJson([
          'name' => 'Test Track'
        ])->seeStatusCode(200);
    }
}
