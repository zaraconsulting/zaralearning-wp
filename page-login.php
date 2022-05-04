<?php

global $user_ID;
global $wpdb;

if ( !is_user_logged_in() ) {
    ?>

        <?php

            // handle POST request
            if( $_POST ) {

                // grab credentials
                $username = $wpdb->prepare($_POST['username']);
                $password = $wpdb->prepare($_POST['password']);

                $login_array = array();
                $login_array['user_login'] = $username;
                $login_array['user_password'] = $password;

                // handle sign-in
                $verify_user = wp_signon( $login_array, true );
                if( !is_wp_error( $verify_user ) ) {
                    // handle success
                    echo "<script>window.location = '" . site_url() . "'</script>";
                }
                else {
                    // handle error
                    echo "<p>Invalid Credentials</p>";
                }

            }
            else {
                ?>

                    <?php get_header(); ?>

                    <!-- Start Login -->
                    <div class="login-area">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4 offset-lg-4">
                                    <div class="login-box">
                                        <div class="login">
                                            <div class="content">
                                                <a href="<? echo site_url(); ?>"><img src="<?php echo get_theme_file_uri( '/assets/img/logo.png' ); ?>" title="<?php echo bloginfo( 'name' ); ?>" alt="<?php echo bloginfo( 'name' ); ?>"></a>
                                                <form method="POST">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="form-group">
                                                                <i class="fas fa-envelope-open"></i> <input class="form-control" placeholder="Username*" type="text" name="username" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="form-group">
                                                                <i class="fas fa-lock"></i> <input class="form-control" placeholder="Password*" type="password" name="password" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="link align-right">
                                                                <a href="#">Forgot Password?</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="row">
                                                            <button type="submit">
                                                                Login
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class="sign-up">
                                                    <p>
                                                        Don't have an account? <a href="<? echo site_url( 'register' ); ?>">Sign up now</a>
                                                    </p>
                                                </div>
                                                <!-- <div class="social-login">
                                                    <h5>Or Login With</h5>
                                                    <ul>
                                                        <li class="facebook">
                                                            <a href="#">
                                                                <i class="fab fa-facebook-f"></i>
                                                            </a>
                                                        </li>
                                                        <li class="twitter">
                                                            <a href="#">
                                                                <i class="fab fa-twitter"></i>
                                                            </a>
                                                        </li>
                                                        <li class="g-plus">
                                                            <a href="#">
                                                                <i class="fab fa-google-plus-g"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Login -->

                    <?php get_footer(); ?>

                <?php
            }
        
        ?>

    <?
} else {
    ?>

        <?php header( 'Location:' . site_url() ); ?>

    <?php
}


?>