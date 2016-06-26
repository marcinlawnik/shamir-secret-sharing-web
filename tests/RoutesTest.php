<?php

namespace Tests;

class RoutesTest extends TestCase
{
    /**
     * A basic test if main page responds.
     *
     * @return void
     */
    public function testIndexPageGetWorks()
    {
        $this->get('/');

        $this->assertEquals(200, $this->response->getStatusCode());

        $this->assertContains(
            $this->app->version(),
            $this->response->getContent()
        );
    }

    public function testIndexPagePostWorks()
    {
        $this->call(
            'POST',
            '/',
            [
                'secret' => 'test',
                'shares_amount' => 4,
                'shares_threshold' => 2,
                'action' => 'share'
            ]
        );

        $this->assertEquals(200, $this->response->getStatusCode());

        $this->assertContains(
            $this->app->version(),
            $this->response->getContent()
        );
    }
}
