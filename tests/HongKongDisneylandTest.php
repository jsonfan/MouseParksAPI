<?php

class HongKongDisneylandTest extends TestCase
{
    public function testGetWaitTimes()
    {
      $response = $this->call('GET', '/parks/hk/wait');

      $this->assertEquals(200, $response->status());
    }

    public function testGetExclusiveRide()
    {
      $this->json('GET', '/parks/hk/wait')
        ->seeJson([
          'name' => 'Mystic Manor'
        ])->seeStatusCode(200);
    }
}
