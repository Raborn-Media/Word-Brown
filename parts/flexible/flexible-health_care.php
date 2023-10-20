<?php
$section_title  = get_sub_field( 'section_title' );
$section_text   = get_sub_field( 'section_text' );
$section_button = get_sub_field( 'section_button' );
$section_image = get_sub_field( 'section_image' );
?>

<!-- BEGIN  health-care -->
<section class="health-care">
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
                <?php if ( $section_button ) : ?>
                    <a href="<?php echo $section_button['url'] ?>"
                       class="button">
                        <?php echo $section_button['title']; ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php if($section_image): ?>
        <?php echo wp_get_attachment_image( $section_image['id'], 'full_hd', false, ['class' => 'section-image'] ); ?>
    <?php endif; ?>
</section>
<!-- END  health-care -->
