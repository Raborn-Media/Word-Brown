<?php
$section_title       = get_sub_field( 'section_title' );
$section_text        = get_sub_field( 'section_text' );
$section_logo        = get_sub_field( 'section_logo' );
$section_subtitle    = get_sub_field( 'section_subtitle' );
$logos_display_style = get_sub_field( 'logos_display_style' );
?>

<!-- BEGIN  family-of-companies-section -->
<section class="family-of-companies-section">
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell">
                <?php if ( $section_title ) : ?>
                    <h2 class="section-title">
                        <?php echo $section_title; ?>
                    </h2>
                <?php endif; ?>
                <?php if ( $section_text ) : ?>
                    <article class="section-text">
                        <?php echo $section_text; ?>
                    </article>
                <?php endif; ?>
                <?php if ( $section_logo ) : ?>
                    <div class="section-logo">
                        <?php echo wp_get_attachment_image( $section_logo['id'], 'large' ); ?>
                    </div>
                <?php endif; ?>

                <?php if ( have_rows( 'companies_list' ) ) : ?>
                    <div class="companies-list <?php echo $logos_display_style == true ? '' : 'black-logos-container'; ?>">
                        <?php while ( have_rows( 'companies_list' ) ) : the_row();
                            $company_logo      = get_sub_field( 'company_logo' );
                            $company_link      = get_sub_field( 'company_link' );
                            ?>
                            <?php if ( $company_logo ) :
                                $company_logo_name = $company_logo['name'];
                                ?>
                                <a href="<?php echo $company_link; ?>"
                                   target="_self"
                                   class="companies-list__item <?php echo $logos_display_style == true ? '' : 'black-logos'; ?>">
                                    <?php display_svg( $company_logo, $company_logo_name, 'small' ) ?>
                                </a>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- END  family-of-companies-section -->
