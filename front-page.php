<?php get_header(); ?>

    <!-- Start Banner 
    ============================================= -->
    <div class="banner-area content-only top-pad-170 shadow dark text-light bg-fixed text-center" style="background-image: url(<?php echo get_field( 'page_banner' ); ?>);">
        <div class="item">
            <div class="container">
                <div class="row align-center">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="content">
                            <h1>The Software Engineer's Toolkit</h1>
                            <form method="GET" action="<?php echo esc_url( site_url( '/courses' ) ); ?>">
                                <input type="text" placeholder="Search for a trainig video" class="form-control" name="s">
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
    <div class="categories-area carousel-shadow thumb-cats default-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h5>Browse Categories</h5>
                        <h2>Popular Topics to learn</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-full">
            <div class="category-items thumb-categories-carousel owl-carousel owl-theme">
                <?php

                    // $categories = new WP_Query( array(
                    //     'post_type' => 'category'
                    // ) );

                    $categories = get_terms( array(
                        'taxonomy' => 'course_categories',
                        'hide_empty' => true
                    ) );

                    foreach( $categories as $category )
                    { 
                        
                        $image = get_field( 'taxonomy_featured_image', $category );

                        ?>

                        <!-- Single Item -->
                        <div class="item">
                            <div class="title">
                                <!-- <i class="flaticon-innovation"></i> -->
                                <!-- <h4><a class="term-link" data-term="<?php echo $category->slug; ?>" href="javascript:void(0);"><?php echo $category->name; ?></a></h4> -->
                                <h4><a javascript:void(0) class="term-link" data-term="<?php echo $category->slug; ?>" href="<?php echo get_term_link( $category ); ?>"><?php echo $category->name; ?></a></h4>
                            </div>
                            <div class="thumb">
                                <!-- <span>58 Courses</span> -->
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $category->name; ?>">
                                <?php echo $category->taxonomy_featured_image; ?>
                            </div>
                        </div>
                        <!-- End Single Item -->                        

                    <?php }

                ?>
            </div>
        </div>
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
                        <h5>Popular Topics</h5>
                        <h2>
                            Career-Oriented Training Topics
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
                            $courseVideo = get_field( 'course_video' );
                            $instructor = get_field( 'related_instructors' )[0];
                            $course_category = get_the_terms( $post, 'course_categories' )[0];
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
                            // print_r( get_the_terms( $post, 'course_categories' ) );
                            
                            ?>

                            <!-- Single item -->
                            <div class="single-item col-lg-4 col-md-6">

                                <div class="item">
                                    <div class="thumb">
                                        <a href="<?php the_permalink(); ?>">
                                            <img style="width: 100%; height:233px;" src="<?php the_post_thumbnail_url( 'playCourseVideoLandscape' ); ?>" alt="<?php the_title(); ?>" />
                                        </a>
                                        <?php

                                            if( !is_user_logged_in() )
                                            {
                                                ?>

                                                    <div class="price">
                                                        <h5>Free</h5>
                                                    </div>

                                                <?php
                                            }
                                            else
                                            {
                                                ?>

                                                    <div class="price">
                                                        <h5>Watch</h5>
                                                    </div>

                                                <?php
                                            }

                                        ?>
                                    </div>
                                    <div class="info">
                                        <div class="top-info">
                                            <div class="top-meta">
                                                <ul>
                                                    <li><i class="fas fa-clock"></i> <?php echo gmdate( "i", wp_get_attachment_metadata( $courseVideo['ID'] )['length'] ); ?> Minutes</li>
                                                    <!-- <li><i class="fas fa-list-ul"></i> 2,400</li> -->
                                                </ul>
                                            </div>
                                        </div>
                                        <h5>
                                            <a href="<?php the_permalink(); ?>"><?php echo mb_strimwidth( get_the_title(), 0, 30, '...' ); ?></a>
                                        </h5>
                                        <div class="meta">
                                            <div class="author">
                                                <?php

                                                    // $cat = get_field( 'related_categories' )[0];

                                                ?>
                                                <img src="<?php echo get_the_post_thumbnail_url( $instructor->ID ); ?>" alt="<?php echo $instructor->first_name; ?>">
                                                <span><strong><?php echo $instructor->first_name; ?></strong> in <a href="<?php echo get_term_link( $course_category, 'course_categories' ); ?>"><?php echo mb_strimwidth( $course_category->name, 0, 15, '...' ); ?></a></span>
                                            </div>
                                        </div>
                                        <div class="bottom-info">
                                            <div class="course-info">
                                                <i class="fas fa-user"></i> <?php echo $reviews->found_posts; ?>
                                            </div>
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
                            One advanced diverted domestic sex repeated bringing you old. Possible procured her trifling laughter thoughts property she met way. Companions shy had solicitude favourable own. 
                        </p>
                        <p>
                             Which could saw guest man now heard but. Lasted my coming uneasy marked so should. Gravity letters it amongst herself dearest an windows by. Wooded ladies she basket season age her uneasy saw. Discourse unwilling.
                        </p>
                    </div>
                    <div class="col-lg-6 offset-lg-1 right-info">
                        <ul>
                            <li>
                                <i class="fas fa-check"></i>
                                <h4>Lower Learning Cost</h4>
                                <p>
                                    Discourse unwilling am no described dejection incommode no listening of. Before nature his parish boy.
                                </p>
                            </li>
                            <li>
                                <i class="fas fa-check"></i>
                                <h4>Learn With Experts</h4>
                                <p>
                                    Varoius unwilling am no described dejection incommode no listening highest. Before nature his parish more then expert.
                                </p>
                            </li>
                            <li>
                                <i class="fas fa-check"></i>
                                <h4>Different Course Variation</h4>
                                <p>
                                    Discourse unwilling am no described dejection incommode no listening of. Before nature his parish boy.
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
        <div class="fixed-bg" style="background-image: url(https://zclearning.s3.amazonaws.com/pages/home/banner-2.jpg);"></div>
        <!-- End Fixed BG -->
        <div class="container">
            <div class="reg-items">
                <div class="row">
                    <div class="col-lg-5 offset-lg-2 countdown">
                        <div class="countdown-inner">
                            <h2>Get access to dozens of online courses!</h2>
                            <p>
                                Own partiality motionless was old excellence she inquietude contrasted. Sister giving so wicket cousin of an he rather marked. Of on game part body rich. Gravity letters it amongst herself dearest an windows by. Wooded ladies she basket season age her uneasy saw. Expression acceptance imprudence particular total competition. 
                            </p>
                            <div class="counter-class" data-date="2021-3-24 23:59:59"><!-- Date Formate Input yyyy-mm-dd hh:mm:ss -->
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
                            <form action="#">
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
                                                <option value="2">Computer Engineering</option>
                                                <option value="4">Accounting Technologies</option>
                                                <option value="5">Web Development</option>
                                                <option value="6">Machine Language</option>
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