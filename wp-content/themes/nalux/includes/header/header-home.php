<body>
    <header>
        <div class="container">
            <a href="<?php if (function_exists('pll_home_url')) echo pll_home_url(); else echo home_utl(); ?>" class="logo">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Nalux" width="115" height="24">
            </a>
            <nav>
                <?php
                if ( is_active_sidebar( 'nalux-top-menu' ) )
                    dynamic_sidebar('nalux-top-menu');
                ?>
            </nav>
            <div class="search-block">
                <div class="search">
                    <form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url( '/' ); ?>">
                        <input type="text" name="s" id="s" placeholder="<?php echo @pll__('Search'); ?>">
                        <button type="submit" id="searchsubmit" class="button">
                            <span><?php echo @pll__('Search'); ?></span>
                        </button>
                    </form>
                </div>
            </div>
            <div class="langquage">
                <?php echo do_shortcode('[polylang_langswitcher]'); ?>
            </div>
        </div>

    </header>