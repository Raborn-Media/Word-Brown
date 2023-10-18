<?php
$cta_title  = get_sub_field( 'cta_title' );
$cta_button = get_sub_field( 'cta_button' );
?>

<!-- BEGIN  cta-section -->
<section class="cta-section">
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell">
                <div class="cta-section__content">
                    <?php if ( $cta_title ) : ?>
                        <h2 class="cta-title">
                            <?php echo $cta_title; ?>
                        </h2>
                    <?php endif; ?>

                    <?php if ( $cta_button ) : ?>
                        <a href="<?php echo $cta_button['url']; ?>"
                           class="button">
                            <?php echo $cta_button['title']; ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END  cta-section -->
