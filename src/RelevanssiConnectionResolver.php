<?php

namespace WPGraphQL\Extensions\Relevanssi;

class RelevanssiConnectionResolver extends \WPGraphQL\Data\DataSource\PostObjectConnectionResolver {
    /**
     * @return \WP_Query
     */
    public function get_query() {

        $query = new \WP_Query();
        $query->parse_query( array( "s" => $this->query_args['s'] ) );
        $search_results = relevanssi_do_query( $query );

        // Get an array of IDs and add it to the query arguments
        $ids = wp_list_pluck( $search_results, 'ID' );

        // Update the query to ensure results correspond to Relevanssi ones
        $this->query_args['post__in'] = $ids;

        // Keep Relevanssi order
        $this->query_args['orderby'] = 'post__in';

        // Avoid default WP pagination limit (this will ensure the limit is set by WPGraphQL)
        $this->query_args['posts_per_page'] = count($ids);

        // Remove search parameter to avoid breaking the query ("s" triggers the default WP_Query search which is not what we want).
        unset($this->query_args["s"]);

        // Generate a new query in order to be digested by the resolver
        return new \WP_Query( $this->query_args );
    }
}