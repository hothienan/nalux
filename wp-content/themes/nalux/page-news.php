<?php
/*
  Template Name: News Page Template
 */
?>
<?php
get_header();
global $post;
the_post();
include TEMPLATEPATH . '/includes/header/header.php';
$lang = 'vn';
$excludeNews = array();
if (function_exists('pll_current_language')) {
    $lang =  pll_current_language('slug') == 'en' ? 'en' : 'vn';
}
?>
<?php include TEMPLATEPATH . '/includes/header/header.php'; ?>
    <div class="page-main">
        <div class="news-section">
            <div class="container">
                <div class="page-title">
                    <h1 class="heading-title">
                        <?php
                        if(function_exists('pll__')) echo pll__('News');
                        ?>
                    </h1>
                </div>
                <div class="news-list-first">
                    <?php
                        $args = array(
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            'lang' => pll_current_language('slug'),
                            'meta_key'      => 'news_outstanding',
                            'meta_value'    => true,
                            'orderby' => 'date',
                            'posts_per_page' => 1,
                            'order' => 'DESC',
                        );

                        $outStanding = new WP_Query($args);
                        while ($outStanding->have_posts()) {
                            $outStanding->the_post();
                            $id = get_the_ID();
                            $excludeNews[] = $id;
                            $img = wp_get_attachment_url(get_post_thumbnail_id($id));
                            $title = get_the_title();
                            ?>
                            <div class="photo">
                                <a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo $img; ?>" alt="<?php echo $title; ?>"></a>
                            </div>
                            <div class="caption">
                                <span class="label"><?php
                                    if(function_exists('pll__')) echo pll__('Hot news');
                                    ?>
                                </span>
                                <h2 class="title"><a href="<?php echo get_the_permalink(); ?>"><?php echo $title; ?></a></h2>
                                <div class="date"><?php echo get_the_date( 'd.m.Y' ); ?></div>
                            </div>
                            <?php
                        }
                    wp_reset_postdata();
                    ?>
                </div>
                <div class="news-list-items">
                    <?php
                    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
                    $args = array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'lang' => pll_current_language('slug'),
                        'orderby' => 'date',
                        'post__not_in' => $excludeNews,
                        'paged' => $paged,
                        'posts_per_page' => 1,
                        'order' => 'DESC',
                    );

                    $loop = new WP_Query($args);
                    while ($loop->have_posts()) {
                        $loop->the_post();
                        $img = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
                        $title = get_the_title();
                        $excerpt = get_the_excerpt();
                        $cates =   wp_get_post_categories( $id, array( 'fields' => 'names' ) );
                        $catGroup = implode(' ', $cates);
                        ?>
                        <div class="item">
                            <div class="photo">
                                <a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo $img; ?>" alt="<?php echo $title; ?>" width="368" height="264"></a>
                            </div>
                            <div class="content-inner">
                                <span class="label"><?php echo $catGroup; ?></span>
                                <h3 class="title"><a href="<?php echo get_the_permalink(); ?>"><?php echo $title; ?></a></h3>
                                <div class="subscript">
                                    <?php echo $excerpt; ?>
                                </div>
                                <div class="date"><?php echo get_the_date( 'd.m.Y' ); ?></div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    $pag_args1 = array(
//                        'format'  => '?paged1=%#%',
                        'current' => $paged,
                        'total'   => $loop->max_num_pages,
//                        'add_args' => array( 'paged2' => $paged )
                    );
                    echo paginate_links( $pag_args1 );
                    ?>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>