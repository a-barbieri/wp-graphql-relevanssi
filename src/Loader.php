<?php

namespace WPGraphQL\Extensions\Relevanssi;

class Loader
{
    public static function init()
    {
        define('WPGRAPHQL_RELEVANSSI', 'initialized');

        (new Loader())->bind_hooks();
    }


    function bind_hooks()
    {
        add_action(
            'graphql_register_types',
            [$this, 'op_action_register_types'],
            9,
            0
        );
    }

    static function add_post_type_fields(\WP_Post_Type $post_type_object)
    {
        $type_singular_name = ucfirst($post_type_object->graphql_single_name);
        $type_plural_name = ucfirst($post_type_object->graphql_plural_name);
        $config = [
            'fromType' => 'RootQuery',
            // WARNING: make sure post_type setup follows your Relevanssi configuration.
            'toType' => $type_singular_name,
            'fromFieldName' => $type_plural_name."Search",
            'connectionTypeName' => $type_plural_name.'FromRelevanssiQueryConnection',
            'resolve' => function( $id, $args, $context, $info ) {
                // Resolve the query:
                $resolver = new RelevanssiConnectionResolver( $source, $args, $context, $info, $type_singular_name );
                return $resolver->get_connection();
            },
            'connectionArgs' => [
                'search' => [
                    'name'        => 'search',
                    'type'        => 'String',
                    'description' => __( "Show $type_plural_name based on a keyword search", 'wp-graphql-relevanssi' ),
                ]
            ]
        ];
        register_graphql_connection($config);
    }

    function op_action_register_types()
    {
        foreach (\WPGraphQL::get_allowed_post_types() as $post_type) {
            self::add_post_type_fields(get_post_type_object($post_type));
        }
    }
}