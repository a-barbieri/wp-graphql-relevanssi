<?php
/**
 * Plugin Name: WPGraphQL Relevanssi Extension Plugin
 * Plugin URI: https://github.com/a-barbieri/wp-graphql-relevanssi
 * Description: A plugin to use Relevanssi on WP GraphQL
 * Author: Alessandro Barbieri
 * Version: 0.1.0
 *
 * @package wpgraphql-relevanssi
 */


// To make this plugin work properly for both Composer users and non-composer
// users we must detect whether the project is using a global autoloader. We
// can do that by checking whether our autoloadable classes will autoload with
// class_exists(). If not it means there's no global autoloader in place and
// the user is not using composer. In that case we can safely require the
// bundled autoloader code.
if (!class_exists('\WPGraphQL\Extensions\Relevanssi\Loader')) {
    require_once __DIR__ . '/vendor/autoload.php';
}
// This way we can add the vendor/ directory to git and have the plugin "just
// work" when it is cloned to wp-content/plugins. But be careful when checking
// the vendor/ into git so you won't add all development dependencies too. Eg.
// before checking it in you should always run "composer install --no-dev" first.


// Also this plugin entry file should be kept small as possible. By keeping all
// the code in the autoloadable classes you'll have the option to ship the
// plugin as normal composer library and just have users to call your init
// function from a theme or a mu-plugin.
\WPGraphQL\Extensions\Relevanssi\Loader::init();
// If want to add "accessor functions" that are not part of any class you can
// just define them in the same file your init class is in.
