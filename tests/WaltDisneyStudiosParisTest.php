<?php

class WaltDisneyStudiosParisTest extends TestCase
{
    public function testGetWaitTimes()
    {
      $response = $this->call('GET', '/parks/mk/wait');

      $this->assertEquals(200, $response->status());
    }

    public function testGetExclusiveRide()
    {
      $this->json('GET', '/parks/wdsp/wait')
        ->seeJson([
          'name' => "Ratatouille: The Adventure"
        ])->seeStatusCode(200);
    }
}
