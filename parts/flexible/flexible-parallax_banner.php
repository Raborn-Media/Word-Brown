<?php
$banner_image = get_sub_field('banner_image');
?>

<!-- BEGIN  parallax-banner-section -->
<section class="parallax-banner-section jarallax">
<!--        --><?php //echo wp_get_attachment_image($banner_image['id'], 'full_hd', false, ['class' => 'jarallax-img']); ?>
    <?php
    $banner_image_src = wp_get_attachment_image_src($banner_image['id'], 'full_hd', false);
    if ($banner_image_src) {
        $image_url = $banner_image_src[0];
        ?>
        <img
            src="<?php echo esc_url($image_url); ?>"
            width="1903"
            height="870"
            class="jarallax-img"
            loading="eager"
            alt=""
            decoding="async"
            fetchpriority="high"
            style="object-fit: cover; object-position: 50% 50%; max-width: none; position: fixed; top: 0px; left: 0px; width: 408px; overflow: hidden; pointer-events: none; transform-style: preserve-3d; backface-visibility: hidden; margin-top: 101.5px; transform: translate3d(0px, 73px, 0px);"
            data-ll-status="loaded"
        >
        <?php
    }
    ?>
</section>
<!-- END  parallax-banner-section -->
