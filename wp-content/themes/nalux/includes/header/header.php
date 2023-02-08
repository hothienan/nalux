<header>
    <div class="header-wrapper">
        <div class="logo">
            <a href="<?php if (function_exists('pll_home_url')) echo pll_home_url(); else echo home_utl(); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-white.png" alt="" class="white">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-black.png" alt="" class="black">
            </a>
        </div>
        <nav>
            <ul>
                <?php
                $aboutUs = 'gioi-thieu';
                $project = 'du-an';
                $news    = 'tin-tuc';
                $careers = 'tuyen-dung';
                $contactUs = 'lien-he';
                if (pll_current_language('slug') == 'en') {
                    $aboutUs = 'about-us';
                    $project = 'projects';
                    $news = 'news';
                    $careers = 'careers';
                    $contactUs = 'contact-us';
                }
                ?>
                <li class="<?php echo $activeMenu['about']; ?>"><a href="<?php echo get_permalink( get_page_by_path( $aboutUs )); ?>" title="<?php echo get_the_title( get_page_by_path( $aboutUs )); ?>"><?php echo get_the_title( get_page_by_path( $aboutUs )); ?></a></li>
                <li class="<?php echo $activeMenu['projects']; ?>"><a href="<?php echo get_permalink( get_page_by_path( $project )); ?>" title="<?php echo get_the_title( get_page_by_path( $project )); ?>"><?php echo get_the_title( get_page_by_path( $project )); ?></a></li>
                <li class="<?php echo $activeMenu['news']; ?>"><a href="<?php echo get_permalink( get_page_by_path( $news )); ?>" title="<?php echo get_the_title( get_page_by_path( $news )); ?>"><?php echo get_the_title( get_page_by_path( $news )); ?></a></li>
                <li class="<?php echo $activeMenu['careers']; ?>"><a href="<?php echo get_permalink( get_page_by_path( $careers )); ?>" title="<?php echo get_the_title( get_page_by_path( $careers )); ?>"><?php echo get_the_title( get_page_by_path( $careers )); ?></a></li>
                <li class="<?php echo $activeMenu['contact']; ?>"><a href="<?php echo get_permalink( get_page_by_path( $contactUs )); ?>" title="<?php echo get_the_title( get_page_by_path( $contactUs )); ?>"><?php echo get_the_title( get_page_by_path( $contactUs )); ?></a></li>
            </ul>
        </nav>
        <div class="lang">
            <?php echo do_shortcode('[polylang_langswitcher]'); ?>
<!--            <ul>-->
<!--                <li class="active">-->
<!--                    <span>En</span>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <span>Vi</span>-->
<!--                </li>-->
<!--            </ul>-->
        </div>
        <div class="hamburger hamburger--slider-r">
            <div class="hamburger-box">
                <div class="hamburger-inner"></div>
            </div>
        </div>
    </div>
</header>