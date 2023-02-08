<?php
/*
  Template Name: About Page Template
 */
?>
<?php get_header();
global $post;
the_post();
$id = get_the_id();
$content = get_the_content();
$lang = pll_current_language('slug') == 'en' ? 'en' : 'vn';
?>
<?php include TEMPLATEPATH . '/includes/header/header.php'; ?>
<div class="page-main">
    <div class="about-page block">
        <div class="content">
            <div class="contain wow animate__fadeInUp" data-wow-duration=".5s">
                <h3 class="title"><?php echo pll__('WHAT WE DO'); ?></h3>
                <?php echo $content; ?>
            </div>
        </div>
        <div class="about-image wow animate__fadeInRight" data-wow-duration=".5s">
            <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $id ) ); ?>" alt="<?php echo get_the_title(); ?>">
        </div>
        <div class="about-image-multi wow animate__fadeInLeft" data-wow-duration=".5s" data-wow-delay=".5s">
            <div class="img-pos01">
                <img src="<?php echo get_field('about_left_image_small', $id ); ?>" alt="<?php echo get_the_title(); ?>">
            </div>
            <div class="img-pos02">
                <img src="<?php echo get_field('about_left_image', $id ); ?>" alt="<?php echo get_the_title(); ?>">
            </div>
        </div>
        <div class="content ltr">
            <div class="contain wow animate__fadeInUp" data-wow-duration=".5s" data-wow-delay=".3s">
                <h3 class="title"><?php echo pll__('OUR TEAM'); ?></h3>
                <p><?php echo get_field('our_team_introduce_text', $id ); ?></p>
            </div>
        </div>
    </div>
    <div class="about-waypoint block">
        <div class="about-image wow animate__fadeInLeft" data-wow-duration=".5s">
            <img src="<?php echo get_field('our_team_left_image', $id ); ?>" alt="">
        </div>
        <div class="waypoint-block">
            <?php echo get_field('our_team_detail', $id ); ?>
        </div>
        <div class="about-image pos wow animate__fadeInRight" data-wow-duration=".5s">
            <img src="<?php echo get_field('our_team_right_image', $id ); ?>" alt="">
        </div>
    </div>
    <div class="team-profile block">
        <div class="content">
            <div class="contain wow animate__fadeInUp" data-wow-duration=".5s">
                <h3 class="title"><?php echo pll__('OUR STAFFS'); ?></h3>
                <?php echo get_field('our_staff_introduce', $id ); ?>
            </div>
        </div>
        <div class="folio-slide">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php
                    $args = array(
                        'post_type' => 'staff',
                        'post_status' => 'publish',
                        'lang' => pll_current_language('slug'),
                        'posts_per_page' => 6,
                        'orderby' => 'date',
                        'order' => 'DESC',
                    );

                    $loop = new WP_Query( $args );
                    $count= 0;
                    while ( $loop->have_posts()) {
                        $count++;
                        $loop->the_post();
                        $id = get_the_ID();
                        $title = get_the_title();
                        $imgSrc = wp_get_attachment_url( get_post_thumbnail_id( $id )) ;
                        $position = get_field('staff_position', $id);
                        $level = get_field('staff_level', $id);
                        $email = get_field('staff_email', $id);
                        $phone = get_field('staff_phone', $id);
                    ?>
                        <div class="swiper-slide wow animate__fadeInUp" data-wow-duration=".5s" data-wow-delay="0s">
                            <img src="<?php echo $imgSrc ?>" alt="<?php echo $title ?>">
                            <div class="caption">
                                <div class="ceo"><?php echo $position ?></div>
                                <div class="name"><?php echo $title ?></div>
                                <div class="level"><?php echo $level ?></div>
                                <div class="email">
                                    <a href="mailto:<?php echo $email ?>"><?php echo $email ?></a>
                                </div>
                                <div class="phone">
                                    <a href="tel:<?php echo preg_replace('/[^A-Za-z0-9\-]/', '', $phone)  ?>"><?php echo $phone ?></a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <!-- If we need navigation buttons -->
            <?php if($count >0): ?>
            <div class="swiper-button-prev-custom swiper-button"></div>
            <div class="swiper-button-next-custom swiper-button"></div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>