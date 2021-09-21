<ul class="nav navbar-nav navbar-center" data-in="fadeInDown" data-out="fadeOutUp">
    <li>
        <a href="<?php echo site_url( ); ?>">Home</a>
    </li>
    <li>
        <a href="<?php echo site_url( 'courses' ); ?>">Courses</a>
    </li>
    <!-- <li>
        <a href="<?php echo site_url( ); ?>">Instructors</a>
    </li> -->
    <li><a href="<?php echo site_url( 'contact' ); ?>">Contact</a></li>
    <?php
        if( is_user_logged_in() )
        {
            ?>
                <li class="small-screen-link"><a href="<?php echo wp_logout_url(); ?>">Logout</a></li>  
            <?php
        }
        else
        {
            ?>
                <li class="small-screen-link"><a href="<?php echo wp_login_url(); ?>">Login</a></li>  
                <li class="small-screen-link"><a href="<?php echo wp_registration_url(); ?>">Register</a></li>  
            <?php
        }
    ?>
</ul>