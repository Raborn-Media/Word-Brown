<?php
$brands_assets_section_title = get_field( 'brands_assets_section_title' );
$brands_assets_section_text  = get_field( 'brands_assets_section_text' );
?>

<!-- BEGIN  brand-assets-section -->
<div class="brand-assets-section">
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell">
                <?php if ( $brands_assets_section_title ) : ?>
                    <h2 class="section-title">
                        <?php echo $brands_assets_section_title; ?>
                    </h2>
                <?php endif; ?>
                <?php if ( $brands_assets_section_text ) : ?>
                    <article class="section-text">
                        <?php echo $brands_assets_section_text; ?>
                    </article>
                <?php endif; ?>

                <?php if ( have_rows( 'logos_list' ) ) : ?>
                    <div class="logos-list">
                        <?php while ( have_rows( 'logos_list' ) ) : the_row();
                            $list_item_title = get_sub_field( 'list_item_title' );
                            $list_item_logo  = get_sub_field( 'list_item_logo' );
                            ?>
                            <div class="logos-list__item">
                                <?php if ( $list_item_title ) : ?>
                                    <h5 class="logo-title">
                                        <?php echo $list_item_title; ?>
                                    </h5>
                                <?php endif; ?>
                                <div class="logo matchHeight">
                                    <?php echo wp_get_attachment_image( $list_item_logo['id'], 'large' ); ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- END  brand-assets-section -->
