<?php get_header(); ?>

<!-- Start Breadcrumb 
============================================= -->
<div class="breadcrumb-area bg-gray text-center shadow dark text-light bg-cover" style="background-image: url(<?php echo get_theme_file_uri( '/images/instructor_banner.png' ); ?>);">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h1>Instructor Details</h1>
                <!-- <ul class="breadcrumb">
                    <li><a href="<?php echo site_url( '' ); ?>"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="<?php echo site_url( 'instructors' ); ?>">Instructors</a></li>
                    <li class="active">Instructor Details</li>
                </ul> -->
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb -->

<!-- Start Advisor Details 
============================================= -->
<div class="advisor-details-area default-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 basic-info">
                <img src="<?php echo the_post_thumbnail_url( 'postThumbnail' ); ?>" alt="<?php echo get_field( 'instructor_first_name' ) . ' ' . get_field( 'instructor_last_name' ); ?>">
                <div class="contact">
                    <ul>
                        <?php

                            if( get_field( 'instructor_phone' ) )
                            {
                                ?>
                                    <li>
                                        <i class="fas fa-phone"></i>
                                        <span>+1<?php echo get_field( 'instructor_phone' ); ?></span>
                                    </li>
                                <?php
                            }

                            if( get_field( 'instructor_email' ) )
                            {
                                ?>
                                     <li>
                                        <i class="fas fa-envelope"></i>
                                        <span><?php echo get_field( 'instructor_email' ); ?></span>
                                    </li>
                                <?php
                            }

                            if( get_field( 'instructor_skype' ) )
                            {
                                ?>
                                    <li>
                                        <i class="fab fa-skype"></i>
                                        <span><?php echo get_field( 'instructor_skype' ); ?></span>
                                    </li>
                                <?php
                            }

                        ?>
                    </ul>
                </div>
                <div class="social">
                    <ul>
                        <?php

                            if( get_field( 'instructor_facebook' ) )
                            {
                                ?>
                                    <li class="facebook">
                                        <a href="<?php echo get_field( 'instructor_facebook' ); ?>">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                <?php
                            }
                            
                            if( get_field( 'instructor_twitter' ) )
                            {
                                ?>
                                    <li class="twitter">
                                        <a href="<?php echo get_field( 'instructor_twitter' ); ?>">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                <?php
                            }
                            if( get_field( 'instructor_dribbble' ) )
                            {
                                ?>
                                    <li class="dribbble">
                                        <a href="<?php echo get_field( 'instructor_dribbble' ); ?>">
                                            <i class="fab fa-dribbble"></i>
                                        </a>
                                    </li>
                                <?php
                            }
                            if( get_field( 'instructor_youtube' ) )
                            {
                                ?>
                                    <li class="youtube">
                                        <a href="<?php echo get_field( 'instructor_youtube' ); ?>">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                <?php
                            }
                            if( get_field( 'instructor_linkedin' ) )
                            {
                                ?>
                                    <li class="linkedin">
                                        <a href="<?php echo get_field( 'instructor_linkedin' ); ?>">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                    </li>
                                <?php
                            }


                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8 info">
                <h2><?php echo get_field( 'instructor_first_name' ) . ' ' . get_field( 'instructor_last_name' ); ?></h2>
                <span><?php echo get_field( 'instructor_title' ); ?></span>
                <ul>
                    <li><i class="fas fa-play"></i> <?php echo count( get_field( 'instructor_related_courses' ) ); ?> Course<?php echo 's' ? count( get_field( 'instructor_related_courses' ) ) > 1 : ''; ?></li>
                    <!-- <li><i class="fas fa-comment-alt"></i> 867 Rating</li> -->
                    <!-- <li><i class="fas fa-users"></i> 4k Students</li> -->
                </ul>
                <p><?php echo get_field( 'instructor_bio' ); ?></p>
                <div class="achivement">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="item-box">
                                <h4>Education</h4>
                                <?php

                                    if( get_field( 'instructor_education_school_name_1' ) )
                                    {
                                        ?>
                                            <div class="item">
                                                <h5><?php echo get_field( 'instructor_education_school_name_1' ); ?></h5>
                                                <span><?php echo get_field( 'instructor_education_date_1' ); ?></span>
                                            </div>
                                        <?php
                                    }
                                    if( get_field( 'instructor_education_school_name_2' ) )
                                    {
                                        ?>
                                            <div class="item">
                                                <h5><?php echo get_field( 'instructor_education_school_name_2' ); ?></h5>
                                                <span><?php echo get_field( 'instructor_education_date_2' ); ?></span>
                                            </div>
                                        <?php
                                    }
                                    if( get_field( 'instructor_education_school_name_3' ) )
                                    {
                                        ?>
                                            <div class="item">
                                                <h5><?php echo get_field( 'instructor_education_school_name_3' ); ?></h5>
                                                <span><?php echo get_field( 'instructor_education_date_3' ); ?></span>
                                            </div>
                                        <?php
                                    }
                                    if( get_field( 'instructor_education_school_name_4' ) )
                                    {
                                        ?>
                                            <div class="item">
                                                <h5><?php echo get_field( 'instructor_education_school_name_4' ); ?></h5>
                                                <span><?php echo get_field( 'instructor_education_date_4' ); ?></span>
                                            </div>
                                        <?php
                                    }
                                    if( get_field( 'instructor_education_school_name_5' ) )
                                    {
                                        ?>
                                            <div class="item">
                                                <h5><?php echo get_field( 'instructor_education_school_name_5' ); ?></h5>
                                                <span><?php echo get_field( 'instructor_education_date_5' ); ?></span>
                                            </div>
                                        <?php
                                    }

                                ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="item-box">
                                <h4>Experience</h4>
                                <?php

                                    if( get_field( 'instructor_experience_name_1' ) )
                                    {
                                        ?>
                                            <div class="item">
                                                <h5><?php echo get_field( 'instructor_experience_name_1' ); ?></h5>
                                                <span><?php echo get_field( 'instructor_experience_date_1' ); ?></span>
                                            </div>
                                        <?php
                                    }
                                    if( get_field( 'instructor_experience_name_2' ) )
                                    {
                                        ?>
                                            <div class="item">
                                                <h5><?php echo get_field( 'instructor_experience_name_2' ); ?></h5>
                                                <span><?php echo get_field( 'instructor_experience_date_2' ); ?></span>
                                            </div>
                                        <?php
                                    }
                                    if( get_field( 'instructor_experience_name_3' ) )
                                    {
                                        ?>
                                            <div class="item">
                                                <h5><?php echo get_field( 'instructor_experience_name_3' ); ?></h5>
                                                <span><?php echo get_field( 'instructor_experience_date_3' ); ?></span>
                                            </div>
                                        <?php
                                    }
                                    if( get_field( 'instructor_experience_name_4' ) )
                                    {
                                        ?>
                                            <div class="item">
                                                <h5><?php echo get_field( 'instructor_experience_name_4' ); ?></h5>
                                                <span><?php echo get_field( 'instructor_experience_date_4' ); ?></span>
                                            </div>
                                        <?php
                                    }
                                    if( get_field( 'instructor_experience_name_5' ) )
                                    {
                                        ?>
                                            <div class="item">
                                                <h5><?php echo get_field( 'instructor_experience_name_5' ); ?></h5>
                                                <span><?php echo get_field( 'instructor_experience_date_5' ); ?></span>
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
    </div>
</div>
<!-- End Advisor Details -->

<?php get_footer(); ?>