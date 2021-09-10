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
                <div class="item-flex">
                    <div class="social">
                        <ul>
                            <li>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="button">
                        <a href="#">Register</a>
                        <a href="#"><i class="fa fa-sign-in-alt"></i>Login</a>
                    </div>
                </div>
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
                <ul class="nav navbar-nav navbar-center" data-in="fadeInDown" data-out="fadeOutUp">
                    <li>
                        <a href="<?php echo site_url( ); ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url( 'courses' ); ?>">Courses</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url( ); ?>">Instructors</a>
                    </li>
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>

    </nav>
    <!-- End Navigation -->

</header>
<!-- End Header -->