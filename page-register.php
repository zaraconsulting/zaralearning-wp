<?php

global $wpdb;

if ( !is_user_logged_in() ) {
    ?>

        <?php 
        
            if( $_POST )
            {

                $email = $wpdb->prepare( $_POST['full_email'] );
                $username = $email;
                $name = explode( ' ', $_POST['full_name'] );
                $firstName = $name[0];
                $lastName = $name[1];

                // header( 'Location:' . site_url( 'contact' ) );
                
                // check if passwords match
                if ( 0 !== strcmp( $_POST['password'], $_POST['confirm_password'] ) ) 
                {
                    $password = $wpdb->prepare($_POST['password']);
                }
                else 
                {
                    header( 'Location:' . site_url( 'register' ) );
                }

                // $new_user_id = wp_create_user( $username, $password, $email );
                
                # create new user
                $userdata = array(
                    'display_name' => $name,
                    'first_name' => $firstName,
                    'last_name' => $lastName,
                    'user_pass' => $password,
                    'user_email' => $email,
                    'user_login' => $username,
                );
                $new_user = wp_insert_user( $userdata );
                
                // if there's an error creating the user
                if ( !is_wp_error( $new_user ) ) {
                    header( 'Location:' . site_url( 'register' ) );
                }
                else 
                {
                    
                    // log the user in
                    $login_array = array(
                        'user_login' => $userdata['user_login'],
                        'user_password' => $userdata['user_password'],
                    );
                    $verify_user = wp_signon( $login_array, true );
                    header( 'Location:' . site_url() );
                
                }

            }
            else
            {
                ?>

                    <?php get_header(); ?>

                    <!-- Start Register 
                    ============================================= -->
                    <div class="login-area">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4 offset-lg-4">
                                    <div class="login-box">
                                        <div class="login">
                                            <div class="content">
                                                <a href="<? echo site_url( '' ); ?>"><img src="<?php echo get_theme_file_uri( '/assets/img/logo.png' ); ?>" title="<?php echo bloginfo( 'name' ); ?>" alt="<?php echo bloginfo( 'name' ); ?>"></a>
                                                <form method="POST">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="form-group">
                                                                <i class="fas fa-user"></i> <input class="form-control" name="full_name" placeholder="Name*" type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="form-group">
                                                                <i class="fas fa-envelope-open"></i> <input class="form-control" name="full_email" placeholder="Email*" type="email">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="form-group">
                                                                <i class="fas fa-lock"></i> <input class="form-control" name="password" placeholder="Password*" type="password">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="form-group">
                                                                <i class="fas fa-lock"></i> <input class="form-control" name="confirm_password" placeholder="Confirm Password*" type="password">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="row">
                                                            <button type="submit">
                                                                Sign Up
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class="sign-up">
                                                    <p>
                                                        Already have an account? <a href="<? echo site_url( 'login' ); ?>">Login Now</a>
                                                    </p>
                                                </div>
                                                <!-- <div class="social-login">
                                                    <h5>Or Register With</h5>
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
                    <!-- End Register -->

                    <?php get_footer(); ?>

                <?php
            }
        
        ?>

    <?php
}
else {
    ?>
        
        <?php header( 'Location:' . site_url() ); ?>
        
    <?php
}

?>