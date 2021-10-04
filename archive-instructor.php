<?php get_header(); ?>

<!-- Start Breadcrumb 
============================================= -->
<div class="breadcrumb-area bg-gray text-center shadow dark text-light bg-cover" style="background-image: url(<?php echo get_theme_file_uri( '/images/instructor_banner.png' ); ?>);">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h1>Instructors</h1>
                <!-- <ul class="breadcrumb">
                    <li><a href="<?php echo site_url( '' ); ?>"><i class="fas fa-home"></i> Home</a></li>
                    <li class="active">Instructors</li>
                </ul> -->
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb -->

<!-- Star Advisor Area
============================================= -->
<div class="advisor-area default-padding bottom-less">
    <div class="container">
        <div class="advisor-items text-center">
            <?php

                while( have_posts() )
                {
                    the_post();

                    ?>
                        <div class="row">
                            <!-- Single Item -->
                            <div class="single-item col-lg-3 col-md-6">
                                <div class="item">
                                    <div class="thumb">
                                        <img src="<?php echo the_post_thumbnail_url( 'relatedCourseVideoLandscape' ); ?>" alt="<?php echo get_field( 'instructor_first_name' ) . ' ' . get_field( 'instructor_last_name' ); ?>">
                                        <ul>
                                            <?php
                                                if( get_field( 'instructor_facebook' ) )
                                                {
                                                    ?>
                                                        <li class="facebook">
                                                            <a target="_blank" href="<?php echo get_field( 'instructor_facebook' ); ?>">
                                                                <i class="fab fa-facebook-f"></i>
                                                            </a>
                                                        </li>
                                                    <?php
                                                }
                                                if( get_field( 'instructor_twitter' ) )
                                                {
                                                    ?>
                                                        <li class="twitter">
                                                            <a target="_blank" href="<?php echo get_field( 'instructor_twitter' ); ?>">
                                                                <i class="fab fa-twitter"></i>
                                                            </a>
                                                        </li>
                                                    <?php
                                                }
                                                if( get_field( 'instructor_linkedin' ) )
                                                {
                                                    ?>
                                                        <li class="linkedin">
                                                            <a target="_blank" href="<?php echo get_field( 'instructor_linkedin' ); ?>">
                                                                <i class="fab fa-linkedin-in"></i>
                                                            </a>
                                                        </li>
                                                    <?php
                                                }
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="info">
                                        <h4><a href="<?php echo get_the_permalink(); ?>"><?php echo get_field( 'instructor_first_name' ) . ' ' . get_field( 'instructor_last_name' ); ?></a></h4>
                                        <span><?php echo get_field( 'instructor_title' ); ?></span>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->
                        </div>
                    <?php
                }

            ?>
        </div>
    </div>
</div>
<!-- End Advisor Area -->

<?php get_footer(); ?>