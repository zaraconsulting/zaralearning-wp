<?php


    function reviewRoutes()
    {
        function reviewSearchResults()
        {
        
            $reviews = new WP_Query( array(
                'post_type' => 'review'
            ) );
        
            return $reviews->posts;
        }
        function createReview( $data )
        {

            wp_insert_post( array(
                'post_type' => 'review',
                'post_title' => $data['comment'],
                'post_name' => $data['name'],
                'post_content' => $data['comment'],
                'post_status' => 'publish',
                'meta_input' => array(
                     'review_user_id' => $data['course_id'],
                     'review_rating' => $data['rating'],
                )
            ) );
        }

        register_rest_route( 'app/v1', 'reviews', array(
            'methods' => WP_REST_SERVER::READABLE,
            'callback' => 'reviewSearchResults'
        ) );
        register_rest_route( 'app/v1', 'reviews', array(
            'methods' => WP_REST_Server::EDITABLE,
            'callback' => 'createReview'
        ) );
    };
    
    add_action( 'rest_api_init', 'reviewRoutes' );
?>