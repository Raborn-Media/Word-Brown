<?php
$section_title   = get_sub_field( 'section_title' );
$section_text    = get_sub_field( 'section_text' );
$section_gallery = get_sub_field( 'section_gallery' );
?>

<!-- BEGIN  partnerships-section -->
<section class="partnerships-section">
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

                <?php
                $size = 'full'; // (thumbnail, medium, large, full or custom size)
                $i    = 1;
                if ( $section_gallery ): ?>
                    <div class="section-gallery ease-order">
                        <?php foreach ( $section_gallery as $image ): ?>
                            <div class="fade-in ease-order__item section-gallery__item image-<?php echo $i; ?>" data-scroll>
                                <?php echo wp_get_attachment_image( $image['id'], $size); ?>
                            </div>
                            <?php
                            $i ++;
                        endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- END  partnerships-section -->
