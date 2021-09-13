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
        <?php

            if( is_user_logged_in(  ) )
            {
                ?>
                    <a href="<?php echo wp_logout_url(); ?>">Logout</a>
                <?php
            }
            else
            { 
                ?>
                    <a href="<?php echo wp_registration_url(); ?>">Register</a>
                    <a href="<?php echo wp_login_url(); ?>"><i class="fa fa-sign-in-alt"></i>Login</a>
                <?php 
            }

        ?>
    </div>
</div>