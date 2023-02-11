<?php
/*
  Template Name: Contact Page Template
 */
?>
<?php get_header();
global $post;
the_post();
$id = get_the_id();
$content = get_the_content();
?>
<?php include TEMPLATEPATH . '/includes/header/header.php'; ?>
<div class="page-main">
    <div class="contact-form-section">
        <div class="container">
            <div class="page-title">
                <h1 class="heading-title"><?php echo @pll__('Contact') ?></h1>
            </div>
            <div class="contactForm">
                <form action="send" class="form" id="makeRequest">
                    <div class="fieldset">
                        <div class="field">
                            <div class="control">
                                <input type="text" id="name" class="input-text" placeholder="Họ & tên *">
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <input type="email" id="email" class="input-text" placeholder="Email *">
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <input type="tel" id="phone" class="input-text" placeholder="Số điện thoại *">
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <textarea id="comment" class="input-text" placeholder="Nội dung"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="actions">
                        <button class="action btn-primary">
                            <span><?php echo @pll__('Send') ?></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="contact-infomation-section">
        <div class="container">
            <div class="company-info">
                <div class="company-name">
                    <?php echo @pll__('Nalux company') ?>
                </div>
                <div class="address-info">
                    <?php
                    if ( is_active_sidebar( 'nalux-about-us' ) )
                        dynamic_sidebar('nalux-about-us');
                    ?>
                </div>
            </div>
            <div class="google-map-block">
                <?php
                if ( is_active_sidebar( 'nalux-maps' ) )
                    dynamic_sidebar('nalux-maps');
                ?>
            </div>
        </div>
    </div>
    <div class="contact-address-section">
        <div class="container">
            <div class="address-items">
                <?php
                $args = array(
                    'post_type' => 'project',
                    'post_status' => 'publish',
                    'lang' => pll_current_language('slug'),
                    'meta_value'    => true,
                    'posts_per_page' => 3,
                    'orderby' => 'date',
                    'order' => 'DESC',
                );

                $loop = new WP_Query($args);
                while ($loop->have_posts()) {
                    $loop->the_post();
                    $img = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
                    ?>
                    <div class="item">
                        <div class="company-name">
                            <?php the_title(); ?>
                        </div>
                        <div class="address-info">
                            <?php echo get_field('project-information', get_the_ID());  ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>	
