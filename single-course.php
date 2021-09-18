<?php get_header( ); 

    $relatedInstructor = get_field( 'related_instructors' )[0];
    $courseVideo = get_field( 'course_video' );

?>

<!-- Start Breadcrumb 
============================================= -->
<div class="breadcrumb-area bg-gray text-center shadow dark text-light bg-cover" style="background-image: url(<?php echo get_theme_file_uri( '/assets/img/banners/course-detail.jpg' ); ?>);">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h1>Course Details</h1>
                <ul class="breadcrumb">
                    <li><a href="<?php echo site_url( ); ?>"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="<?php echo site_url( '/courses' ); ?>"> Courses</a></li>
                    <li class="active"><?php the_title(); ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb -->

<!-- Start Course Details 
============================================= -->
<div class="course-details-area default-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 info">

                <div class="top-info">
                    <h2><?php the_title(); ?></h2>
                    <ul>
                        <li>
                            <div class="thumb">
                                <img src="<?php echo get_the_post_thumbnail_url( $relatedInstructor->ID ); ?>" alt="<?php echo $relatedInstructor->first_name . ' ' . $relatedInstructor->last_name; ?>">
                            </div>
                            <div class="info">
                                <span>Instructor</span>
                                <h5><?php echo $relatedInstructor->first_name . ' ' . $relatedInstructor->last_name[0]; ?></h5>
                            </div>
                        </li>
                        <li>
                            <div class="info">
                                <span>Category</span>
                                <h5>
                                    <?php $category = get_field( 'related_categories' )[0]; ?>
                                    <a href="/category/<?php echo $category->post_name; ?>">
                                        <?php
                                            // foreach( get_field( 'related_categories' ) as $cat )
                                            // {
                                            //     print_r( $cat );
                                            // }
                                        ?>
                                        <?php echo $category->post_title; ?>
                                    </a>
                                </h5>
                            </div>
                        </li>
                        <li>
                            <div class="info">
                                <span>Uploaded On</span>
                                <?php
                                    $uploadDate = new DateTime( get_field( 'upload_date' ) );
                                ?>
                                <h5><?php echo $uploadDate->format( 'F j, Y' ); ?></h5>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="main-content">
                    <?php

                        $reviews = new WP_Query( 
                            array( 
                                'post_type' => 'review',
                                'meta_query' => array(
                                    array(
                                        'key' => 'review_user_id',
                                        'compare' => 'like',
                                        'value' => get_the_ID(),
                                    )
                                )
                            )
                        );

                    ?>
                    <div class="center-tabs">
                        <ul id="tabs" class="nav nav-tabs">
                            <li class="nav-item">
                                <a href="" data-target="#tab1" data-toggle="tab" class="active nav-link">Overview</a>
                            </li>
                            <?php
                                if( $reviews->found_posts > 0 )
                                {
                                    ?>
                                        <li class="nav-item">
                                            <a href="" data-target="#tab4" data-toggle="tab" class="nav-link">Reviews</a>
                                        </li>
                                    <?php
                                }
                            ?>
                        </ul>
                        <div id="tabsContent" class="tab-content">
                            <div id="tab1" class="tab-pane overview fade active show">
                                <?php 
                                    if( the_content() )
                                    { ?>
                                        <h4>Course Description</h4>
                                        <?php the_content(); ?>
                                    <? }
                                ?>
                                <?php
                                    $learning_objectives = get_field( 'learning_objectives' );

                                    if( $learning_objectives )
                                    { ?>
                                        <h4>Learning Objectives</h4>
                                        <ul>
                                            <?php 
                                            
                                                foreach( $learning_objectives as $o )
                                                { ?>
                                                    <li><?php echo $o->post_title; ?></li>
                                                <?php }
                                            
                                            ?>
                                        </ul>
                                    <?php }
                                ?>
                            </div>
                            <?php
                                
                                if( $reviews->found_posts > 0 )
                                {
                                    ?>
                                        <div id="tab4" class="tab-pane reviews fade">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="avg-ratings">
                                                        <?php
                                                            $ratingsList = array();

                                                            while( $reviews->have_posts() )
                                                            {
                                                                $reviews->the_post();
                                                                array_push( $ratingsList, get_field( 'review_rating' ) );
                                                            }
                                                            wp_reset_postdata();
                                                        ?>
                                                        <h2><?php echo number_format( array_sum( $ratingsList ) / count( $ratingsList ), 1 ); ?></h2>
                                                        <div class="rating">
                                                            <?php 
                                                            
                                                                $avgRatingStars = floor( array_sum( $ratingsList ) / count( $ratingsList ) );
                                                                foreach( range( 1, $avgRatingStars ) as $a )
                                                                { 
                                                                    ?>
                                                                        <i class="fas fa-star"></i>
                                                                    <?php
                                                                }
                                                                
                                                            ?>
                                                            <!-- <i class="fas fa-star-half-alt"></i> -->
                                                        </div>
                                                        <?php echo $reviews->found_posts; ?> Rating<?php echo ( $reviews->found_posts != 1 ) ? 's' : ''; ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 rating-counter">
                                                    <ul>
                                                        <?php

                                                            $cleanedRatingsList = array();
                                                            foreach( range(1, 5) as $s )
                                                            {
                                                                $ratingCount;
                                                                $cleanedRatingsList[$s] = ( array_count_values( $ratingsList )[$s] ) ? array_count_values( $ratingsList )[$s] : 0;
                                                            }

                                                            foreach( array_reverse( $cleanedRatingsList, true ) as $key => $val )
                                                            {
                                                                array_sum( $ratingsList ) / count( $ratingsList );
                                                                ?>
                                                                    <li>
                                                                        <span><?php echo $key; ?> Star<?php echo ( $key != 1 ) ? 's' : ''; ?></span>
                                                                        <span><?php echo $val; ?></span>
                                                                        <div class="rating-bar">
                                                                            <div style="border-radius: 30px; height: 7px;" class="progress">
                                                                                <div style="background: #ffb606; border-radius: 30px; width: <?php echo ( $val / count( $ratingsList ) )*100; ?>%" class="progress-bar" role="progressbar" aria-valuenow="<?php echo ( $val / count( $ratingsList ) ); ?>" aria-valuemin="0" aria-valuemax="<? echo count( $ratingsList ); ?>"></div>
                                                                            </div>
                                                                        </div>
                                                                    </li>            
                                                                <?php

                                                            }

                                                        ?>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="rating-provider">
                                                <?php

                                                    $reviews = new WP_Query( 
                                                        array( 
                                                            'post_type' => 'review',
                                                            'meta_query' => array(
                                                                array(
                                                                    'key' => 'review_user_id',
                                                                    'compare' => 'like',
                                                                    'value' => get_the_ID(),
                                                                )
                                                            )
                                                        )
                                                    );

                                                    while( $reviews->have_posts() )
                                                    {
                                                        $reviews->the_post();
                                                        ?>

                                                            <!-- Single Item -->
                                                            <div class="single-item">
                                                                <div class="thumb">
                                                                    <?php echo get_avatar( get_the_author_email(), 80 ); ?>
                                                                </div>
                                                                <div class="info">
                                                                    <div class="title">
                                                                        <h4><?php the_author(); ?></h4>
                                                                        <span><?php the_date(); ?></span>
                                                                    </div>
                                                                    <div class="rating">
                                                                        <?php

                                                                            $starCount = get_field( 'review_rating' );
                                                                            foreach( range( 1, $starCount ) as $star )
                                                                            {
                                                                                ?>
                                                                                    <i class="fas fa-star"></i>
                                                                                <?php
                                                                            }

                                                                        ?>
                                                                    </div>
                                                                    <div class="content">
                                                                        <p><?php the_content(); ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Single Item -->

                                                        <?php
                                                    }


                                                    wp_reset_postdata(  );
                                                ?>
                                            </div>

                                            <?php get_template_part( '/includes/section', 'comment-form' ); ?>

                                        </div>
                                    <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-4 sidebar">
                <!-- Single Item -->
                <div class="item course-preview">
                    <div class="thumb">
                        <img src="<?php the_post_thumbnail_url( 'playCourseVideoLandscape' ); ?>" alt="<?php the_title(); ?>">
                        <a href="<?php echo $courseVideo['url']; ?>" class="popup-youtube light video-play-button item-center">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                    <div class="content">
                        <div class="course-includes">
                            <ul>
                                <li class="course-info">
                                    <i class="fas fa-clock"></i> Duration <span class="float-right"><?php echo gmdate( "i", wp_get_attachment_metadata( $courseVideo['ID'] )['length'] ); ?>m</span>
                                </li>
                                <li class="course-info">
                                    <i class="fas fa-sliders-h"></i> Skill level <span class="float-right"><?php echo get_field( 'skill_level' ); ?></span>
                                </li>
                                <!-- <li>
                                    <i class="fas fa-users"></i> Students <span class="float-right">12K</span>
                                </li> -->
                            </ul>
                        </div>
                        <a class="btn btn-theme effect btn-sm watch-button" href="#">Enroll Now</a>
                    </div>
                </div>
                <!-- Single Item -->

                <!-- Single Item -->
                <div class="item related-course">
                    <div class="content">
                        <h4>Related Courses</h4>
                        <div class="related-courses-items">
                            <?php 
                                $relatedCourses = get_field( 'related_courses' );
                                if( $relatedCourses )
                                {
                                    foreach( $relatedCourses as $course )
                                    { ?>
                                        <div class="item">
                                            <div class="content">
                                                <div class="thumb">
                                                    <a href="<?php echo get_the_permalink( $course ); ?>">
                                                        <img src="<?php echo get_the_post_thumbnail_url( $course, 'relatedCourseVideoLandscape' ); ?>" alt="<?php echo get_the_title( $course ); ?>">
                                                    </a>
                                                </div>
                                                <div class="info">
                                                    <h5>
                                                        <a href="<?php echo get_the_permalink( $course ); ?>"><?php echo mb_strimwidth( get_the_title( $course ), 0, 35, '...' ); ?></a>
                                                    </h5>
                                                    <!-- <div class="rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star-half-alt"></i>
                                                        <span>4.5 (1.3k)</span>
                                                    </div> -->
                                                    <div class="meta">
                                                        <?php $instructor = get_field( 'related_instructors' )[0]; ?>
                                                        <i class="fas fa-user"></i> By <?php echo $instructor->first_name; ?> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                }
                                else { ?>
                                    <p>No related courses</p>
                                <?php }
                            ?>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->
                
            </div>
        </div>
    </div>
</div>
<!-- End Course Details -->
<?php get_footer( ); ?>
