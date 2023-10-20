<?php
$section_content = get_sub_field( 'section_content' );
$section_image   = get_sub_field( 'section_image' );
$section_button  = get_sub_field( 'section_button' );
?>

<!-- BEGIN  image-with-text-section -->
<section class="image-with-text-section">
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell large-6 content-col">
                <?php if ( $section_content ) : ?>
                    <article>
                        <?php echo $section_content; ?>
                        <?php if ( $section_button ) : ?>
                            <a class="button" href="<?php echo $section_button['url']; ?>">
                                <?php echo $section_button['title']; ?>
                            </a>
                        <?php endif; ?>
                    </article>
                <?php endif; ?>
            </div>
            <div class="cell large-6 image-col">
                <?php if ( $section_image ) : ?>
                    <div class="section-image-wrap">
                        <?php echo wp_get_attachment_image( $section_image['id'], 'full_hd', false, [ 'class' => 'section-image' ] ); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- END  image-with-text-section -->
