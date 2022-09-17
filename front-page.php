<?php
/*
Template Name: Home Page 
*/
get_header(); 
?>

<!-- Hero Section Slider -->
<div class="top_slider">
    <div id="carouselExampleIndicators" class="carousel slide
	carousel-fade" data-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>

        </div>
        <div class="carousel-inner ">
            <div class="carousel-item active">
                <div class="hero_section banner1">
                    <!-- Hero Section Start -->
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="banner_text text-left">
                                    <h3>XPLR.Interact.Learn</h3>
                                    <p>First-ever member's only, virtual experience platform to share skills, hobbies,
                                        languages,
                                        seek private counsel and much more.</p>
                                    <div class="banner_button">
                                        <a class="xplrme_button " href="<?php echo site_url('/customer-signup') ?>">Get
                                            Started</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Hero Section End -->
            </div>

            <div class="carousel-item">
                <div class="hero_section banner3">
                    <!-- Hero Section Start -->
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="banner_text text-start">
                                    <h4>Explore Our Blogs</h4>
                                    <p>Read this month’s featured blog about</p>
                                    <h3>Menopause & Mental Health</h3>
                                    <a class="xplrme_button"
                                        href="<?php echo site_url('/blogs/menopause-and-mental-health') ?>">Visit
                                        Blog</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div><!-- Hero Section End -->
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- End of Hero Section Slider -->

<!-- Course section by age -->
<section class="age_section">
    <div class="container">
        <div class="row">
            <div class="section_header text-center">
                <h2>Explore Your Preferences</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-xl-6 col-md-6">
                <a target="_blank" href="<?php echo site_url('/kids') ?>">
                    <div class="single_age_section for_kids" style="height:350px;width:auto; background-image: url('<?php
echo get_template_directory_uri() ?>/images/kids.jpg');
				background-size:cover; background-repeat:no-repeat; background-position:center center">
                        <p>For</p>
                        <h2>Kids</h2>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-xl-6 col-md-6">
                <a target="_blank" href="<?php echo site_url('/adults') ?>">
                    <div class="single_age_section for_adults" style="height:350px;width:auto; background-image: url('<?php
echo get_template_directory_uri() ?>/images/adults.jpg');
						background-size:cover; background-repeat:no-repeat; background-position:center center">
                        <p>For</p>
                        <h2>Adults</h2>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- End of course section by age -->


<section class="course_section">
    <!-- Courses Start -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title text-start">
                    <h2>Browse</h2>
                </div>
                <!-- Filter Tab Start -->
                <div class="tab_filter">
                    <ul class="nav">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#liveclass">
                                Live Classes</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button data-bs-toggle="tab" data-bs-target="#livecourses">Live Courses</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button data-bs-toggle="tab" data-bs-target="#workshops">Workshops</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button data-bs-toggle="tab" data-bs-target="#freeclass">Free Classes</button>
                        </li>

                    </ul>
                </div>
                <!-- Filter Tab End -->
            </div>
            <div class="tab-content">
                <!-- Tab Content Start -->
                <div class="tab-pane show active" id="liveclass" role="tabpanel" aria-labelledby="liveclass-tab">

                    <div class="row">
                        <?php
                        $args = [
                            "posts_per_page" => 4,
                            "post_status" => "publish",
                            "orderby" => "rand",
                            "meta_query" => [
                                [
                                    "key" => "course_type",
                                    "value" => "live",
                                    "compare" => "=",
                                ],
                                [
                                    "key" => "total_live_sessions",
                                    "value" => 1,
                                    "compare" => ">=",
                                ],
                            ],
                        ];
                        $wp_query = new WP_Query($args);
                        if ($wp_query->have_posts()):
                            while ($wp_query->have_posts()):

                                $wp_query->the_post();
                               
                                $current_course_id = get_the_ID();

                                
                                 ?>

                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <a href="<?php the_permalink(); ?>">
                                <div class="single_course">
                                    <div class="course_img">
                                        <?php 
                                        the_post_thumbnail();
                                            ?>
                                        <?php
                                        $certificate = get_post_meta(get_the_ID(),'certificate_available', true);
                                        if( $certificate == 'yes'){
                                            ?>
                                        <p class="certifi_bage">Certified</p>
                                        <?php }?>

                                    </div>
                                    <p class="course_type">Live Class</p>
                                    <div class="course_about">
                                        <div class="course_text">
                                            <h3><?php echo mb_strimwidth(get_the_title(), 0, 45, '...'); ?></h3>
                                            <ul class="course_cat">
                                                <?php
	                                                    $live_session_type = get_post_meta(
	                                                        get_the_ID(),
	                                                        "live_session_type",
	                                                        true
	                                                    );
	                                                    if (
	                                                        $live_session_type ==
	                                                        "group" &&
	                                                        $live_session_type != null
	                                                    ): ?>
                                                <li class="group">Group</li>
                                                <?php else: ?>
                                                <li class="group">1 to 1</li>
                                                <?php endif;
	                                                    ?>
                                                <?php
	                                                    $course_id = get_the_ID();

	                                                    $my_stock = 0;
	                                                    $args = [
	                                                        "post_type" => "product",
	                                                        "meta_key" =>
	                                                            "zoom_meeting_date",
	                                                        "post_status" => array("publish"),
	                                                        "orderby" => "meta_value",
	                                                        "order" => "ASC",
	                                                        "meta_query" => [
	                                                            [
	                                                                "value" => date(
	                                                                    "yyyy-mm-dd hh:mm"
	                                                                ),
	                                                                "compare" => "<=",
	                                                            ],
	                                                        ],
	                                                        "_stock_status" =>
	                                                            "instock",
	                                                        "meta_query" => [
	                                                            [
	                                                                "key" =>
	                                                                    "linked_post_id",
	                                                                "value" => $course_id,
	                                                                "compare" => "=",
	                                                            ],
	                                                        ],
	                                                    ];
	                                                    $loop = new WP_Query($args);
	                                                 
	                                                    if ($loop->have_posts()) {
	                                                        while ($loop->have_posts()):
	                                                            $loop->the_post();
	                                                            $stock = get_post_meta(
	                                                                $post->ID,
	                                                                "_stock",
	                                                                true
	                                                            );
	                                                            $my_stock =
	                                                                $my_stock +
	                                                                (int) $stock;
                                                                    break;
	                                                        endwhile;
	                                                    }
	                                                    wp_reset_postdata();
	                                                    ?>
                                                <?php if ($my_stock >= 1): ?>
                                                <li class="available">Available</li>
                                                <?php else: ?>
                                                <li class="sold_out">Sold Out</li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                        <div class="course_bottom">
                                            <?php 
                                            
                                            $post_id_price = get_post_meta($current_course_id, 'linked_product_id', true);
                                            ?>

                                            <p class="price">
                                                <?php echo do_shortcode("[woocs_price id=$post_id_price]"); ?>/session
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <?php 
                            endwhile;
                        endif;
                        ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="explore_button text-center">
                                <a href="<?php echo home_url('/live-classes') ?>">Explore More <i
                                        class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Single Tab End -->

            </div>
        </div>
    </div>
</section>

<!-- Why choose us -->
<section class="below_course_section">
    <div class="tab_desc">
        <div class="choose_tab full">
            <ul class="navs">
                <li>
                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-home">
                        <span class="ex_img"><img
                                src="<?php echo get_template_directory_uri(); ?>/images/ex1.svg"></span>
                        <h3>Expert Instructors</h3>
                        <p>Learn with our expert instructors who are best in their fields, trying to make your learning
                            process fun and informative</p>
                    </button>
                </li>
                <li>
                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-profile">
                        <span class="ex_img"><img
                                src="<?php echo get_template_directory_uri(); ?>/images/ex2.svg"></span>
                        <h3>Engaging Contents</h3>
                        <p>Our highly engaging and interactive contents add a new perspective to our customers which are
                            helpful, inspiring & entertaining too</p>
                    </button>
                </li>
                <li>
                    <button class="nav-link dots4" data-bs-toggle="pill" data-bs-target="#pills-contact">
                        <span class="ex_img"><img
                                src="<?php echo get_template_directory_uri(); ?>/images/ex3.svg"></span>
                        <h3>Certification</h3>
                        <p>Earn certificates upon completion and share it with others to stand out among the crowd</p>
                    </button>
                </li>
            </ul>
        </div>
        <div class="tab-content dots1">
            <div class="tab-pane fade show active" id="pills-home">
                <h3>Why You Should Choose</h3>
                <h2>XPLRME</h2>
                <p>In our platform, learners from around the world get to share hobbies, skills and much more. We
                    provide variety of live & interactive sessions hosted by experts. There's a session for everyone on
                    our platform.
                </p>
            </div>
        </div>

        <div class="choose_tab tab_mobile">
            <ul class="navs">
                <li>
                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-home">
                        <span class="ex_img"><img
                                src="<?php echo get_template_directory_uri(); ?>/images/ex1.svg"></span>
                        <h3>Expert Instructors</h3>
                        <p>Learn with our expert instructors who are best in their fields, trying to make your learning
                            process fun and informative</p>
                    </button>
                </li>
                <li>
                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-profile">
                        <span class="ex_img"><img
                                src="<?php echo get_template_directory_uri(); ?>/images/ex2.svg"></span>
                        <h3>Engaging Contents</h3>
                        <p>Our highly engaging and interactive contents add a new perspective to our customers which are
                            helpful, inspiring & entertaining too</p>
                    </button>
                </li>
                <li>
                    <button class="nav-link dots4" data-bs-toggle="pill" data-bs-target="#pills-contact">
                        <span class="ex_img"><img
                                src="<?php echo get_template_directory_uri(); ?>/images/ex3.svg"></span>
                        <h3>Certification</h3>
                        <p>Earn certificates upon completion and share it with others to stand out among the crowd</p>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</section>
<!-- End of why choose us -->

<!--Review Title Start-->
<div class="review_title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_header text-center">
                    <h2>What Our Customers Think</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Review Title End-->

<!-- Review Section Start-->
<section class="review_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="carousel_area review">
                    <!-- Single Review Start-->
                    <div class="singe-item">
                        <div class="single_review text-center">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/review-star.png" alt="">
                        </div>
                        <div class="carousel-text">
                            <p>I made a Christmas Card during the session to gift it to my friend, she loved it… Thank
                                you XPLRME!</p>
                            <div class="author text-center">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/review.png" alt="">
                                <h4>Christine</h4>
                            </div>
                        </div>
                    </div>
                    <!-- Single Review End-->
                    <!-- Single Review Start-->
                    <div class="singe-item">
                        <div class="single_review text-center">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/review-star.png" alt="">
                        </div>
                        <div class="carousel-text">
                            <p> The breathing session was so intense, that I almost forgot the time! :)</p>
                            <div class="author text-center">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/review3.jpeg" alt="">
                                <h4>Phyllis</h4>
                            </div>
                        </div>
                    </div>
                    <!-- Single Review End-->
                    <!-- Single Review Start-->
                    <div class="singe-item ">
                        <div class="single_review text-center">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/review-star.png" alt="">
                        </div>
                        <div class="carousel-text">
                            <p>Liked the art class. The teacher was very patient with my child and at the end of the
                                session, she created a beautiful starry night in Van Gogh style.</p>
                            <div class="author text-center">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/review2.jpeg" alt="">
                                <h4>Anuradha</h4>
                            </div>
                        </div>
                    </div>
                    <!-- Single Review End-->
                </div>
                <div class="all_review_button text-center">
                    <a href="<?php echo site_url('/all-reviews') ?>">See all reviews</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Review Section End-->

<!-- Join Us Start-->
<section class="join_us_section ">
    <div class="container">
        <div class="row">
            <div class="offset-lg-4 col-lg-8 offset-xl-6 col-xl-6 col-md-10 offset-md-2">
                <div class="img_text dots5">
                    <p>Join us as a</p>
                    <h3>Provider</h3>
                    <p>to start a new</p>
                    <h3>Journey</h3>
                    <div class="sign_up">
                        <a class="learn_button" href="<?php echo site_url("/provider-signup"); ?>">Sign Up</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- Join Us End-->

<!-- Customer Signup -->
<section class="join_us_area home_join">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="join_us text-center">
                    <h2>Join XPLRME Today!</h2>
                    <p>Sign up now to get access to our huge library of courses with contents of your desired courses.
                    </p>
                    <div class="sign_up">
                        <a href="<?php echo site_url("/customer-signup"); ?>">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of customer signup section -->

<?php 
get_footer();
?>