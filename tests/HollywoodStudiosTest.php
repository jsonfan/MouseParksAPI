<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class HollywoodStudiosTest extends TestCase
{
    public function testGetWaitTimes()
    {
      $response = $this->call('GET', '/wait/hlyst');

      $this->assertEquals(200, $response->status());
    }

    public function testGetExclusiveRide()
    {
      $this->json('GET', '/wait/hlyst')
        ->seeJson([
          'name' => 'The Great Movie Ride'
        ])->seeStatusCode(200);
    }
}
