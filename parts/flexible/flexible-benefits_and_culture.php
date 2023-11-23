<?php
$section_title   = get_sub_field( 'section_title' );
$benefits_text   = get_sub_field( 'benefits_text' );
$culture_text    = get_sub_field( 'culture_text' );
$section_gallery = get_sub_field( 'section_gallery' );
?>

<!-- BEGIN  benefits-and-culture-section -->
<section class="benefits-and-culture-section">
    <div class="grid-container">
        <div class="grid-x">
            <?php if ( $section_title ) : ?>
                <div class="cell">
                    <h2 class="section-title">
                        <?php echo $section_title; ?>
                    </h2>
                </div>
            <?php endif; ?>
            <div class="cell">
                <?php if ( $benefits_text ) : ?>
                    <div class="benefits-text">
                        <article>
                            <?php echo $benefits_text; ?>
                        </article>
                    </div>
                <?php endif; ?>
            </div>

            <div class="cell gallery-col">
                <?php if( $section_gallery ): ?>
                <div class="gallery">
                    <?php foreach( $section_gallery as $image ): ?>
                        <div class="gallery__image">
                            <?php echo wp_get_attachment_image( $image['id'], 'large', false, ['data-no-lazy' => '1'] ); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>

            <div class="cell">
                <?php if ( $culture_text ) : ?>
                    <div class="culture-text">
                        <article>
                            <?php echo $culture_text; ?>
                        </article>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- END  benefits-and-culture-section -->
