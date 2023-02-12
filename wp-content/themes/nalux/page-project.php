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
                    the_content();
                    $termArg = array();
                    $terms = get_terms( array(
                        'taxonomy' => 'project-group', // set your taxonomy here
                        'hide_empty' => true)); // default: true
                    if ( !empty( $terms ) && !is_wp_error( $terms ) ) {
                        $items = 1;
                        foreach( $terms as $term ) {
                            $img  = get_field( 'project-group-image', $term );
                            $link = esc_url( get_term_link( $term ) );
                            $name = $term->name;
                            $termArg[] = array($img, $link, $name);
                        }
                        ?>
<!--                        <div class="item col-01">-->
<!--                            <div class="page-title">-->
<!--                                <h1 class="heading-title">--><?php //echo @__pll('Project'); ?><!--</h1>-->
<!--                            </div>-->
<!--                            <a href="project-list.html" class="project-item gradient-top">-->
<!--                                <div class="photo">-->
<!--                                    <img src="images/project-photo-01.png" alt="">-->
<!--                                </div>-->
<!--                                <div class="project-name">-->
<!--                                    BĐS<br>nghỉ dưỡng-->
<!--                                </div>-->
<!--                            </a>-->
<!--                        </div>-->
<!--                        <div class="item col-02">-->
<!--                            <a href="project-list.html" class="project-item  gradient-bottom">-->
<!--                                <div class="photo">-->
<!--                                    <img src="images/project-photo-01.png" alt="">-->
<!--                                </div>-->
<!--                                <div class="project-name">-->
<!--                                    BĐS<br>đô thị-->
<!--                                </div>-->
<!--                            </a>-->
<!--                            <a href="project-list.html" class="project-item  gradient-top">-->
<!--                                <div class="photo">-->
<!--                                    <img src="images/project-photo-01.png" alt="">-->
<!--                                </div>-->
<!--                                <div class="project-name">-->
<!--                                    BĐS<br>công nghiệp-->
<!--                                </div>-->
<!--                            </a>-->
<!--                        </div>-->
<!--                        <div class="item col-03">-->
<!--                            <a href="project-list.html" class="project-item  gradient-top">-->
<!--                                <div class="photo">-->
<!--                                    <img src="images/project-photo-01.png" alt="">-->
<!--                                </div>-->
<!--                                <div class="project-name">-->
<!--                                    BĐS<br>cho thuê-->
<!--                                </div>-->
<!--                            </a>-->
<!--                            <a href="project-list.html" class="project-item  gradient-bottom">-->
<!--                                <div class="photo">-->
<!--                                    <img src="images/project-photo-01.png" alt="">-->
<!--                                </div>-->
<!--                                <div class="project-name">-->
<!--                                    Thương mại-->
<!--                                </div>-->
<!--                            </a>-->
<!--                        </div>-->
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
