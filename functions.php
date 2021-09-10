<?php

    function load_static_files()
    {

        wp_enqueue_style( 'main_styles', get_theme_file_uri( '/style.css' ) );

        wp_enqueue_style( 'favicon', get_theme_file_uri( '/assets/img/favicon.png' ) );
        wp_enqueue_style( 'bootstrap', get_theme_file_uri( '/assets/css/bootstrap.min.css' ) );
        wp_enqueue_style( 'font-awesome', get_theme_file_uri( '/assets/css/font-awesome.min.css' ) );
        wp_enqueue_style( 'themify-icons', get_theme_file_uri( '/assets/css/themify-icons.css' ) );
        wp_enqueue_style( 'flaticon-set', get_theme_file_uri( '/assets/css/flaticon-set.css' ) );
        wp_enqueue_style( 'elegant-icons', get_theme_file_uri( '/assets/css/elegant-icons.css' ) );
        wp_enqueue_style( 'magnific-popup', get_theme_file_uri( '/assets/css/magnific-popup.css' ) );
        wp_enqueue_style( 'owl-carousel', get_theme_file_uri( '/assets/css/owl.carousel.min.css' ) );
        wp_enqueue_style( 'owl-theme', get_theme_file_uri( '/assets/css/owl.theme.default.min.css' ) );
        wp_enqueue_style( 'animate', get_theme_file_uri( '/assets/css/animate.css' ) );
        wp_enqueue_style( 'bootsnav', get_theme_file_uri( '/assets/css/bootsnav.css' ) );
        wp_enqueue_style( 'responsive', get_theme_file_uri( '/assets/css/responsive.css' ) );
        wp_enqueue_style( 'custom', get_theme_file_uri( '/assets/css/custom.css' ) );

        // wp_enqueue_script( 'jquery', get_theme_file_uri( '/assets/js/jquery-1.12.4.min.js' ), array( 'jquery' ), '1.12.4', true );            
        wp_enqueue_script( 'popper', get_theme_file_uri( '/assets/js/popper.min.js' ), array( 'jquery' ), '1.12.4', true );            
        wp_enqueue_script( 'bootstrap', get_theme_file_uri( '/assets/js/bootstrap.min.js' ), array( 'jquery' ), '1.12.4', true );            
        wp_enqueue_script( 'jquery-appear', get_theme_file_uri( '/assets/js/jquery.appear.js' ), array( 'jquery' ), '1.12.4', true );            
        wp_enqueue_script( 'jquery-easing', get_theme_file_uri( '/assets/js/jquery.easing.min.js' ), array( 'jquery' ), '1.12.4', true );            
        wp_enqueue_script( 'jquery-magnific-popup', get_theme_file_uri( '/assets/js/jquery.magnific-popup.min.js' ), array( 'jquery' ), '1.12.4', true );            
        wp_enqueue_script( 'modernizr', get_theme_file_uri( '/assets/js/modernizr.custom.13711.js' ), array( 'jquery' ), '1.12.4', true );            
        wp_enqueue_script( 'owl-carousel', get_theme_file_uri( '/assets/js/owl.carousel.min.js' ), array( 'jquery' ), '1.12.4', true );            
        wp_enqueue_script( 'wow', get_theme_file_uri( '/assets/js/wow.min.js' ), array( 'jquery' ), '1.12.4', true );            
        wp_enqueue_script( 'progress-bar', get_theme_file_uri( '/assets/js/progress-bar.min.js' ), array( 'jquery' ), '1.12.4', true );            
        wp_enqueue_script( 'isotope', get_theme_file_uri( '/assets/js/isotope.pkgd.min.js' ), array( 'jquery' ), '1.12.4', true );            
        wp_enqueue_script( 'imagesloaded', get_theme_file_uri( '/assets/js/imagesloaded.pkgd.min.js' ), array( 'jquery' ), '1.12.4', true );            
        wp_enqueue_script( 'count-to', get_theme_file_uri( '/assets/js/count-to.js' ), array( 'jquery' ), '1.12.4', true );            
        wp_enqueue_script( 'YTPlayer', get_theme_file_uri( '/assets/js/YTPlayer.min.js' ), array( 'jquery' ), '1.12.4', true );            
        wp_enqueue_script( 'jquery-nice-select', get_theme_file_uri( '/assets/js/jquery.nice-select.min.js' ), array( 'jquery' ), '1.12.4', true );            
        wp_enqueue_script( 'loopcounter', get_theme_file_uri( '/assets/js/loopcounter.js' ), array( 'jquery' ), '1.12.4', true );            
        wp_enqueue_script( 'bootsnav', get_theme_file_uri( '/assets/js/bootsnav.js' ), array( 'jquery' ), '1.12.4', true );            
        wp_enqueue_script( 'main_scripts', get_theme_file_uri( '/assets/js/main.js' ), array( 'jquery' ), '1.12.4', true );            

    }

add_action( 'wp_enqueue_scripts', 'load_static_files' );

function extra_features()
{
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'playCourseVideoLandscape', 800, 600, true );
    add_image_size( 'relatedCourseVideoLandscape', 800, 800, true );
    add_image_size( 'courseCategoryLandscape', 360, 360, true );
    add_image_size( 'pageBanner', 2440, 1578, true );
    add_image_size( 'instructorThumbnail', 100, 100, true );
}
add_action( 'after_setup_theme', 'extra_features' );