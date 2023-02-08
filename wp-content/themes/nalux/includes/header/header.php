<body>
    <header>
        <div class="container">
            <a href="index.html" class="logo">
                <img src="images/logo.png" alt="Nalux" width="115" height="24">
            </a>
            <nav>
                <?php
                if ( is_active_sidebar( 'nalux-top-menu' ) )
                    dynamic_sidebar('nalux-top-menu');
                ?>
            </nav>
            <div class="langquage">
                <?php echo do_shortcode('[polylang_langswitcher]'); ?>
            </div>
        </div>

    </header>