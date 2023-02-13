<?php
/*
  Template Name: About Page Template
 */
?>
<?php get_header();
global $post;
the_post();
$id = get_the_id();
$title = get_the_title();
$banner = wp_get_attachment_url(get_post_thumbnail_id($id));
$lang = pll_current_language('slug') == 'en' ? 'en' : 'vn';
?>
<?php include TEMPLATEPATH . '/includes/header/header.php'; ?>

    <div class="banner">
        <img src="<?php echo $banner; ?>" alt="<?php echo $title; ?>">
        <div class="contain">
            <?php the_content(); ?>
        </div>
    </div>
    <div class="page-main">
        <div class="company-section">
            <div class="container">
                <?php echo get_field('about-us-vision-and-mission', $id) ?>
                <?php echo get_field('about-us-core-values', $id) ?>
            </div>
        </div>
        <div class="profile-section">
            <div class="container">
                <h1 class="heading-title"><?php echo @pll__('Leadership team'); ?></h1>
                <div class="profiles-block">
                    <?php
                    $args = array(
                        'post_type' => 'staff',
                        'post_status' => 'publish',
                        'lang' => pll_current_language('slug'),
                        'orderby' => 'date',
                        'posts_per_page' => -1,
                        'order' => 'DESC',
                    );

                    $loop = new WP_Query($args);
                    while ($loop->have_posts()) {
                        $loop->the_post();
                        $pId = get_the_ID();
                        $img = wp_get_attachment_url(get_post_thumbnail_id($pId));
                        $title = get_the_title();
                        $excerpt = get_the_excerpt();
                        ?>
                        <div class="item">
                            <div class="profile-photo">
                                <img src="<?php echo $img; ?>" alt="<?php echo $title; ?>">
                            </div>
                            <div class="caption">
                                <div class="sub-position"><?php echo get_field('staff-posittion', $pId); ?></div>
                                <div class="sub-title">
                                    <h3 class="name"><?php echo $title; ?></h3>
                                    <div class="tooltip-block">
                                        <i class="icon-arrow-expand"></i>
                                        <div class="profiles-expand">
                                            <div class="scroller">
                                                <div class="position"><?php echo get_field('staff-posittion', $pId); ?></div>
                                                <h3 class="name"><?php echo $title; ?></h3>
                                                <div class="description">
                                                    <?php the_content(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sub-content">
                                    <?php echo $excerpt; ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    wp_reset_query();
                    ?>
                </div>
            </div>
        </div>
        <div class="partner-section">
            <div class="container">
                <h2 class="heading-title">Đối tác</h2>
                <div class="partners-block">
                <?php
                $args = array(
                    'post_type' => 'partner',
                    'post_status' => 'publish',
                    'lang' => pll_current_language('slug'),
                    'orderby' => 'date',
                    'posts_per_page' => -1,
                    'order' => 'DESC',
                );

                $loop = new WP_Query($args);
                while ($loop->have_posts()) {
                    $loop->the_post();
                    $img = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
                    ?>
                    <div class="item">
                        <img src="<?php echo $img; ?>" alt="<?php echo the_title(); ?>">
                    </div>
                    <?php
                }
                ?>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>