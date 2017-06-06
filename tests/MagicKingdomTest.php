<?php

class MagicKingdomTest extends TestCase
{
    public function testGetWaitTimes()
    {
      $response = $this->call('GET', '/parks/mk/wait');

      $this->assertEquals(200, $response->status());
    }

    public function testGetExclusiveRide()
    {
      $this->json('GET', '/parks/mk/wait')
        ->seeJson([
          'name' => "Walt Disney's Carousel of Progress"
        ])->seeStatusCode(200);
    }
}
