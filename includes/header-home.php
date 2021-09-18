<!-- Start Header Top 
============================================= -->
<div class="top-bar-area text-light transparent">
    <div class="container">
        <div class="row align-center">
            <div class="col-lg-4 left-info">
                <ul class="list">
                    <li>
                        Have any questions? +1 (469) 730-6696
                    </li>
                </ul>
            </div>
            <div class="col-lg-4 logo text-center">
                <a href="<?php echo site_url( ); ?>"><img src="<?php echo get_theme_file_uri( '/assets/img/logo-light.png' ); ?>" alt="Logo"></a>
            </div>
            <div class="col-lg-4 right-info">
                 <?php get_template_part( '/includes/header', 'social-media' ); ?>
            </div>
        </div>
    </div>
</div>
<!-- End Header Top -->

<!-- Header 
============================================= -->
<header>
    <div class="container">
        <div class="row">
            <!-- Start Navigation -->
            <nav id="mainNav" class="navbar logo-less navbar-default navbar-fixed white bootsnav on no-full nav-box no-background">

                <div class="container">            

                    <!-- Start Header Navigation -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                            <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand" href="index.html"><img src="<?php echo get_theme_file_uri( '/assets/img/logo.png' ); ?>" class="logo" alt="Logo"></a>
                    </div>
                    <!-- End Header Navigation -->

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbar-menu">
                        <?php get_template_part( '/includes/header', 'navigation' ); ?>
                    </div><!-- /.navbar-collapse -->
                </div>   
                
            </nav>
            <!-- End Navigation -->
            
        </div>
    </div>
</header>
<!-- End Header -->