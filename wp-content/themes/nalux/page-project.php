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

    <div class="project-main">
        <div class="container">
            <div class="project-inner">
                <div class="items">
                    <?php
                    $termArg = array();
                    $terms = get_terms(array(
                        'taxonomy' => 'project-group', // set your taxonomy here
                        'hide_empty' => true)); // default: true
                    if (!empty($terms) && !is_wp_error($terms)) {
                        $items = 1;
                        foreach ($terms as $term) {
                            $img = get_field('project-group-image', $term);
                            $link = esc_url(get_term_link($term));
                            $name = $term->name;
                            $tname = explode(' ', $name);
                            foreach ($tname as $i => $n) {
                                if (trim(strtoupper($n)) == "BĐS") {
                                    $tname[$i] = nl2br("BĐS \n");
                                }
                                if (strtoupper($n) == "PROPERTY") {
                                    $tname[$i] = nl2br("\n Property");
                                }
                            }
                            $name = implode(' ', $tname);
                            $termArg[] = array($img, $link, $name);
                        }
                    }
                    ?>
                    <?php
                    $i = 1;
                    $count = ceil((count($termArg) - 1) / 2);
                    $cterm = floor((count($termArg) - 1) / 2);
                    if (count($termArg) >= 1) {
                        ?>
                        <div class="item col-01">
                            <div class="page-title">
                                <h1 class="heading-title"><?php echo @pll__("Projects"); ?></h1>
                            </div>
                            <a href="<?php echo $termArg[0][1]; ?>" class="project-item gradient-top">
                                <div class="photo">
                                    <img src="<?php echo $termArg[0][0]; ?>" alt="<?php echo $termArg[0][2]; ?>">
                                </div>
                                <div class="project-name">
                                    <?php
                                    echo $termArg[0][2];
                                    ?>
                                </div>
                            </a>
                        </div>
                        <?php
                    }
                    if ($count >= 1) {
                        for ($ii = 1; $ii <= $count; $ii++) {
                            ?>
                            <div class="item col-02">
                                <a href="<?php echo $termArg[$ii + ($ii - 1)][1]; ?>" class="project-item gradient-top">
                                    <div class="photo">
                                        <img src="<?php echo $termArg[$ii + ($ii - 1)][0]; ?>"
                                             alt="<?php echo $termArg[$ii + ($ii - 1)][2]; ?>">
                                    </div>
                                    <div class="project-name">
                                        <?php
                                        echo $termArg[$ii + ($ii - 1)][2];
                                        ?>
                                    </div>
                                </a>
                                <?php if ($termArg[$ii + ($ii)]): ?>
                                <a href="<?php echo $termArg[$ii + ($ii)][1]; ?>" class="project-item gradient-top">
                                    <div class="photo">
                                        <img src="<?php echo $termArg[$ii + ($ii)][0]; ?>"
                                             alt="<?php echo $termArg[$ii + ($ii)][2]; ?>">
                                    </div>
                                    <div class="project-name">
                                        <?php
                                        echo $termArg[$ii + ($ii)][2];
                                        ?>
                                    </div>
                                </a>
                                <?php endif; ?>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
