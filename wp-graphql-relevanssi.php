<?php
/**
 * Plugin Name: WPGraphQL Relevanssi
 * Description: A plugin to use Relevanssi on WP GraphQL
 * Plugin URI: https://github.com/a-barbieri/wp-graphql-relevanssi
 * Version: 0.0.1
 * Requires at least: 5.2
 * Requires PHP: 7.2
 * Author: Alessandro Barbieri
 * Author URI: https://github.com/a-barbieri
 * Requires PHP: 7.0
 * License: GPL-3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain: wp-graphql-relevanssi
 * Domain Path: /languages
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'WPGraphQL_Relevanssi' ) ) :

    final class WPGraphQL_Relevanssi {

        /**
         * Stores the instance of the WPGraphQL class
         *
         * @var WPGraphQL_Relevanssi The class singleton
         */
        private static $instance;

        /**
         * The instance of the WPGraphQL object
         *
         * @return object|WPGraphQL_Relevanssi The class singleton
         */
        public static function instance() {

            if ( ! isset( self::$instance ) && ! ( self::$instance instanceof WPGraphQL_Relevanssi ) ) {
                self::$instance = new WPGraphQL_Relevanssi();
            }

            /**
             * Return the WPGraphQL Instance
             */
            return self::$instance;

        }
    }

endif;

if ( ! function_exists( 'wpgraphql_relevanssi_init' ) ) {
    /**
     * Function that instantiates the plugins main class
     */
    function wpgraphql_relevanssi_init() {

        /**
         * Return an instance of the action
         */
        return WPGraphQL_Relevanssi::instance();
    }
}

/**
 * Run the function which will instantiates the class
 */
wpgraphql_relevanssi_init();