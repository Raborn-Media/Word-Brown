<?php
$section_subtitle = get_sub_field( 'section_subtitle' );
$section_title    = get_sub_field( 'section_title' );
$section_text     = get_sub_field( 'section_text' );
?>

<!-- BEGIN  centered-text-section -->
<section class="centered-text-section">
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell">
                <?php if ( $section_subtitle ) : ?>
                    <h5 class="section-subtitle">
                        <?php echo $section_subtitle; ?>
                    </h5>
                <?php endif; ?>
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
            </div>
        </div>
    </div>
</section>
<!-- END  centered-text-section -->
