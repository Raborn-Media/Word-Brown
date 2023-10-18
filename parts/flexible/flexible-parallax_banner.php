<?php
$banner_image = get_sub_field('banner_image');
?>

<!-- BEGIN  parallax-banner-section -->
<section class="parallax-banner-section jarallax">
        <?php echo wp_get_attachment_image( $banner_image['id'], 'fullhd', false, ['class' => 'jarallax-img'] ); ?>
</section>
<!-- END  parallax-banner-section -->
