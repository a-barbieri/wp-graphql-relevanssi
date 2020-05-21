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

        register_post_type('test_cpt', [
            'show_ui' => true,
            'labels' => [
                'menu_name' => __('Docs', 'your-textdomain'),
            ],
            'supports' => ['title'],
            'show_in_graphql' => true,
            'hierarchical' => true,
            'graphql_single_name' => 'testCpt',
            'graphql_plural_name' => 'testCpts',
        ]);
    }

    public function tearDown(): void
    {
        parent::tearDown();
//        \WPGraphQL::clear_schema();
    }

    function createPosts($count, $args = [])
    {
        // Avoid storing colors in alphabetical orders otherwise you mihgt end up with a false positive.
        $colors = array(
            "yellow",
            "red",
            "brown",
            "black"
        );
        $animals = array(
            "cat",
            "dog",
            "fish"
        );

        foreach ($animals as $animal) {
            foreach ($colors as $color) {
                self::factory()->post->create(
                    array_merge(
                        [
                            'post_title' => "$color $animal",
                        ],
                        $args
                    )
                );
            }
        }
    }

    public function testInit()
    {
        $this->assertEquals(WPGRAPHQL_RELEVANSSI, 'initialized');
    }
}
