<?php get_header();
global $post;
the_post();
$id = get_the_id();
$content = get_the_content();
$lang = pll_current_language('slug') == 'en' ? 'en' : 'vn';
$cates =   wp_get_post_categories( $id, array( 'fields' => 'names' ) );
$catClass = implode(' ', $cates);
?>
<?php include TEMPLATEPATH . '/includes/header/header.php'; ?>

    <div class="page-main">
        <div class="project-detail-page block">
            <div class="project-main-content">
                <div class="project-image wow animate__fadeInLeft" data-wow-duration=".5s">
                    <a href="<?php echo get_the_permalink(); ?>">
                        <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $id )); ?>" alt="<?php echo get_the_permalink(); ?>">
                        <div class="project-detail">
                            <span><?php echo get_field('project_address', $id ); ?></span>
                            <span><?php echo get_field('project_year', $id ); ?></span>
                            <span><?php echo get_field('project_area', $id ); ?></span>
                        </div>
                        <div class="project-link">
                            <?php echo get_the_title(); ?>
                        </div>
                    </a>
                </div>
                <div class="project-info">
                    <div class="contain wow animate__fadeInUp" data-wow-duration=".5s">
                        <h3 class="title"><?php echo get_the_title(); ?></h3>
                        <p>
                            <?php echo pll__('Location').': '. get_field('project_location', $id ); ?> <br>
                            <?php echo pll__('Type').': '. $catClass; ?> <br>
                            <?php echo pll__('Style').': '. get_field('project_style', $id ); ?> <br>
                            <?php echo pll__('Description').': '. get_the_excerpt(); ?> <br>
                        </p>
                    </div>
                </div>
                <div class="project-desscription">
                    <?php echo $content; ?>
                </div>
            </div>
        </div>
        <div class="project block">
            <div class="title">
                <h3 class="title">
                    <?php echo pll__('see more projects'); ?>
                </h3>
            </div>
            <div class="container">
                <?php
                    $args = array(
                    'post_type' => 'project',
                    'post_status' => 'publish',
                    'lang' => pll_current_language('slug'),
                    'post__not_in' => array($id),
                    'posts_per_page' => 2,
                    'orderby' => 'date',
                    'order' => 'DESC',
                    );
                    $index = 0;
                    $loop = new WP_Query( $args );
                    while ( $loop->have_posts()) {
                    $loop->the_post();
                    $id = get_the_ID();
                    $title = get_the_title();
                    $imgSrc = wp_get_attachment_url( get_post_thumbnail_id( $id )) ;
                    $excerpt = get_the_excerpt();
                    $link = get_the_permalink();
                    $aminateClass = ($index == 0) ? 'animate__fadeInLeft' : 'animate__fadeInRight';
                ?>
                    <div class="project-image two-col wow <?php echo $aminateClass ?>" data-wow-duration=".5s">
                        <a href="<?php echo get_the_permalink(); ?>">
                            <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $id )); ?>" alt="<?php echo get_the_permalink(); ?>">
                            <div class="project-detail">
                                <span><?php echo get_field('project_address', $id ); ?></span>
                                <span><?php echo get_field('project_year', $id ); ?></span>
                                <span><?php echo get_field('project_area', $id ); ?></span>
                            </div>
                            <div class="project-link">
                                <?php echo get_the_title(); ?>"
                            </div>
                        </a>
                    </div>
                <?php
                        $index++;
                }
                ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>