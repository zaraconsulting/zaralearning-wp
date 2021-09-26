<?php get_header(); ?>

    <!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area bg-gray text-center shadow dark text-light bg-cover" style="background-image: url(<?php echo get_field( 'page_banner' ); ?>);">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h1>Courses</h1>
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
                        <li class="active"><?php the_title(); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Star Courses Area
    ============================================= -->
    <div class="courses-area default-padding privacy-policy-container">
        <div class="container">
            <div class="courses-items">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
    <!-- End Courses Area -->

<?php get_footer(); ?>