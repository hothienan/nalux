<?php
get_header();
include TEMPLATEPATH . '/includes/header/header.php';
$lang = 'vn';
if (function_exists('pll_current_language')) {
    $lang =  pll_current_language('slug') == 'en' ? 'en' : 'vn';
}
?>
    <div class="banner">
        <?php
            $homeSettingId = 96;
            $post = get_post($homeSettingId);
            $content = apply_filters('the_content', $post->post_content);
            if (!empty($content)) echo $content;
            else {
                $banner = wp_get_attachment_url(get_post_thumbnail_id($homeSettingId));
                ?>
                <img src="<?php echo $banner; ?>" alt="<?php bloginfo('name'); ?>">
                <?php
            }
        ?>
    </div>
    <div class="page-main">
        <div class="gallery-section">
            <div class="container">
                <h2 class="heading-title">
                    <?php
                    if(function_exists('pll__')) echo pll__('Outstanding projects');
                    ?>
                </h2>
                <div class="gallery-wrap">
                    <?php
                        $terms = get_terms( array(
                            'taxonomy' => 'project-group', // set your taxonomy here
                            'hide_empty' => true)); // default: true
                        if ( !empty( $terms ) && !is_wp_error( $terms ) ) {
                            $items = 1;
                            foreach( $terms as $term ) {
                            ?>
                            <div class="item item-<?php echo $items; ?>" style="background-image: url(<?php echo get_field( 'project-group-image', $term ); ?>);">
                                <h3 class="h3-style"><?php echo esc_attr( $term->name ); ?></h3>
                                <a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="link"></a>
                            </div>
                            <?php
                                $items++;
                            }
                        }
                    ?>
                </div>
            </div>
        </div>

        <div class="awards-section">
            <div class="container">
                <h2 class="heading-title">
                    <?php
                    if(function_exists('pll__')) echo pll__('Awards');
                    ?>
                </h2>
                <div class="awards-slides">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <?php
                            $args = array(
                                'post_type' => 'award',
                                'post_status' => 'publish',
                                'lang' => pll_current_language('slug'),
                                'orderby' => 'date',
                                'order' => 'DESC',
                            );

                            $loop = new WP_Query($args);
                            $awards = $loop->post_count;
                            $items = 1;
                            while ($loop->have_posts()) {
                                $loop->the_post();
                                $img = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
                                if ($items > 5) $items = 1;
                                ?>
                                <div class="swiper-slide item-<?php echo $items; ?>">
                                    <div class="photo">
                                        <img src="<?php echo $img; ?>" alt="" width="200" height="200">
                                    </div>
                                    <span class="label"><?php if(function_exists('pll__')) echo pll__("Project's name"); ?></span>
                                    <div class="prj-name"><?php the_title(); ?></div>
                                    <div class="subscript"><?php the_content(); ?></div>
                                </div>
                                <?php
                                $items++;
                            }
                            ?>
                        </div>

                    <!-- <div class="swiper-pagination"></div> -->
                    </div>
                    <?php if ($awards > 4): ?>
                        <div class="swiper-button-next swiper-button"></div>
                        <div class="swiper-button-prev swiper-button"></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php
get_footer();
?>