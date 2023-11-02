<?php
/**
 * Footer
 */
?>

<!-- BEGIN of footer -->
<footer class="footer">
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell large-2">
                <div class="footer__logo">
                    <a href="<?php echo get_home_url(); ?>">
                        <?php if ( $footer_logo = get_field( 'footer_logo', 'options' ) ) :
                            echo wp_get_attachment_image( $footer_logo['id'], 'medium' );
                        else :
                            show_custom_logo();
                        endif; ?>
                    </a>
                </div>
            </div>
            <div class="cell large-2">
                <?php
                if ( has_nav_menu( 'footer-menu' ) ) {
                    wp_nav_menu( array(
                        'theme_location' => 'footer-menu',
                        'menu_class'     => 'footer-menu',
                        'depth'          => 1
                    ) );
                }
                ?>
            </div>
            <div class="cell large-5 contacts-col">
                <h6 class="column-heading">
                    <?php _e( 'the word and brown companies' ); ?>
                </h6>
                <?php if ( $address = get_field( 'address', 'options' ) ) : ?>
                    <a class="address"
                       href="https://www.google.com/maps/place/701+S+Parker+St,+Orange,+CA+92868/@33.77665,-117.8607707,17z/data=!3m1!4b1!4m5!3m4!1s0x80dcd9c16c7b9fa5:0xce878957cb3e53ae!8m2!3d33.77665!4d-117.858582">
                        <?php echo $address; ?>
                    </a>
                <?php endif; ?>
                <?php if ( $phone = get_field( 'phone', 'option' ) ) : ?>
                    <a class="phone" href="tel:+1<?php echo sanitize_number( $phone ); ?>">
                        <?php echo $phone; ?>
                    </a>
                <?php endif; ?>

                <div class="media-contact">
                    <h6 class="column-heading">
                        <?php _e( 'media contacts' ); ?>
                    </h6>
                    <span class="separator"></span>
                    <?php if ( $phone = get_field( 'phone', 'option' ) ) : ?>
                        <a class="phone" href="tel:+1<?php echo sanitize_number( $phone ); ?>">
                            <?php echo $phone; ?>
                        </a>
                    <?php endif; ?>
                    <span class="separator"></span>
                    <?php if ( $email = get_field( 'email', 'option' ) ) : ?>
                        <a class="email" href="mailto:marketing@wordandbrowncompanies.com?Subject=Media%20Contact">
                            <?php echo $email; ?>
                        </a>
                    <?php endif; ?>
                </div>

            </div>
            <div class="cell large-3 footer__sp">
                <?php if ( $socials_heading = get_field( 'socials_heading', 'options' ) ) : ?>
                    <h6 class="column-heading">
                        <?php echo $socials_heading; ?>
                    </h6>
                <?php endif; ?>
                <?php get_template_part( 'parts/socials' ); // Social profiles?>
            </div>

            <div class="cell">
                <div class="certifications">
                    <?php if ( have_rows( 'certificates', 'options' ) ) : ?>
                        <?php while ( have_rows( 'certificates', 'options' ) ) : the_row();
                            $certificate_image = get_sub_field( 'certificate_image' );
                            $certificate_link  = get_sub_field( 'certificate_link' );
                            ?>
                            <?php if ( $certificate_link ) : ?>
                                <a href="<?php echo $certificate_link; ?>"
                                   target="_blank"
                                   class="certificate">
                                    <?php echo wp_get_attachment_image( $certificate_image['id'], 'medium' ); ?>
                                </a>
                            <?php else: ?>
                                <div class="certificate">
                                    <?php echo wp_get_attachment_image( $certificate_image['id'], 'medium' ); ?>
                                </div>
                            <?php endif; ?>

                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="grid-container">
        <div class="footer__copy">
            <div class="grid-x">
                <div class="cell large-7">
                    <?php if ( $copyright = get_field( 'copyright', 'options' ) ) : ?>
                        <?php echo $copyright; ?>
                    <?php endif; ?>
                </div>
                <div class="cell large-5">
                    <div class="footer-links">
                        <?php if ( have_rows( 'footer_links', 'options' ) ) : ?>
                            <?php while ( have_rows( 'footer_links', 'options' ) ) : the_row();
                                $page_link = get_sub_field( 'page_link' )
                                ?>
                                <a href="<?php echo $page_link['url']; ?>">
                                    <?php echo $page_link['title']; ?>
                                </a>

                            <?php endwhile; ?>
                        <?php endif; ?>
                        <div class="scroll-to-up">
                            <div style="text-align: right;" class="container">
                                <div class="up_arrow_div">
                                    <i class="fa-solid fa-chevron-up"></i></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</footer>
<!-- END of footer -->

<?php wp_footer(); ?>
</body>
</html>
