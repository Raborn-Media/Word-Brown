<?php
$section_content = get_sub_field( 'section_text' );
$section_image   = get_sub_field( 'section_image' );
?>

<!-- BEGIN  partner-information-section -->
<section class="partner-information-section">
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell large-5 content-col">
                <?php if ( $section_content ) : ?>
                    <article>
                        <?php echo $section_content; ?>
                    </article>
                <?php endif; ?>
            </div>
            <div class="cell large-7 image-col">
                <?php if ( $section_image ) : ?>
                    <div class="section-image-wrap">
                        <?php echo wp_get_attachment_image( $section_image['id'], 'full_hd', false, [ 'class' => 'section-image' ] ); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- END  partner-information-section -->
