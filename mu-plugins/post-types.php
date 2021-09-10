<?php

function custom_post_types()
{

    register_post_type( 'instructor', array(
        'public' => true,
        'has_archive' => true,
        'supports' => array( 'title', 'thumbnail' ),
        // 'rewrite' => array( 'slug' => 'instructor' ),
        'show_in_rest' => true,
        'labels' => array(
            'name' => 'Instructors',
            'singular_name' => 'Instructor',
            'add_new_item' => 'Add New Instructor',
            'edit_item' => 'Edit Instructor',
            'all_items' => 'All Instructors',
        ),
        'menu_icon' => 'dashicons-admin-users' 
    ) );
        
    register_post_type( 'category', array(
        'public' => true,
        'has_archive' => true,
        'supports' => array( 'title', 'thumbnail' ),
        // 'rewrite' => array( 'slug' => 'categories' ),
        'show_in_rest' => true,
        'labels' => array(
            'name' => 'Categories',
            'singular_name' => 'Category',
            'add_new_item' => 'Add New Category',
            'edit_item' => 'Edit Category',
            'all_items' => 'All Categories',
        ),
        'menu_icon' => 'dashicons-welcome-learn-more',
        'taxonomies' => array( 'category' )
    ) );

    // Category Taxonomy
    register_taxonomy( 'category', array( 'category' ), array(
        'hierarchical' => true,
        'labels' => array(
            'name' => _x( 'Categories', 'taxonomy general name' ),
            'singular_name' => _x( 'Category', 'taxonomy singular name' ),
            'search_items' => __( 'Search Categories' ),
            'all_items' => __( 'All Categories' ),
            'parent_item' => __( 'Parent Category' ),
            'parent_item_colon' => __( 'Parent Category:' ),
            'edit_item' => __( 'Edit Category' ),
            'update_item' => __( 'Update Category' ),
            'add_new_item' => __( 'Add New Category' ),
            'new_item_name' => __( 'New Category Name' ),
            'menu_name' => __( 'Categories' ),
        ),
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'category' ),
    ));
        
    register_post_type( 'course', array(
        'public' => true,
        'has_archive' => true,
        'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'rewrite' => array( 'slug' => 'courses' ),
        'show_in_rest' => true,
        'labels' => array(
            'name' => 'Courses',
            'singular_name' => 'Course',
            'add_new_item' => 'Add New Course',
            'edit_item' => 'Edit Course',
            'all_items' => 'All Courses',
        ),
        'menu_icon' => 'dashicons-edit'
    ) );
        
    register_post_type( 'learning-objective', array(
        'public' => false,
        'supports' => array( 'title' ),
        'show_ui' => true,
        'show_in_rest' => true,
        'labels' => array(
            'name' => 'Learning Objectives',
            'singular_name' => 'Learning Objective',
            'add_new_item' => 'Add New Learning Objective',
            'edit_item' => 'Edit Learning Objective',
            'all_items' => 'All Learning Objectives',
        ),
        'menu_icon' => 'dashicons-edit'
    ) );

}
add_action( 'init', 'custom_post_types' );