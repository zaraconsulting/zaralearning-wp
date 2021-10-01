<?php get_header( ); 

    $relatedInstructor = get_field( 'related_instructors' )[0];
    $courseVideo = get_field( 'course_video' );
    $course_category = get_the_terms( $post, 'course_categories' )[0];

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
                                <img src="<?php echo get_the_post_thumbnail_url( $relatedInstructor->ID ); ?>" alt="<?php echo $relatedInstructor->instructor_first_name . ' ' . $relatedInstructor->instructor_last_name; ?>">
                            </div>
                            <div class="info">
                                <span>Instructor</span>
                                <h5><?php echo $relatedInstructor->instructor_first_name . ' ' . $relatedInstructor->instructor_last_name[0]; ?></h5>
                            </div>
                        </li>
                        <li>
                            <div class="info">
                                <span>Category</span>
                                <h5>
                                    <!-- <?php $category = get_field( 'related_categories' )[0]; ?> -->
                                    <a href="<?php echo get_term_link( $course_category, 'course_categories' ); ?>">
                                        <?php echo $course_category->name; ?>
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
                            <li class="nav-item">
                                    <a href="" data-target="#tab2" data-toggle="tab" class="nav-link">Curriculum</a>
                                </li>
                            <li class="nav-item">
                                <a href="" data-target="#tab4" data-toggle="tab" class="nav-link">Reviews</a>
                            </li>
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
                            <div id="tab2" class="tab-pane curriculum fade">
                                <p><?php echo get_field( 'course_curriculum_description', $post ); ?></p>
                                <div class="accordion" id="accordionExample">

                                    <?php

                                        $curricula = new WP_Query( array(
                                            'post_type' => 'curriculum',
                                            'orderby' => 'date',
                                            'order' => 'ASC'
                                        ) );
                                        // print_r( $curricula->posts );

                                        foreach( $curricula->posts as $c )
                                        {
                                            ?>
                                                <div class="card">
                                                    <div class="card-header" id="headingOne">
                                                        <h5 class="mb-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                <?php echo $c->post_title; ?>
                                                        </h5>
                                                    </div>

                                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                        <div class="card-body">
                                                            <ul>
                                                                <?php

                                                                    // $videos = get_terms( array(
                                                                    //     'taxonomy' => 'curriculum_video',
                                                                    // ) );
                                                                    $startingIdx = 1;
                                                                    $videos = get_the_terms( $c, 'curriculum_video' );
                                                                    // print_r( $videos );
                                                                    // print_r( get_the_terms() );
                                                                    
                                                                    foreach( $videos as $v )
                                                                    {
                                                                        // print_r( $v );
                                                                        $video = get_field( 'curriculum_topic_video', $v );

                                                                        ?>
                                                                            <li>
                                                                                <div class="left-content">
                                                                                    <span><?php echo $startingIdx; ?></span>
                                                                                    <i class="fas fa-play-circle"></i>
                                                                                    <h5><a class="popup-youtube" href="<?php echo $video['url']; ?>"><?php echo $v->name; ?></a></h5>
                                                                                </div>
                                                                                <div class="right-content">
                                                                                    <!-- <a href="#">Preview</a> -->
                                                                                    <span><i class="fas fa-clock"></i> <?php echo gmdate( "i", wp_get_attachment_metadata( get_field( 'curriculum_topic_video', $v )['ID'] )['length'] ); ?> minutes</span>
                                                                                </div>
                                                                            </li>
                                                                        <?
                                                                        $startingIdx+=1;
                                                                    }

                                                                ?>
                                                                <!-- <li>
                                                                    <div class="left-content">
                                                                        <span>01</span>
                                                                        <i class="fas fa-play-circle"></i>
                                                                        <h5><a href="#">Introduction Of Java</a></h5>
                                                                    </div>
                                                                    <div class="right-content">
                                                                        <a href="#">Preview</a>
                                                                        <span><i class="fas fa-clock"></i> 19 minutes</span>
                                                                    </div>
                                                                </li> -->
                                                                <!-- <li>
                                                                    <div class="left-content">
                                                                        <span>02</span>
                                                                        <i class="fas fa-file"></i>
                                                                        <h5><a href="#">Basic Development</a></h5>
                                                                    </div>
                                                                    <div class="right-content">
                                                                        <i class="fas fa-lock"></i>
                                                                        <span><i class="fas fa-clock"></i> 11 minutes</span>
                                                                    </div>
                                                                </li> -->
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            // print_r( $c->post_title );
                                        }

                                    ?>
                                </div>
                            </div>
                            <div id="tab4" class="tab-pane reviews fade">
                                <div class="row">
                                    <?php
                                
                                        if( $reviews->found_posts > 0 )
                                        {
                                            get_template_part( '/includes/content', 'reviews' );
                                        }
                                        else 
                                        {
                                            ?>
                                                <div class="col-lg-12">

                                                </div>
                                            <?php
                                        }
                                    ?>
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
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-4 sidebar">

                <?php

                    $videos = get_terms( array(
                        'taxonomy' => 'curriculum_video',
                    ) );
                    $courseVideoCountTotal = 0;

                    
                    foreach( $videos as $v )
                    {
                        // print_r( get_field( 'curriculum_topic_video', $v ) );
                        $videoTime = gmdate( "i", wp_get_attachment_metadata( get_field( 'curriculum_topic_video', $v )['ID'] )['length'] );
                        $courseVideoCountTotal+=$videoTime;
                        
                        $courseVideoCount+=$v->count;
                    }

                ?>

                <!-- Single Item -->
                <div class="item course-preview">
                    <div class="thumb">
                        <img src="<?php the_post_thumbnail_url( 'playCourseVideoLandscape' ); ?>" alt="<?php the_title(); ?>">
                        <?php

                        if( is_user_logged_in() )
                        {
                            ?>
                                <a href="#" class="popup-youtube light video-play-button item-center">
                                <!-- <a href="<?php echo $courseVideo['url']; ?>" class="popup-youtube light video-play-button item-center"> -->
                                    <i class="fa fa-play"></i>
                                </a>
                            <?php
                        }

                        ?>
                    </div>
                    <div class="content">
                        <div class="course-includes">
                            <ul>
                                <!-- <li>
                                    <i class="fas fa-users"></i> Students <span class="float-right">12K</span>
                                </li> -->
                                <li>
                                    <i class="fas fa-copy"></i> Lectures <span class="float-right"><?php echo $courseVideoCount; ?></span>
                                </li>
                                <li class="course-info">
                                    <i class="fas fa-clock"></i> Duration <span class="float-right"><?php echo floor( $courseVideoCountTotal / 60 ); ?>h</span>
                                </li>
                                <li class="course-info">
                                    <i class="fas fa-sliders-h"></i> Skill level <span class="float-right"><?php echo get_field( 'skill_level' ); ?></span>
                                </li>
                                <li>
                                    <i class="fas fa-language"></i> Language <span class="float-right">English</span>
                                </li>
                            </ul>
                        </div>
                        <?php

                            if( !is_user_logged_in() )
                            {
                                ?>
                                    <a class="btn btn-theme effect btn-sm watch-button" href="<?php echo wp_login_url(); ?>">Log In</a>
                                <?php
                            }
                            else
                            {
                                ?>
                                    <!-- <a class="btn btn-theme effect btn-sm watch-button" href="<?php echo $courseVideo['url']; ?>">Watch</a> -->
                                    <!-- <a class="btn btn-theme effect btn-sm watch-button" href="#">Watch</a> -->
                                <?php
                            }

                        ?>
                    </div>
                </div>
                <!-- Single Item -->

                <!-- Single Item -->
                <div class="item related-course">
                    <div class="content">
                        <h4>Related Courses</h4>
                        <div class="related-courses-items">
                            <?php 
                                $relatedCourses = get_field( 'instructor_related_courses' );
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
                                                        <i class="fas fa-user"></i> By <?php echo $instructor->instructor_first_name; ?> 
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
