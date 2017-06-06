<?php

class HollywoodStudiosTest extends TestCase
{
    public function testGetWaitTimes()
    {
      $response = $this->call('GET', '/parks/hlyst/wait');

      $this->assertEquals(200, $response->status());
    }

    public function testGetExclusiveRide()
    {
      $this->json('GET', '/parks/hlyst/wait')
        ->seeJson([
          'name' => 'The Great Movie Ride'
        ])->seeStatusCode(200);
    }
}
