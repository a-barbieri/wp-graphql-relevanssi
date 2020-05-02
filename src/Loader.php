<?php

namespace \WPGraphQL\Extensions\Relevanssi;

class Loader
{
    public static function init()
    {
        define('WPGRAPHQL_RELEVANSSI', 'initialized');

        add_action('the_title', function () {
            return 'WPGRAPHQL RELEVANSSI TITLE MOD';
        });
    }
}