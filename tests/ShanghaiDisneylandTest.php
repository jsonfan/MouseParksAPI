<?php

class ShanghaiDisneylandTest extends TestCase
{
    public function testGetWaitTimes()
    {
      $response = $this->call('GET', '/parks/mk/wait');

      $this->assertEquals(200, $response->status());
    }

    public function testGetExclusiveRide()
    {
      $this->json('GET', '/parks/sh/wait')
        ->seeJson([
          'id' => "attTronLightcyclePowerRun;entityType=Attraction;destination=shdr"
        ])->seeStatusCode(200);
    }
}
