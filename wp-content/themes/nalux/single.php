<?php get_header();
global $post;
the_post();
$id = get_the_id();
$content = get_the_content();
$title = get_the_title();
$lang = pll_current_language('slug') == 'en' ? 'en' : 'vn';
$news = $lang == 'en' ? 'news' : 'tin-tuc';
?>
<?php include TEMPLATEPATH . '/includes/header/header.php'; ?>

    <div class="page-main">
        <div class="news-detail-page">
            <div class="heading-block">
                <div class="container">
                    <div class="back-link">
                        <a href="<?php echo get_permalink( get_page_by_path( $news )); ?>">
                            <span><?php echo pll__('All Press') ?></span>
                        </a>
                    </div>
                    <div class="content">
                        <div class="contain wow animate__fadeInUp" data-wow-duration=".5s">
                            <div class="architect-name">
                                <?php echo $title; ?>
                            </div>
                            <h3 class="title">
                                <?php echo get_field('news_title'. $id); ?>
                            </h3>
                            <p><?php echo pll__('Interior'); ?><br>
                                <?php echo get_the_date( 'd.m.Y' ) ?><br>
                                <?php echo pll__('Author').': '.get_the_author(); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php the_content(); ?>
        </div>
        <div class="news-wrap block">
            <div class="news-slide">
                <div class="swiper">
                    <div class="swiper-wrapper">
                    <?php
                        $args = array(
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            'lang' => pll_current_language('slug'),
                            'post__not_in' => array($id),
                            'posts_per_page' => 6,
                            'orderby' => 'date',
                            'order' => 'DESC',
                        );
                        $count = 0;
                        $loop = new WP_Query( $args );
                        while ( $loop->have_posts()) {
                            $loop->the_post();
                            $id = get_the_ID();
                            $title = get_the_title();
                            $imgSrc = wp_get_attachment_url( get_post_thumbnail_id( $id )) ;
                            $excerpt = get_the_excerpt();
                            $link = get_the_permalink();
                            $s = $count ==0 ? $count : '.'.$count;
                        ?>
                            <div class="swiper-slide wow animate__fadeInUp" data-wow-duration=".5s" data-wow-delay="<?php echo $s ?>s">
                                <a href="<?php echo $link; ?>"><img src="<?php echo $imgSrc; ?>" alt=""></a>
                                <div class="caption">
                                    <h4 class="title"><a href="<?php echo $link; ?>"><?php echo $title; ?></a></h4>
                                    <p>
                                        <?php echo $excerpt; ?>
                                    </p>
                                    <a href="<?php echo $link; ?>" class="more"><span><?php echo pll__('Discover More'); ?></span></a>
                                </div>
                            </div>
                        <?php
                            $count =  $count == 6 ? 0 : $count+3;
                        }
                        ?>
                    </div>
                </div>
                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev-custom swiper-button"></div>
                <div class="swiper-button-next-custom swiper-button"></div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>