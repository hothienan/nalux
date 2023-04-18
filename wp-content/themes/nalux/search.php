<?php
get_header();
global $post;
the_post();
include TEMPLATEPATH . '/includes/header/header.php';
$GLOBAL_SEARCH = (empty($_REQUEST['s']) ? '' : $_REQUEST['s']);
$GLOBAL_SEARCH = preg_replace('/[^A-Za-z 0-9\-]/', '', $GLOBAL_SEARCH);
$lang = 'vn';
$excludeNews = array();
if (function_exists('pll_current_language')) {
    $lang =  pll_current_language('slug') == 'en' ? 'en' : 'vn';
}
global $query_string;

wp_parse_str( $query_string, $search_query );
$search = new WP_Query( $search_query );
?>
<?php include TEMPLATEPATH . '/includes/header/header.php'; ?>
    <div class="news-list-items">
        <?php
        while ($search->have_posts()) {
            $search->the_post();
            $img = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
            $title = get_the_title();
            $excerpt = get_the_excerpt();
            ?>
            <div class="item">
                <div class="photo">
                    <a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo $img; ?>" alt="<?php echo $title; ?>" width="368" height="264"></a>
                </div>
                <div class="content-inner">
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
        <?php wpbeginner_numeric_posts_nav(); ?>
    </div>
<?php get_footer(); ?>