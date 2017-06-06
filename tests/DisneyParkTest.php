<?php

class DisneyParkTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testGetBadWaitTimes()
    {
      $response = $this->call('GET', '/parks/badreq/wait');

      $this->assertEquals(404, $response->status());
    }


}
