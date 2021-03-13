    <?php
        /**
         * diaz_hook_content_after hook.
         * 
         */
        do_action( 'diaz_hook_content_after' );
    ?>

        <!-- **Footer** -->
        <footer id="footer">
            <div class="container">
            <?php
                /**
                 * diaz_footer hook.
                 * 
                 * @hooked diaz_vc_footer_template - 10
                 *
                 */
                do_action( 'diaz_footer' );
            ?>
            </div>
        </footer><!-- **Footer - End** -->

    </div><!-- **Inner Wrapper - End** -->
        
</div><!-- **Wrapper - End** -->
<?php
    
    do_action( 'diaz_hook_bottom' );

    wp_footer();
?>
</body>
</html>