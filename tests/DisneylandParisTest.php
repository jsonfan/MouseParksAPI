<?php

class DisneylandParisTest extends TestCase
{
    public function testGetWaitTimes()
    {
      $response = $this->call('GET', '/parks/dlp/wait');

      $this->assertEquals(200, $response->status());
    }

    public function testGetExclusiveRide()
    {
      $this->json('GET', '/parks/dlp/wait')
        ->seeJson([
          'name' => 'Phantom Manor'
        ])->seeStatusCode(200);
    }
}
