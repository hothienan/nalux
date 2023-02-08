<footer>
    <div class="container">
        <div class="content wow animate__fadeInUp" data-wow-duration=".5s">
            <h3 class="title"><?php echo pll__('GET IN TOUCH!'); ?></h3>
            <p><?php echo pll__("Let's make friends! We will convince you to love our vision and make your dream designs come true!"); ?></p>
        </div>
        <div class="company-info">
            <ul class="social-block">
                <li>
                    <a href="<?php echo get_option('fb_link'); ?>"><i class="icon-facebook"></i></a>
                </li>
                <li>
                    <a href="<?php echo get_option('ins_link'); ?>"><i class="icon-instagram"></i></a>
                </li>
                <li>
                    <a href="<?php echo get_option('yt_link'); ?>"><i class="icon-youtube"></i></a>
                </li>
                <li>
                    <a href="<?php echo get_option('linke_link'); ?>"><i class="icon-linkedin"></i></a>
                </li>
            </ul>
            <div class="address">
                <span><?php echo pll__(get_option('contact_phone','')); ?></span>
                <span><?php echo pll__(get_option('contact_address','')); ?></span>
                <span><?php echo pll__(get_option('contact_email','')); ?></span>
            </div>
        </div>
        <div class="actions">
            <?php
            $contactUs = pll_current_language('slug') == 'en' ? 'contact-us' : 'lien-he';
            ?>
            <a href="<?php echo get_permalink(get_page_by_path( $contactUs )); ?>" class="btn-primary wow animate__fadeInUp" data-wow-duration=".5s">
                <span><?php echo pll__('CONTACT US'); ?></span>
            </a>
        </div>
        <div class="copyright">
            <span>© <?php echo pll__(get_option('copy_right','')); ?></span>
        </div>
    </div>
</footer>
<div id="desktop-integration" class="flashLight"></div>