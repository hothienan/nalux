<?php
/*
  Template Name: News Page Template
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
    <div class="news-page block">
        <div class="container">
            <div class="items">
            <?php
            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'lang' => pll_current_language('slug'),
                'orderby' => 'date',
                'order' => 'DESC',
            );

            $loop = new WP_Query( $args );
            while ( $loop->have_posts()) {
                $loop->the_post();
                $id = get_the_ID();
                $title = get_the_title();
                $imgSrc = wp_get_attachment_url( get_post_thumbnail_id( $id )) ;
                $excerpt = get_the_excerpt();
                $link = get_the_permalink();
                ?>
                <div class="item">
                    <div class="news-content">
                        <div class="content">
                            <div class="contain wow animate__fadeInUp" data-wow-duration=".5s">
                                <h3 class="title"><?php echo $title ?></h3>
                                <p><?php echo $excerpt ?>
                                </p>
                                <a href="<?php echo $link ?>" class="more"><span><?php echo pll__('Discover More'); ?></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="news-photo wow animate__fadeInRight" data-wow-duration=".5s">
                        <a href="<?php echo $link ?>">
                            <img src="<?php echo $imgSrc ?>" alt="<?php echo $title ?>">
                        </a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>