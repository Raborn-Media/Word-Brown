<?php
$section_content = get_sub_field( 'section_content' );
?>

<!-- BEGIN  full-width-content-section -->
<section class="full-width-content-section">
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell">
                <?php if ( have_rows( 'logos' ) ) : ?>
                    <?php while ( have_rows( 'logos' ) ) : the_row();
                        $logo_1 = get_sub_field( 'logo_1' );
                        $logo_2 = get_sub_field( 'logo_2' );
                        ?>

                        <?php if ( $logo_1 || $logo_2 )  : ?>
                            <div class="logos">
                                <?php if ( $logo_1 ) : ?>
                                    <div class="logo-1 logo">
                                        <?php echo wp_get_attachment_image( $logo_1['id'], 'large' ); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ( $logo_2 ) : ?>
                                    <div class="logo-2 logo">
                                        <?php echo wp_get_attachment_image( $logo_2['id'], 'large' ); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <?php if ( $section_content ) : ?>
                            <div class="section-content">
                                <?php echo $section_content ?>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- END  full-width-content-section -->
