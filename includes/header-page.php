<!-- Start Header Top 
============================================= -->
<div class="top-bar-area bg-dark text-light inline inc-border">
    <div class="container-full">
        <div class="row align-center">
            
            <div class="col-lg-7 col-md-12 left-info">
                <div class="item-flex">
                    <ul class="list">
                        <li>
                            <i class="fas fa-phone"></i> Have any question? +123 456 7890
                        </li>
                        <li>
                            <i class="fas fa-bullhorn"></i> <a href="#">Become an Instructor</a>
                        </li>
                        <li>
                            <i class="fas fa-briefcase"></i> <a href="#">For Enterprise</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-5 col-md-12 right-info">
                <?php get_template_part( '/includes/header', 'social-media' ); ?>
            </div>

        </div>
    </div>
</div>
<!-- End Header Top -->

<!-- Header 
============================================= -->
<header id="home">

    <!-- Start Navigation -->
    <nav class="navbar navbar-default attr-border navbar-sticky dark bootsnav">

        <div class="container-full">

            <!-- Start Atribute Navigation -->
            <div class="attr-nav">
                <form action="#">
                    <input type="text" placeholder="Search" class="form-control" name="text">
                    <button type="submit">
                        <i class="fa fa-search"></i>
                    </button>  
                </form>
            </div>        
            <!-- End Atribute Navigation -->

            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.html">
                    <img src="assets/img/logo.png" class="logo" alt="Logo">
                </a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <?php get_template_part( '/includes/header', 'navigation' ); ?>
            </div><!-- /.navbar-collapse -->
        </div>

    </nav>
    <!-- End Navigation -->

</header>
<!-- End Header -->