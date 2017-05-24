<?php

class AnimalKingdomTest extends TestCase
{
    public function testGetWaitTimes()
    {
      $response = $this->call('GET', '/wait/ak');

      $this->assertEquals(200, $response->status());
    }

    public function testGetExclusiveRide()
    {
      $this->json('GET', '/wait/ak')
        ->seeJson([
          'name' => 'Expedition Everest - Legend of the Forbidden Mountain'
        ])->seeStatusCode(200);
    }
}
