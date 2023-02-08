<footer>
    <div class="container">
        <div class="footer-links">
            <?php
            if ( is_active_sidebar( 'nalux-top-menu' ) )
                dynamic_sidebar('nalux-top-menu');
            ?>
        </div>
        <div class="socials">
            <?php
            if ( is_active_sidebar( 'nalux-follow-us' ) )
                dynamic_sidebar('nalux-follow-us');
            ?>
        </div>
    </div>
</footer>
</body>