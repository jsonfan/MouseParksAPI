<?php

class DisneylandParisTest extends TestCase
{
    public function testGetWaitTimes()
    {
      $response = $this->call('GET', '/wait/dlp');

      $this->assertEquals(200, $response->status());
    }

    public function testGetExclusiveRide()
    {
      $this->json('GET', '/wait/dlp')
        ->seeJson([
          'name' => 'Phantom Manor'
        ])->seeStatusCode(200);
    }
}
