<?php

class EpcotTest extends TestCase
{
    public function testGetWaitTimes()
    {
      $response = $this->call('GET', '/parks/epcot/wait');

      $this->assertEquals(200, $response->status());
    }

    public function testGetExclusiveRide()
    {
      $this->json('GET', '/parks/epcot/wait')
        ->seeJson([
          'name' => 'Test Track'
        ])->seeStatusCode(200);
    }
}
