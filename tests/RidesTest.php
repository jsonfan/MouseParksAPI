<?php

class RidesTest extends TestCase
{
  public function testGetRideInfo()
  {
    $this->json('GET', '/ride/18115367;entityType=Attraction/region/us')
      ->seeJson([
        'id' => "18115367;entityType=Attraction",
        'name' => "Star Wars: Rebels - The Ultimate Guide",
        "admissionRequired" => true,
        "disneyOwned" => true,
        "disneyOperated" => true,
        "type" => "Attraction",
        "contentType" => "Attraction",
        "fastPassPlus" => false,
        "fastPass" => false,
        "title" => "Walt Disney World Resort",
        "text" => "WDW",
        "latitude" => "28.356358",
        "longitude" => "-81.559257"
      ])->seeStatusCode(200);
  }
}
