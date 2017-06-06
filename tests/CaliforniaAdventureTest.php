<?php

class CaliforniaAdventureTest extends TestCase
{
    public function testGetWaitTimes()
    {
      $response = $this->call('GET', '/parks/dca/wait');

      $this->assertEquals(200, $response->status());
    }

    public function testGetExclusiveRide()
    {
      $this->json('GET', '/parks/dca/wait')
        ->seeJson([
          'name' => 'Radiator Springs Racers'
        ])->seeStatusCode(200);
    }
}
