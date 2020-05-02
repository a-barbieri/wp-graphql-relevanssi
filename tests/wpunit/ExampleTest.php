<?php

use Codeception\TestCase\WPTestCase;

class ExampleTest extends WPTestCase
{
    /**
     * @var WpunitTester
     */
    protected $tester;

    public function setUp(): void
    {
        // Before...
        parent::setUp();

        // Your set up methods here.
    }

    public function tearDown(): void
    {
        // Your tear down methods here.

        // Then...
        parent::tearDown();
    }

    public function testInit()
    {
        $this->assertEquals(WPGRAPHQL_RELEVANSSI, 'initialized');
    }

}
