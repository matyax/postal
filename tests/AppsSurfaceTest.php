<?php

class AppsSurfaceTest extends TestCase {

    /**
     * Test home page
     *
     * @return void
     */
    public function testHomePage()
    {
        $response = $this->call('GET', '/');

        $this->assertEquals(200, $response->getStatusCode());
    }
}
