<?php get_header();
$queriedObject = get_queried_object();
$_GlobalTaxonomyID = $queriedObject->term_id;
$term = get_term($_GlobalTaxonomyID, 'project-group');
$termName = $term->name;
$originName = $termName;
$termImg = get_field( 'project-group-image', $term );
//$originSlug = $term->slug;
//$termDescription = $term->description;
$lang = pll_current_language('slug') == 'en' ? 'en' : 'vn';
?>
<?php include TEMPLATEPATH . '/includes/header/header.php'; ?>

<?php if ($termImg): ?>
    <div class="banner">
        <img src="<?php echo $termImg; ?>" alt="<?php echo $termName; ?>">
        <div class="container">
            <div class="contain">
                <div class="page-title">
                    <h1 class="heading-title"><?php echo $termName; ?></h1>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<div class="page-main">
    <div class="project-list-main">
        <div class="container">
            <div class="items">
                <?php
                $taxQuery = array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'project-group',
                        'field' => 'term_id',
                        'terms' => $_GlobalTaxonomyID
                    )
                );
                $args = array(
                    'post_type' => 'project',
                    'posts_per_page' => -1,
                    'tax_query' => $taxQuery,
                    'orderby' => 'title',
                    'order' => 'ASC',
                );

                $query = new WP_Query($args);
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        $projectID = get_the_ID();
                        $projectImg = wp_get_attachment_url( get_post_thumbnail_id( $projectID )) ;
                        ?>
                        <div class="item">
                            <a href="<?php the_permalink(); ?>" class="project-item">
                                <div class="photo">
                                    <img src="<?php echo $projectImg; ?>" alt="<?php the_title(); ?>">
                                </div>
                                <div class="project-name">
                                    <?php the_title(); ?>
                                </div>
                            </a>
                        </div>
                        <?php
                    }
                }
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
