<div class="col-lg-4">
    <div class="avg-ratings">
        <?php
            $ratingsList = array();

            $reviews = new WP_Query( 
                array( 
                    'post_type' => 'review',
                    'meta_query' => array(
                        array(
                            'key' => 'review_user_id',
                            'compare' => 'like',
                            'value' => get_the_ID(),
                        )
                    )
                )
            );

            while( $reviews->have_posts() )
            {
                $reviews->the_post();
                array_push( $ratingsList, get_field( 'review_rating' ) );
            }
            wp_reset_postdata();
        ?>
        <h2><?php echo number_format( array_sum( $ratingsList ) / count( $ratingsList ), 1 ); ?></h2>
        <div class="rating">
            <?php 
            
                $avgRatingStars = floor( array_sum( $ratingsList ) / count( $ratingsList ) );
                foreach( range( 1, $avgRatingStars ) as $a )
                { 
                    ?>
                        <i class="fas fa-star"></i>
                    <?php
                }
                
            ?>
            <!-- <i class="fas fa-star-half-alt"></i> -->
        </div>
        <?php echo $reviews->found_posts; ?> Rating<?php echo ( $reviews->found_posts != 1 ) ? 's' : ''; ?>
    </div>
</div>
<div class="col-lg-8 rating-counter">
    <ul>
        <?php

            $cleanedRatingsList = array();
            foreach( range(1, 5) as $s )
            {
                $ratingCount;
                $cleanedRatingsList[$s] = ( array_count_values( $ratingsList )[$s] ) ? array_count_values( $ratingsList )[$s] : 0;
            }

            foreach( array_reverse( $cleanedRatingsList, true ) as $key => $val )
            {
                array_sum( $ratingsList ) / count( $ratingsList );
                ?>
                    <li>
                        <span><?php echo $key; ?> Star<?php echo ( $key != 1 ) ? 's' : ''; ?></span>
                        <span><?php echo $val; ?></span>
                        <div class="rating-bar">
                            <div style="border-radius: 30px; height: 7px;" class="progress">
                                <div style="background: #ffb606; border-radius: 30px; width: <?php echo ( $val / count( $ratingsList ) )*100; ?>%" class="progress-bar" role="progressbar" aria-valuenow="<?php echo ( $val / count( $ratingsList ) ); ?>" aria-valuemin="0" aria-valuemax="<? echo count( $ratingsList ); ?>"></div>
                            </div>
                        </div>
                    </li>            
                <?php

            }

        ?>
    </ul>
</div>