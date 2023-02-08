<?php
/*
  Template Name: Project Page Template
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
    <div class="project-page project block">
        <div class="container">
            <div class="project-main">
                <div class="project-title wow animate__fadeInRight" data-wow-duration=".5s">
                    <h3 class="title"><?php the_title(); ?></h3>
                </div>
                <div class="project-content wow animate__fadeInUp" data-wow-duration=".5s">
                    <p><?php echo $content; ?></p>
                </div>
            </div>
            <div class="project-tabs wow animate__fadeInUp" data-wow-duration="1s">
                <ul>
                    <li class="active">
                        <a class="category-filter" data-filter="all" href="#"><?php echo pll__('All'); ?></a>
                    </li>
                    <?php
                    $args = array(
                        'type'                     => 'project',
                        'child_of'                 => 0,
                        'parent'                   => '',
                        'orderby'                  => 'name',
                        'order'                    => 'ASC',
                        'hide_empty'               => 1,
                        'hierarchical'             => 0,
                        'taxonomy'                 => 'category',
                        'pad_counts'               => true );
                    $categories = get_categories($args);
                    foreach ($categories as $category) {
                        ?>
                        <li>
                            <a class="category-filter" data-filter="<?php echo $category->slug ?>" href="#"><?php echo $category->name ?></a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="product-block">
            <?php
                $args = array(
                    'post_type' => 'project',
                    'post_status' => 'publish',
                    'lang' => pll_current_language('slug'),
                    'orderby' => 'date',
                    'order' => 'DESC',
                );
                $index = 1;
                $loop = new WP_Query( $args );
                $projectCount = $loop->found_posts;
                while ( $loop->have_posts()) {
                $loop->the_post();
                $id = get_the_ID();
                $title = get_the_title();
                $imgSrc = wp_get_attachment_url( get_post_thumbnail_id( $id )) ;
                $excerpt = get_the_excerpt();
                $link = get_the_permalink();
                $twoColumn = ($index != 3) ? 'two-col' : '';
                $cates =   wp_get_post_categories( $id, array( 'fields' => 'names' ) );
                $catClass = implode(' ', $cates);
            ?>
                <div class="project-image <?php echo $twoColumn. ' '. $catClass; ?> wow animate__fadeInLeft " data-wow-duration=".5s">
                    <a href="<?php echo $link ?>">
                        <img src="<?php echo $imgSrc ?>" alt="<?php echo $title ?>">
                        <div class="project-detail">
                            <span><?php echo get_field('project_address', $id ) ?></span>
                            <span><?php echo get_field('project_year', $id )  ?></span>
                            <span><?php echo get_field('project_area', $id) ?></span>
                        </div>
                        <div class="project-link">
                            <?php echo $title ?>
                        </div>
                    </a>
                </div>
            <?php
                    $index = $index == 7 ? 1 : $index+1;
                }
            wp_reset_postdata();
            ?>
            </div>
            <?php if ($projectCount > 7): ?>
            <div class="project-linkmore">
                <a href="#" class="more"><span><?php echo pll__("SEE MORE PROJECTS"); ?></span></a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
