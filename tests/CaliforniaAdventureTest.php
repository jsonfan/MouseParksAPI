<?php

class CaliforniaAdventureTest extends TestCase
{
    public function testGetWaitTimes()
    {
      $response = $this->call('GET', '/wait/caladv');

      $this->assertEquals(200, $response->status());
    }

    public function testGetExclusiveRide()
    {
      $this->json('GET', '/wait/caladv')
        ->seeJson([
          'name' => 'Radiator Springs Racers'
        ])->seeStatusCode(200);
    }
}
