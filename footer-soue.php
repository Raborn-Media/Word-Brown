<?php
/**
 * Footer
 */
?>

<!-- BEGIN of footer -->
<footer class="footer">
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell ">
                <div class="soue-footer__logo">
                    <a href="<?php echo get_home_url(); ?>">
                        <?php if ( $footer_logo = get_field( 'soue_footer_logo' ) ) : ?>
                            <?php echo display_svg( $footer_logo, '', 'small' ); ?>
                        <?php endif; ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- END of footer -->

<?php wp_footer(); ?>
</body>
</html>
