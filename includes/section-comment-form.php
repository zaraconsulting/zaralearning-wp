<!-- Start Blog Comment -->
<div class="blog-comments">
    <div class="comments-area">
        <div class="comments-title">
            <!-- <h4>
                {{ c.reviews.list|length }} comments
            </h4> -->
            <!-- <div class="comments-list">
                <div class="commen-item">
                    <div class="avatar">
                        <img src="assets/img/800x800.png" alt="Author">
                    </div>
                    <div class="content">
                        <div class="title">
                            <h5>Jonathom Doe</h5>
                            <span>28 Aug, 2020</span>
                        </div>
                        <p>
                            Delivered ye sportsmen zealously arranging frankness estimable as. Nay any article
                            enabled musical shyness yet sixteen yet blushes. Entire its the did figure wonder off.
                        </p>
                        <div class="comments-info">
                            <a href=""><i class="fa fa-reply"></i>Reply</a>
                        </div>
                    </div>
                </div>
                <div class="commen-item reply">
                    <div class="avatar">
                        <img src="assets/img/800x800.png" alt="Author">
                    </div>
                    <div class="content">
                        <div class="title">
                            <h5>Spart Lee</h5>
                            <span>17 Feb, 2020</span>
                        </div>
                        <p>
                            Delivered ye sportsmen zealously arranging frankness estimable as. Nay any article
                            enabled musical shyness yet sixteen yet blushes. Entire its the did figure wonder off.
                        </p>
                        <div class="comments-info">
                            <a href=""><i class="fa fa-reply"></i>Reply</a>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <div style="margin-top: 40px;" class="review-area">
        <?php

            if( is_user_logged_in() )
            {
                ?>
                <div class="comments-form">
                    <div class="title">
                        <h4 id="course-comment-reply-header">Leave a review</h4>
                    </div>
                    <form id="course-comment-form" class="contact-comments" method="POST" action="">
                        <?php

                            $userInfo = array(
                                'name' => '',
                                'email' => '',
                                'disabled' => 'disabled'
                            );

                            if( is_user_logged_in() )
                            {

                                $userInfo['name'] = wp_get_current_user()->instructor_first_name;
                                $userInfo['email'] = wp_get_current_user()->email;
                                $userInfo['disabled'] = 'disabled';
                            }
                            else
                            {
                                $userInfo['name'] = '';
                                $userInfo['name'] = '';
                                $userInfo['disabled'] = '';
                            }

                        ?>
                        <input id="course_id" type="hidden" name="course_id" value='<?php echo the_ID(); ?>' />
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <!-- Name -->
                                    <input id="name" name="name" class="form-control" placeholder="Name *" type="text" value="<?php echo $userInfo['name']; ?>" <?php echo $userInfo['disabled']; ?> />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <!-- Email -->
                                    <input id="email" name="email" class="form-control" placeholder="Email (optional)" type="email" value="<?php echo $userInfo['email']; ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select id="rating" class="form-control" name="rating">
                                        <option selected disabled>Please rate this course</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group comments">
                                    <!-- Comment -->
                                    <textarea id="comment" class="form-control" placeholder="Comment *" name='text'></textarea>
                                </div>
                                <div class="form-group full-width submit">
                                    <button type="submit">
                                        Post Review
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <?php
            }
            else
            {
                ?>
                <p>Please log in to leave a review</p>
                <?php
            }

        ?>
    </div>
</div>
<!-- End Comments Form -->