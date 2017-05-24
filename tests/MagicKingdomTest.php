<?php

class MagicKingdomTest extends TestCase
{
    public function testGetWaitTimes()
    {
      $response = $this->call('GET', '/wait/mk');

      $this->assertEquals(200, $response->status());
    }

    public function testGetExclusiveRide()
    {
      $this->json('GET', '/wait/mk')
        ->seeJson([
          'name' => "Walt Disney's Carousel of Progress"
        ])->seeStatusCode(200);
    }
}
