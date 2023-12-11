<?php
/**
 * Template Name: Contact Page
 */

get_header(); ?>

<!-- BEGIN of main content -->
<?php if ( have_rows( 'flexible' ) ) : ?>
    <?php while ( have_rows( 'flexible' ) ) :
        the_row();
        $layout = get_row_layout(); ?>
        <?php get_template_part( 'parts/flexible/flexible', $layout );
        ?>
    <?php endwhile; ?>
<?php endif; ?>


<?php
$contact_information_title = get_field( 'contact_information_title' );
$media_contact             = get_field( 'media_contact' );
?>

<!-- BEGIN  contact-information-section -->
<section class="contact-information-section">
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell">
                <?php if ( $contact_information_title ) : ?>
                    <h2 class="section-title">
                        <?php echo $contact_information_title; ?>
                    </h2>
                <?php endif; ?>

                <?php if ( have_rows( 'companies_list' ) ) : ?>
                    <div class="companies-list">
                        <?php while ( have_rows( 'companies_list' ) ) :
                            the_row();
                            $company_logo         = get_sub_field( 'company_logo' );
                            $company_contact_info = get_sub_field( 'company_contact_info' );
                            ?>
                            <div class="companies-list__item">
                                <div class="company-logo">
                                    <div class="image-wrap">
<!--                                        --><?php //echo wp_get_attachment_image( $company_logo['id'], 'large' ); ?>
                                        <?php echo display_svg( $company_logo, $company_logo['name'] ); ?>
                                    </div>
                                </div>
                                <article class="company-contact-info">
                                    <?php echo $company_contact_info; ?>
                                </article>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- END  contact-information-section -->

<!-- BEGIN  contact-section -->
<section class="contact-section">
    <div class="grid-container fluid">
        <div class="grid-x">
            <div class="cell large-5 media-contact-col">
                <article class="company-contact-info">
                    <?php echo $media_contact; ?>
                </article>

                <?php if ( have_rows( 'contact_socials' ) ) : ?>
                    <div class="contact-socials">
                        <p>
                            <?php _e( 'CONNECT WITH US ON SOCIAL' ); ?>
                        </p>
                        <?php while ( have_rows( 'contact_socials' ) ) :
                            the_row(); ?>
                            <?php $social_network = get_sub_field( 'social_network' ); ?>
                            <div class="contact-socials__item">
                                <a class="contact-socials__link "
                                   href="<?php the_sub_field( 'social_profile' ); ?>"
                                   target="_blank"
                                   aria-label="<?php echo $social_network['label']; ?>"
                                   rel="noopener">
                                        <span aria-hidden="true"
                                              class="fab fa-<?php echo $social_network['value']; ?>"></span>
                                    <span>
                                        <?php echo $social_network['label']; ?>
                                    </span>
                                </a>

                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="cell large-7 form-col">
                <?php $contact_form = get_field( 'contact_form' ); ?>
                <div class="contact__form">
                    <?php echo do_shortcode( "[gravityform id='{$contact_form['id']}' title='true' description='false' ajax='true']" ); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END  contact-section -->

<?php get_footer(); ?>
