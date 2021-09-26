    <!-- Start Footer ============================================= -->
    <footer class="bg-dark text-light">
        <div class="container">
            <div class="f-items default-padding">
                <div class="row">
                    <div class="col-lg-4 col-md-6 item">
                        <div class="f-item about">
                            <img src="<?php echo get_theme_file_uri( '/assets/img/logo-dark.png' ); ?>" alt="Logo">
                            <!-- <h2 class="widget-title">Zara Learning</h2> -->
                            <p>
                                Every once in a while we'll be bothering you with a newsletter or two. We want to make you take full advantage of everything we have to offer.
                            </p>
                            <p class="text-italic">
                                Please leave us your email to receive our amazing updates, news and support*
                            </p>
                            <div class="subscribe">
                                <form action="#">
                                    <input type="email" placeholder="Enter your e-mail here" class="form-control" name="email">
                                    <button type="submit"><i class="fa fa-paper-plane"></i></button>  
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 item">
                        <div class="f-item link">
                            <h4 class="widget-title">Useful Links</h4>
                            <ul>
                                <li>
                                    <a href="<?php echo site_url( 'courses' ); ?>">Courses</a>
                                </li>
                                <!-- <li>
                                    <a href="#">Instructors</a>
                                </li> -->
                                <li>
                                    <a href="<?php echo site_url( 'contact' ); ?>">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 item">
                        <div class="f-item link">
                            <h4 class="widget-title">Support</h4>
                            <ul>
                                <!-- <li>
                                    <a href="#">Documentation</a>
                                </li> -->
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 item">
                        <div class="f-item contact">
                            <h4 class="widget-title">Contact Info</h4>
                            <div class="address">
                                <ul>
                                    <li>
                                        <strong>Email:</strong> support@zaralearning.tech
                                    </li>
                                    <li>
                                        <strong>Contact:</strong> +1 (469) 730-6696
                                    </li>
                                </ul>
                            </div>
                            <div class="opening-info">
                                <h5>Hours</h5>
                                <ul>
                                    <li> <span> Mon - Fri :  </span>
                                      <div class="float-right"> 9:00am - 4:00pm CST </div>
                                    </li>
                                    <li> <span> Sat - Sun : </span>
                                      <div class="float-right closed"> Closed </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <p>&copy; Copyright 2021. All Rights Reserved by <a href="https://zaraconsulting.org" target="_blank">Zara Consulting, LLC</a></p>
                    </div>
                    <div class="col-lg-6 text-right link">
                        <ul>
                            <li>
                                <a href="#">Terms</a>
                            </li>
                            <li>
                                <a href="#">Privacy</a>
                            </li>
                            <li>
                                <a href="#">Support</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->
    </footer>
    <!-- End Footer-->

    <!-- jQuery Frameworks
    ============================================= -->
    <?php wp_footer(); ?>
    <!-- <?php echo get_theme_file_uri( 'assets/js/progress-bar.min.js' ); ?> -->

</body>
</html>