<?php

class RidesTest extends TestCase
{
  public function testGetRideInfo()
  {
    $this->json('GET', '/ride/attMeetDroidFriends;entityType=Attraction;destination=shdr/region/cn')
      ->seeJson([
        'id' => "attMeetDroidFriends;entityType=Attraction;destination=shdr"
      ])->seeStatusCode(200);
  }
}
