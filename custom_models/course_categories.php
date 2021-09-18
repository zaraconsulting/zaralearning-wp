<?php

function getCourseByCategory( $data )
{
    // Query Custom Post Type By Custom Taxonomy
    $courses = new WP_Query( array(
        'post_type' => 'course',
        'tax_query' => array(
            array(
                'taxonomy' => 'course_categories',
                'field' => 'slug',
                'terms' => $data['term']
            )
        )
    ) );

    while( $courses->have_posts() )
    {
        $courses->the_post();
    }
    return $courses;
}

function courseCategoryRoutes()
{
    register_rest_route( 'app/v1', 'course/category', array(
        'methods' => WP_REST_SERVER::EDITABLE,
        'callback' => 'getCourseByCategory'
    ) );
}

add_action( 'rest_api_init', 'courseCategoryRoutes' );