<?php get_header(); ?>

    <!-- Start Banner 
    ============================================= -->
    <div class="banner-area content-only top-pad-170 shadow dark text-light bg-fixed text-center" style="background-image: url(<?php echo get_field( 'page_banner' ); ?>);">
        <div class="item">
            <div class="container">
                <div class="row align-center">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="content">
                            <!-- <h1>The Software Developer's Toolkit</h1> -->
                            <form method="GET" action="<?php echo esc_url( site_url( '/courses' ) ); ?>">
                                <input type="text" placeholder="Search for a training video" class="form-control" name="s">
                                <button type="submit"><i class="fas fa-search"></i></button>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>     
    </div>
    <!-- End Banner -->

    <!-- Star Categories Area
    ============================================= -->
    <div class="categories-area reverse bg-gray carousel-shadow default-padding">
        <div class="container">
            <div class="categories-box">
                <div class="row">

                    <div class="col-lg-5 heading">
                        <h2>Find a subject related to a career of your interest</h2>
                        <p>
                              We have a catalogue of subjects to choose from to get you started on a path toward your new career. We have an extensive library of topics to choose from.
                        </p>
                        <?php $terms = get_terms( 'course_category' ); ?>
                        <!-- <a class="btn btn-md btn-gradient icon-left text-white" href="<?php echo site_url( '/courses' ); ?>"><i class="fas fa-grip-horizontal"></i> View All</a> -->
                    </div>

                    <div class="col-lg-7">
                        <div class="category-items categories-carousel owl-carousel owl-theme text-light text-center">
                            
                            <?php

                                $categories = get_terms( array(
                                    'taxonomy' => 'course_categories',
                                    'hide_empty' => true
                                ) );

                                foreach( $categories as $category )
                                {
                                    ?>
                                        <div class="item">
                                            <a style="background: <?php echo get_field( 'course_category_color', $category ); ?>;" href="<?php echo get_term_link( $category ); ?>">
                                                <i class="flaticon-<?php echo get_field( 'course_category_flaticon', $category ); ?>"></i>
                                                <div class="info">
                                                    <h5><?php echo $category->name; ?></h5>
                                                    <p><?php echo mb_strimwidth( $category->description, 0, 50, '...' ); ?></p>
                                                    <span><?php echo $category->count; ?> Course<?php echo ($category->count != 1 ) ? 's' : ''; ?></span>
                                                </div>
                                            </a>
                                        </div>
                                    <?php
                                }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="categories-area carousel-shadow thumb-cats default-padding">
    </div>
    <!-- End Categories -->

    <!-- Star Courses Area
    ============================================= -->
    <div class="course-area default-padding-bottom bottom-less">

        <!-- Fixed Shape -->
        <div class="fixed-shape">
            <img src="<?php echo get_theme_file_uri( '/assets/img/shape/7.png' ); ?>" alt="Shape">
        </div>
        <!-- End Fixed Shape -->

        <div class="container">
            <div class="heading-left">
                <div class="row">
                    <div class="col-lg-5">
                        <h5>Popular Courses</h5>
                        <h2>
                            Career-Oriented Training Courses
                        </h2>
                    </div>
                    <div class="col-lg-6 offset-lg-1">
                        <p>Search our videos to get started learning how to code from professionals in the industry. It's career-guided, so that means there's no fluff.</p>
                        <a class="btn btn-md btn-dark border" href="<?php echo site_url( 'courses' ); ?>">View All <i class="fas fa-plus"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="courses-box">
                <div class="row">
                    <?php

                        $courses = new WP_Query( array(
                            'post_type' => 'course',
                            'posts_per_page' => 9,
                        ) );

                        while( $courses->have_posts() )
                        {
                            $courses->the_post();
                            $instructor = get_field( 'related_instructors' )[0];
                            $course_category = get_the_terms( $post, 'course_categories' )[0];
                            $courseVideoCountTotal = 0;
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
                                // print_r( get_field( 'curriculum_course_parent', $v ) );
                                $curriculum_course_parent = get_field( 'curriculum_course_parent', $v );
                                // print_r( $curriculum_course_parent );
                                foreach( $curriculum_course_parent as $ccp )
                                {
                                    // print_r( $ccp->ID );
                                    if( $ccp->ID == $post->ID )
                                    {
                                        $videoTime = gmdate( "i", wp_get_attachment_metadata( get_field( 'curriculum_topic_video', $v )['ID'] )['length'] );
                                        $courseVideoCountTotal+=$videoTime;
                                        $courseVideoCount+=$v->count;
                                    }
                                }
                            }
                            
                            ?>

                            <!-- Single item -->
                            <div class="single-item col-lg-4 col-md-6">
                                <div class="item">
                                    <!-- Course Image -->
                                    <a href="<?php echo get_the_permalink(  ); ?>">
                                        <div class="thumb">
                                            <img src="<?php the_post_thumbnail_url( 'playCourseVideoLandscape' ); ?>" alt="<?php the_title(); ?>">
                                            <div class="price">
                                                <h5>Free</h5>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- Course Image -->
                                    <div class="info">
                                        <div class="top-info">
                                            <div class="top-meta">
                                                <ul>
                                                    <!-- Course Duration -->
                                                    <?php

                                                        if( floor( $courseVideoCountTotal / 60 ) < 1 )
                                                        {
                                                            ?>
                                                                <li><i class="fas fa-clock"></i> <?php echo $courseVideoCountTotal; ?> Min<?php echo ( floor( $courseVideoCountTotal / 60 ) != 1 ) ? 's': ''; ?></li>
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                                <li><i class="fas fa-clock"></i> <?php echo floor( $courseVideoCountTotal / 60 ); ?> Hour<?php echo ( floor( $courseVideoCountTotal / 60 ) != 1 ) ? 's': ''; ?></li>
                                                            <?php
                                                        }

                                                    ?>
                                                    <!-- Course Duration -->

                                                    <!-- Course Video Count -->
                                                    <li><i class="fas fa-list-ul"></i> <?php echo $courseVideoCount; ?></li>
                                                    <!-- Course Video Count -->
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- Course Title -->
                                        <h4>
                                            <a href="<?php echo get_the_permalink(  ); ?>"><?php echo mb_strimwidth( get_the_title(), 0, 22, '...' ); ?></a>
                                        </h4>
                                        <!-- Course Title -->
                                        <div class="meta">
                                            <div class="author">
                                                <!-- Course Instructor Image -->
                                                <img src="<?php echo get_the_post_thumbnail_url( $instructor->ID ); ?>" alt="<?php echo $instructor->instructor_first_name; ?>">
                                                <!-- Course Instructor Image -->

                                                <!-- Course Name & Course Category -->
                                                <span><strong><?php echo $instructor->instructor_first_name; ?></strong> in <a href="<?php echo get_term_link( $course_category, 'course_categories' ); ?>"><?php echo mb_strimwidth( $course_category->name, 0, 15, '...' ); ?></a></span>
                                                <!-- Course Name & Course Category -->
                                            </div>
                                        </div>
                                        <div class="bottom-info">
                                            <div class="course-info">
                                                <!-- <i class="fas fa-user"></i> 3.6K -->
                                            </div>
                                            <!-- Course Rating -->
                                            <div class="rating">
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
                                                            <span><?php echo number_format( array_sum( $ratingsList ) / count( $ratingsList ), 1 ); ?> (<?php echo $reviews->found_posts; ?>)</span>
                                                        </div>
                                                        <!-- <div class="price">
                                                            $38.00
                                                        </div> -->
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                            <span>No reviews yet</span>
                                                        <?php
                                                    }
                                                ?>
                                            </div>
                                            <!-- Course Rating -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single item -->

                        <?php }

                        wp_reset_postdata(  );

                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Courses Area -->

    <!-- Star Why Choose Us Area
    ============================================= -->
    <div class="choose-us-area default-padding">
        <!-- Fixed Shpae  -->
        <div class="fixed-shape shape left bottom">
            <img src="<?php echo get_theme_file_uri( '/assets/img/shape/1.png' ); ?>" alt="Shape">
        </div>
        <!-- End Fixed Shpae  -->
        <div class="container">
            <div class="item-box">
                <div class="row">
                    <div class="col-lg-5 left-info">
                        <h2>Why Learn Here?</h2>
                        <p>
                            In a world bombarded with new content, it can be a bit confusing to sift through countless coding videos just to learn one concept. 
                        </p>
                        <p>
                             Here, you can expedite the process of thumbing through countless hours of documentation and dealing with frustration. Follow along with our instructors as they give you information on only the things you need to know.
                        </p>
                    </div>
                    <div class="col-lg-6 offset-lg-1 right-info">
                        <ul>
                            <li>
                                <i class="fas fa-check"></i>
                                <h4>Lower Learning Cost</h4>
                                <p>
                                    Information should be accessible to everyone at a low cost. When everyone else raises their prices, we won't.
                                </p>
                            </li>
                            <li>
                                <i class="fas fa-check"></i>
                                <h4>Learn With Experts</h4>
                                <p>
                                    Every instructor is a respected contributor of the software development community. You will receive real industry insight and learn best practices from the pros.
                                </p>
                            </li>
                            <li>
                                <i class="fas fa-check"></i>
                                <h4>Wide Variation of Topics</h4>
                                <p>
                                    No one gets anywhere in the industry being one-dimensional. Learning all the tools and technologies of the trade.
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Why Choose Us -->

    <!-- Star Register Area
    ============================================= -->
    <div class="register-area bg-fixed default-padding-botom">
        <!-- Fixed BG -->
        <div class="fixed-bg" style="background-image: url(<?php echo get_field( 'homepage_banner_secondary' )['sizes']['pageBanner']; ?>);"></div>
        <!-- End Fixed BG -->
        <div class="container">
            <div class="reg-items">
                <div class="row">
                    <div class="col-lg-5 offset-lg-2 countdown">
                        <div class="countdown-inner">
                            <h2>We will be going live in November!</h2>
                            <p>
                                With our rapidly growing library, you will have access to over 50 years of combined industry experience. If you're not sure where to start, feel free to reach out to us and we will be happy to help get a plan set up for you to reach success in the quickest way possible. Sign up for our newsletter to stay up to date with all of our events and release dates.
                            </p>
                            <!-- Date Formate Input yyyy-mm-dd hh:mm:ss -->
                            <div class="counter-class" data-date="2021-11-03 00:00:01">
                            <!-- <div class="counter-class" data-date="2021-9-26 23:59:59"> -->
                                <div class="item-list">
                                    <div class="counter-item">
                                        <div class="item">
                                            <span class="counter-days"></span> Days
                                        </div>
                                    </div>
                                    <div class="counter-item">
                                        <div class="item">
                                            <span class="counter-hours"></span> Hours
                                        </div>
                                    </div>
                                    <div class="counter-item">
                                        <div class="item">
                                            <span class="counter-minutes"></span> Minutes
                                        </div>
                                    </div>
                                    <div class="counter-item">
                                        <div class="item">
                                            <span class="counter-seconds"></span> Seconds
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 text-center reg-form">
                        <div class="form-box">
                            <form action="#" id="front-page-contact-form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="form-control" placeholder="First Name" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Last Name" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Email*" type="email">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <select>
                                                <option disabled selected value="1">Choose Subject</option>
                                                <option value="2">Software Development</option>
                                                <option value="4">Staff Training</option>
                                                <option value="5">Data Analysis</option>
                                                <option value="6">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Phone" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit">
                                            Sign Up Now
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Register Area -->

    <!-- Star Blog Area
    ============================================= -->
    <?php $blog_ready = false; ?>
    
    <div class="blog-area bg-gray default-padding bottom-less">
        <?php

        if( $blog_ready )
        {
            ?>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <div class="site-heading text-center">
                                <h5>Blog</h5>
                                <h2>Latest From our Blog</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="blog-items">
                        <div class="row">
                            <?php

                                $posts = new WP_Query(
                                    array(
                                        'post_type' => 'post',
                                        'posts_per_page' => 4,
                                        'orderby' => 'date',
                                        'order' => 'DESC'
                                    )
                                );

                                while( $posts->have_posts() )
                                {
                                    $posts->the_post();
                                    ?>

                                        <!-- Single Item -->
                                        <div class="col-lg-4 col-md-6 single-item">
                                            <div class="item">
                                                <div class="thumb">
                                                    <a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url( $post, 'postThumbnail' ); ?>" alt="<?php echo get_the_title(); ?>"></a>
                                                    <div class="date">
                                                        <strong><?php echo get_the_date( 'M' ); ?> </strong> <?php echo get_the_date( 'd' ); ?>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h4><a href="blog-single-right-sidebar.html"><?php echo get_the_title(); ?></a></h4>
                                                    <p><?php echo wp_trim_words( get_the_content(), 15 ); ?></p>
                                                </div>
                                                <div class="bottom-info">
                                                    <span><i class="fas fa-user"></i> <?php echo get_the_author(); ?></span>
                                                    <a class="btn-more" href="<?php echo get_the_permalink(); ?>">Read More <i class="arrow_right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Item -->

                                    <?php
                                }

                                wp_reset_postdata();

                            ?>
                        </div>
                    </div>
                </div>
            <?php
        }

        ?>
    </div>
    <!-- End Blog Area -->

<?php get_footer( ); ?>