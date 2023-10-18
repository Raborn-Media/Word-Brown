<?php
$hero_bg   = get_sub_field( 'hero_bg' );
$hero_text = get_sub_field( 'hero_text' );
?>

<!-- BEGIN  hero-section -->
<section class="hero-section" <?php bg( $hero_bg['url'] ); ?>>
    <div class="hero-text">
        <h4 class="page-title">
            <?php the_title(); ?>
        </h4>
        <?php echo $hero_text; ?>
    </div>
</section>
<!-- END  hero-section -->
