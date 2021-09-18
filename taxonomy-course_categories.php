<?php get_header(); ?>

    <!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area bg-gray text-center shadow dark text-light bg-cover" style="background-image: url(<?php echo get_theme_file_uri( '/assets/img/banners/course-detail.jpg' ); ?>);">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h1>Courses</h1>
                    <ul class="breadcrumb">
                        <?php $term = get_queried_object(); ?>
                        <li><a href="<?php echo site_url( ); ?>"><i class="fas fa-home"></i> Home</a></li>
                        <li><?php echo $term->name; ?></li>
                        <li class="active">Courses</li>
                    </ul>
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

                        while( have_posts() )
                        {
                            the_post(); 
                            // print_r($post->ID);
                            $course_category = get_the_terms( $post->ID, 'course_categories' )[0];
                            // print_r( $course_category );
                            ?>

                            <!-- Single item -->
                            <div class="single-item col-lg-4 col-md-6">
                                <div class="item">
                                    <div class="thumb">
                                        <img src="<?php the_post_thumbnail_url( 'playCourseVideoLandscape' ); ?>" alt="<?php the_title(); ?>">
                                        <div class="course-info">
                                            <ul>
                                                <li><i class="fas fa-clock"></i> 28 Hours</li>
                                                <li><i class="fas fa-list-ul"></i> 266</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="top-info">
                                        <div class="meta">
                                            <?php $relatedInstructor = get_field( 'related_instructors' )[0]; ?>
                                            <ul>
                                                <li>
                                                    <img src="<?php echo get_the_post_thumbnail_url( $relatedInstructor->ID ); ?>" alt="<?php echo $relatedInstructor->first_name . ' ' . $relatedInstructor->last_name; ?>">
                                                    <a href="#"><?php echo $relatedInstructor->first_name; ?></a> in <a href="<?php echo get_term_link( $course_category->slug, 'course_categories' ); ?>"><?php echo mb_strimwidth( get_field( 'related_categories' )[0]->post_title, 0, 20, '...' ); ?></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <div class="price-rating">
                                            <div class="rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                                <span>(78)</span>
                                            </div>
                                            <!-- <div class="price">
                                                $38.00
                                            </div> -->
                                        </div>
                                        <h5>
                                            <a href="<?php the_permalink(); ?>"><?php echo mb_strimwidth( get_the_title(), 0, 30, '...' ); ?></a>
                                        </h5>
                                        <div class="bottom">
                                            <ul>
                                                <li><i class="fas fa-user"></i> 8K</li>
                                            </ul>
                                            <a href="#"><i class="fas fa-shopping-cart"></i> Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single item -->

                        <?php }

                    ?>

                </div>
                <!-- Pagination -->
                <div class="row">
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
                </div>
            </div>
        </div>
    </div>
    <!-- End Courses Area -->

<?php get_footer(); ?>