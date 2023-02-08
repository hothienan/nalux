<?php
get_header();
include TEMPLATEPATH . '/includes/header/header.php';
$aboutUs = pll_current_language('slug') == 'en' ? 'about-us' : 'gioi-thieu';
$project = pll_current_language('slug') == 'en' ? 'project' : 'du-an';
$news = pll_current_language('slug') == 'en' ? 'news' : 'tin-tuc';
$contactUs = pll_current_language('slug') == 'en' ? 'contact-us' : 'lien-he';
$careers = pll_current_language('slug') == 'en' ? 'careers' : 'tuyen-dung';
$lang = pll_current_language('slug') == 'en' ? 'en' : 'vn';
$pageId = 100;
$projectInfo = array();

$args = array(
    'post_type' => 'project',
    'post_status' => 'publish',
    'lang' => pll_current_language('slug'),
    'posts_per_page' => 4,
    'orderby' => 'date',
    'order' => 'DESC',
);

$loop = new WP_Query($args);
while ($loop->have_posts()) {
    $loop->the_post();
    $id = get_the_ID();
    $projectInfo[] = array('image' => wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())), 'address' => get_field('project_address', $id), 'year' => get_field('project_year', $id), 'area' => get_field('project_area', $id), 'title' => get_the_title(), 'link' => get_the_permalink());
}
wp_reset_postdata();

?>
    <div class="page-main">
        <div class="banner-main">
            <div class="banner-homepage">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <?php
                        $args = array(
                            'post_type' => 'project',
                            'post_status' => 'publish',
                            'lang' => pll_current_language('slug'),
                            'meta_key'      => 'project_is_banner',
                            'meta_value'    => 'Yes',
                            'orderby' => 'date',
                            'order' => 'DESC',
                        );

                        $loop = new WP_Query( $args );
                        $count= 0;
                        while ( $loop->have_posts()) {
                            $loop->the_post();
                            $id = get_the_ID();
                        ?>
                        <div class="swiper-slide">
                            <img src="<?php echo get_field('project_banner_image', $id ); ?>" alt="">
                            <div class="caption">
                                <h2><a href="<?php the_permalink(); ?>" title="<?php echo the_title(); ?>"><?php echo the_title(); ?></a></h2>
                                <a href="<?php the_permalink(); ?>" class="more"><span><?php echo pll__('Discover More'); ?></span></a>
                            </div>
                        </div>
                        <?php
                        }
                        wp_reset_postdata();
                        ?>
                    </div>
                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev-custom swiper-button"></div>
                    <div class="swiper-button-next-custom swiper-button"></div>
                </div>
            </div>
            <div class="company-info">
                <ul class="social-block wow animate__fadeInUp" data-wow-offset="10" data-wow-duration=".5s"
                    data-wow-delay="0s">
                    <li>
                        <a href="<?php echo get_option('fb_link'); ?>"><i class="icon-facebook"></i></a>
                    </li>
                    <li>
                        <a href="<?php echo get_option('ins_link'); ?>"><i class="icon-instagram"></i></a>
                    </li>
                    <li>
                        <a href="<?php echo get_option('yt_link'); ?>"><i class="icon-youtube"></i></a>
                    </li>
                    <li>
                        <a href="<?php echo get_option('linke_link'); ?>"><i class="icon-linkedin"></i></a>
                    </li>
                </ul>
                <div class="address">
                <span class="wow animate__fadeInUp" data-wow-offset="10" data-wow-duration=".5s"
                      data-wow-delay="0.3s"><?php echo pll__(get_option('contact_phone', '')); ?></span>
                    <span class="wow animate__fadeInUp" data-wow-offset="10" data-wow-duration=".5s"
                          data-wow-delay="0.6s"><?php echo pll__(get_option('contact_address','')); ?></span>
                    <span class="wow animate__fadeInUp" data-wow-offset="10" data-wow-duration=".5s"
                          data-wow-delay="0.9s"><?php echo pll__(get_option('contact_email','')); ?></span>
                </div>
            </div>
        </div>
        <div class="about block">
            <div class="content">
                <div class="contain wow animate__fadeInUp" data-wow-duration=".5s">
                    <h3 class="title"><?php echo pll__('ABOUT US'); ?></h3>
                    <?php
                    $homeInfo = get_page($pageId);
                    $leftContent = get_field('left_content_'.$lang, $pageId );
                    $rightContent = get_field('right_content_'.$lang, $pageId );
                    $leftImage = get_field('left_image', $pageId );
                    $leftImage_small = get_field('left_image_small', $pageId );
                    $rightImage = get_field('right_image', $pageId );
                    ?>
                    <p>
                        <?php echo $leftContent;  ?>
                    </p>
                    <a href="<?php echo get_permalink( get_page_by_path( $aboutUs )); ?>" class="more"><span><?php echo pll__('Discover More'); ?></span></a>
                </div>
            </div>
            <div class="about-image wow animate__fadeInRight" data-wow-duration=".5s">
                <img src="<?php echo $rightImage; ?>" alt="">
            </div>
            <div class="about-image-multi wow animate__fadeInLeft" data-wow-duration=".5s" data-wow-delay=".5s">
                <div class="img-pos01">
                    <img src="<?php echo $leftImage; ?>" alt="">
                </div>
                <div class="img-pos02">
                    <img src="<?php echo $leftImage_small; ?>" alt="">
                </div>
            </div>
            <div class="about-description wow animate__fadeInUp" data-wow-duration=".5s">
                <?php echo $rightContent; ?>
            </div>
        </div>
        <div class="project block">
            <div class="container">
                <div class="project-image two-col wow animate__fadeInLeft" data-wow-duration=".5s">
                    <a href="<?php echo $projectInfo[0]['link']; ?>">
                        <img src="<?php echo $projectInfo[0]['image']; ?>" alt="">
                        <div class="project-detail">
                            <span><?php echo $projectInfo[0]['address']; ?></span>
                            <span><?php echo $projectInfo[0]['year']; ?></span>
                            <span><?php echo $projectInfo[0]['area']; ?></span>
                        </div>
                        <div class="project-link">
                            <?php echo $projectInfo[0]['title']; ?>
                        </div>
                    </a>
                </div>
                <div class="content two-col">
                    <div class="contain wow animate__fadeInRight" data-wow-duration=".5s">
                        <h3 class="title"><?php echo pll__('PROJECTS'); ?></h3>
                        <p>
                            <?php echo get_field('home_project_content_'.$lang, $pageId); ?>
                        </p>
                        <a href="<?php echo get_permalink( get_page_by_path( $project )); ?>" class="more"><span><?php echo pll__('Discover More'); ?></span></a>
                    </div>
                </div>
                <div class="project-image two-col wow animate__fadeInLeft" data-wow-duration=".5s"
                     data-wow-delay=".3s">
                    <a href="<?php echo $projectInfo[1]['link']; ?>">
                        <img src="<?php echo $projectInfo[1]['image']; ?>" alt="">
                        <div class="project-detail">
                            <span><?php echo $projectInfo[1]['address']; ?></span>
                            <span><?php echo $projectInfo[1]['year']; ?></span>
                            <span><?php echo $projectInfo[1]['area']; ?></span>
                        </div>
                        <div class="project-link">
                            <?php echo $projectInfo[1]['title']; ?>
                        </div>
                    </a>
                </div>
                <div class="project-image two-col wow animate__fadeInRight" data-wow-duration=".5s"
                     data-wow-delay=".3s">
                    <a href="<?php echo $projectInfo[2]['link']; ?>">
                        <img src="<?php echo $projectInfo[2]['image']; ?>" alt="">
                        <div class="project-detail">
                            <span><?php echo $projectInfo[2]['address']; ?></span>
                            <span><?php echo $projectInfo[2]['year']; ?></span>
                            <span><?php echo $projectInfo[2]['area']; ?></span>
                        </div>
                        <div class="project-link">
                            <?php echo $projectInfo[2]['title']; ?>
                        </div>
                    </a>
                </div>
                <div class="project-image wow animate__zoomIn" data-wow-duration=".5s" data-wow-delay=".3s">
                    <a href="<?php echo $projectInfo[3]['link']; ?>">
                        <img src="<?php echo $projectInfo[3]['image']; ?>" alt="">
                        <div class="project-detail">
                            <span><?php echo $projectInfo[3]['address']; ?></span>
                            <span><?php echo $projectInfo[3]['year']; ?></span>
                            <span><?php echo $projectInfo[3]['area']; ?></span>
                        </div>
                        <div class="project-link">
                            <?php echo $projectInfo[3]['title']; ?>
                        </div>
                    </a>
                </div>
            </div>
            <div class="project-linkmore">
                <a href="<?php echo get_permalink( get_page_by_path( $project )); ?>" class="more"><span><?php echo pll__('SEE MORE PROJECTS'); ?></span></a>
            </div>
        </div>
        <div class="news block">
            <div class="content">
                <div class="contain wow animate__fadeInUp" data-wow-duration=".5s">
                    <h3 class="title"><?php echo pll__('NEWS'); ?></h3>
                    <p>
                        <?php echo get_field('home_news_content_'.$lang, $pageId); ?>
                    </p>
                    <a href="<?php echo get_permalink( get_page_by_path( $news )); ?>" class="more"><span><?php echo pll__('Discover More'); ?></span></a>
                </div>
            </div>
            <div class="image wow animate__fadeInRight" data-wow-duration=".5s">
                <img src="<?php echo get_field('home_news_image', $pageId); ?>" alt="">
            </div>
        </div>
        <div class="careers block">
            <div class="careers-image-multi wow animate__fadeInLeft" data-wow-duration=".5s">
                <div class="img-pos01">
                    <img src="<?php echo get_field('home_careers_image', $pageId); ?>" alt="">
                </div>
                <div class="img-pos02">
                    <img src="<?php echo get_field('home_careers_image_small', $pageId); ?>" alt="">
                </div>
            </div>
            <div class="content">
                <div class="contain wow animate__fadeInUp" data-wow-duration=".5s">
                    <h3 class="title"><?php echo pll__('CAREERS'); ?></h3>
                    <p>
                        <?php echo get_field('home_careers_content_'.$lang, $pageId); ?>
                    </p>
                    <a href="<?php echo get_permalink( get_page_by_path( $careers )); ?>" class="more"><span><?php echo pll__('Discover More'); ?></span></a>
                </div>
            </div>
        </div>

        <div class="contact block">
            <div class="content">
                <div class="contain wow animate__fadeInUp" data-wow-duration=".5s">
                    <h3 class="title"><?php echo pll__('CONTACT US'); ?></h3>
                    <p>
                        <?php echo get_field('home_contact_us_content_'.$lang, $pageId); ?>
                    </p>
                    <a href="<?php echo get_permalink( get_page_by_path( $contactUs )); ?>" class="more"><span><?php echo pll__('Discover More'); ?></span></a>
                </div>
            </div>
        </div>
    </div>
<?php
get_footer();
?>