<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class DisneylandUSATest extends TestCase
{
    public function testGetWaitTimes()
    {
      $response = $this->call('GET', '/wait/dlusa');

      $this->assertEquals(200, $response->status());
    }

    public function testGetExclusiveRide()
    {
      $this->json('GET', '/wait/dlusa')
        ->seeJson([
          'name' => 'Matterhorn Bobsleds'
        ])->seeStatusCode(200);
    }
}
