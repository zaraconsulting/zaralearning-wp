<?php


    function course_rest()
    {
        function queryResults( $data )
        {
        
            $courses = new WP_Query( array(
                'post_type' => 'course'
            ) );

            $results = array();
            while($courses->have_posts()) {
                $courses->the_post();
                $c = $courses->current_post;
                // $data = array(
                //     // 'id' => get_the_ID(),
                //     'title' => get_the_title(),
                //     // 'permalink' => get_the_permalink(),
                //     // 'date_created' => get_the_date(),
                //     // 'date_updated' => $course['post_updated'],
                //     // 'title' => get_the_title(),
                //     // 'title' => get_the_title(),
                //     // 'title' => get_the_title(),
                //     // 'title' => get_the_title(),
                // );
                array_push($results, array(
                    'id' => get_the_ID(),
                    'title' => get_the_title(),
                    'permalink' => get_the_permalink(),
                    'date_created' => get_the_date(),
                    'date_updated' => $c['post_modified'],
                    // 'title' => get_the_title(),
                    // 'title' => get_the_title(),
                    // 'title' => get_the_title(),
                    // 'title' => get_the_title(),
                ));
            }
            return $results;
            // return $courses->posts;
        }

        register_rest_route( 'app/v1', 'courses', array(
            'methods' => WP_REST_SERVER::READABLE,
            'callback' => 'queryResults' 
        ) );

        function handleCoursePost( WP_REST_Request $request_data ) {
            print_r( $request_data );
        
            // Fetching values from API
            // $data = $request_data->get_params()->course_id;
            return ['course_id' => $request_data];


        }

        register_rest_route( 'app/v1', 'courses', array(
            'methods' => WP_REST_Server::EDITABLE,
            'callback' => 'handleCoursePost'
        ) );
    };
    add_action( 'rest_api_init', 'course_rest' );
