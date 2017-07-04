<?php

class DisneylandUSATest extends TestCase
{
    public function testGetWaitTimes()
    {
      $response = $this->call('GET', '/parks/dlusa/wait');

      $this->assertEquals(200, $response->status());
    }

    public function testGetExclusiveRide()
    {
      $this->json('GET', '/parks/dlusa/wait')
        ->seeJson([
          'name' => 'Matterhorn Bobsleds',
          'type' => 'Attraction',
          'id' => '353377;entityType=Attraction'
        ])->seeStatusCode(200);
    }
}
