<?php

class AnimalKingdomTest extends TestCase
{
    public function testGetWaitTimes()
    {
      $response = $this->call('GET', '/parks/ak/wait');

      $this->assertEquals(200, $response->status());
    }

    public function testGetExclusiveRide()
    {
      $this->json('GET', '/parks/ak/wait')
        ->seeJson([
          'name' => 'Expedition Everest - Legend of the Forbidden Mountain'
        ])->seeStatusCode(200);
    }
}
