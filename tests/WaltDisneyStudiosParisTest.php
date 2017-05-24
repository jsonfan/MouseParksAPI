<?php

class WaltDisneyStudiosParisTest extends TestCase
{
    public function testGetWaitTimes()
    {
      $response = $this->call('GET', '/wait/wdsp');

      $this->assertEquals(200, $response->status());
    }

    public function testGetExclusiveRide()
    {
      $this->json('GET', '/wait/wdsp')
        ->seeJson([
          'name' => "Ratatouille: The Adventure"
        ])->seeStatusCode(200);
    }
}
