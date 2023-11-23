<?php
$hero_bg         = get_sub_field( 'hero_bg' );
$hero_text       = get_sub_field( 'hero_text' );
$hero_gold_title = get_sub_field( 'hero_gold_title' );
?>

<!-- BEGIN  hero-section -->
<section class="hero-section" <?php bg( $hero_bg['url'] ); ?>>
    <div class="grid-container">
        <div class="hero-text">
            <h4 class="page-title">
                <?php if ( $hero_gold_title ) : ?>
                    <?php echo $hero_gold_title ?>
                <?php else:
                    the_title();
                endif; ?>
            </h4>
            <?php echo $hero_text; ?>
        </div>
    </div>
</section>
<!-- END  hero-section -->
