<?php

namespace Tests;

use Tests\TestCase;

class RoutesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIndexPageWorks()
    {
        $this->get('/');

        $this->assertEquals(200, $this->response->getStatusCode());

        $this->assertContains(
            $this->app->version(),
            $this->response->getContent()
        );
    }
}
