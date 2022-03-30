<?php

// Template Name: Course Category Taxonomy Archive
// Template Post: course_categories, course_category

get_header(); 

?>

<!-- Start Breadcrumb 
============================================= -->
<div class="breadcrumb-area bg-gray text-center shadow dark text-light bg-cover" style="background-image: url(<?php echo get_theme_file_uri( '/assets/img/banners/course-detail.jpg' ); ?>);">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h1>Courses</h1>
                <!-- <ul class="breadcrumb">
                    <li><a href="<?php echo site_url( ); ?>"><i class="fas fa-home"></i> Home</a></li>
                    <li class="active">Courses</li>
                </ul> -->
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb -->

<!-- Star Courses Area
============================================= -->
<div class="courses-area default-padding">
    <div class="container">
        <div class="courses-items">
            <div class="row">

                <?php

                    while( get_terms( 'course_categories' )->have_posts() )
                    {
                        get_terms( 'course_categories' )->the_post();

                        $instructor = get_field( 'related_instructors' )[0];
                        $course_category = get_the_terms( $post, 'course_categories' )[0];
                        $courseVideoMinutesTotal = 0;
                        $courseVideoHoursTotal = 0;
                        $courseVideoCount = 0;
                        
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
                        // print_r( $reviews );

                        // Get video time totals
                        $videos = get_terms( array(
                            'taxonomy' => 'curriculum_video',
                        ) );

                        foreach( $videos as $v )
                        {
                            // print_r( get_field( 'curriculum_topic_video', $v ) );
                            $videoHours = gmdate( "H", wp_get_attachment_metadata( get_field( 'curriculum_topic_video', $v )['ID'] )['length'] );
                            $videoMinutes = gmdate( "i", wp_get_attachment_metadata( get_field( 'curriculum_topic_video', $v )['ID'] )['length'] );
                            $courseVideoMinutesTotal+=$videoMinutes;
                            $courseVideoHoursTotal += $videoHours;
                            
                            $courseVideoCount+=$v->count;
                        }
                        $courseVideoMinutesTotal += $courseVideoHoursTotal;
                        $courseDuration = floor( $courseVideoMinutesTotal / 60 ) + floor( $courseVideoHoursTotal );


                        ?>

                        <!-- Single item -->
                        <div class="single-item col-lg-4 col-md-6">
                            <div class="item">
                                <a href="<?php echo get_the_permalink(); ?>">
                                    <div class="thumb">
                                        <img src="<?php the_post_thumbnail_url( 'playCourseVideoLandscape' ); ?>" alt="<?php the_title(); ?>">
                                        <div class="course-info">
                                            <ul>
                                                <li>
                                                    <i class="fas fa-clock"></i> 
                                                    <?php

                                                        if( floor( $courseVideoMinutesTotal / 60 ) < 1 )
                                                        {
                                                            ?>
                                                                <?php echo $courseVideoMinutesTotal; ?> Minute<?php echo ( floor( $courseVideoMinutesTotal / 60 ) != 1 ) ? 's': ''; ?>
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                                <?php echo $courseDuration; ?> Hour<?php echo ( $courseDuration > 1 ) ? 's': ''; ?>
                                                            <?php
                                                        }

                                                    ?>
                                                </li>
                                                <li><i class="fas fa-list-ul"></i> <?php echo $courseVideoCount; ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </a>
                                <div class="top-info">
                                    <div class="meta">
                                        <?php $relatedInstructor = get_field( 'related_instructors' )[0]; ?>
                                        <ul>
                                            <li>
                                                <img src="<?php echo get_the_post_thumbnail_url( $relatedInstructor->ID ); ?>" alt="<?php echo $relatedInstructor->instructor_first_name . ' ' . $relatedInstructor->instructor_last_name; ?>">
                                                <span>
                                                    <strong><?php echo $relatedInstructor->instructor_first_name; ?></strong> in <a href="<?php echo get_term_link( $course_category->slug, 'course_categories' ); ?>"><?php echo mb_strimwidth( $course_category->name, 0, 20, '...' ); ?></a>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="info">
                                    
                                    <div class="price-rating">
                                        <?php
                                            if( $reviews->found_posts > 0 )
                                            {
                                                $ratingsList = array();

                                                while( $reviews->have_posts() )
                                                {
                                                    $reviews->the_post();
                                                    array_push( $ratingsList, get_field( 'review_rating' ) );
                                                }
                                                wp_reset_postdata();
                                                ?>
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
                                                    <span>(<?php echo $reviews->found_posts; ?>)</span>
                                                </div>
                                                
                                                <?php
                                            }
                                            else
                                            {
                                                ?>
                                                    <span>No reviews yet</span>
                                                <?php
                                            }
                                        ?>
                                        <!-- <div class="price">
                                            Free
                                        </div> -->
                                    </div>
                                    <h5>
                                        <a href="<?php the_permalink(); ?>"><?php echo mb_strimwidth( get_the_title(), 0, 30, '...' ); ?></a>
                                    </h5>
                                    <div class="bottom">
                                        <ul>
                                            <li><i class="fas fa-user"></i> <?php echo $reviews->found_posts; ?></li>
                                        </ul>
                                            <?php

                                            if( is_user_logged_in() )
                                            {
                                                ?>
                                                <a href="<?php echo get_the_permalink(); ?>"><i class="fas fa-eye"></i> Watch</a>
                                                <?php
                                            }
                                            else
                                            {
                                                ?>
                                                <a href="#"><i class="fas fa-shopping-cart"></i> Add to cart</a>
                                                <?php

                                            }

                                            ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single item -->

                    <?php }

                ?>

            </div>
            <!-- Pagination -->
            <!-- <div class="row">
                <div class="col-md-12 pagi-area text-center">
                    <nav aria-label="navigation">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-double-left"></i></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-double-right"></i></a></li>
                        </ul>
                    </nav>
                </div>
            </div> -->
        </div>
    </div>
</div>
<!-- End Courses Area -->

<?php get_footer(); ?>