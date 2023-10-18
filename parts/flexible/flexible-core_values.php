<?php
$section_title = get_sub_field( 'section_title' );
$section_text  = get_sub_field( 'section_text' );
?>

<!-- BEGIN  core-values-section -->
<section class="core-values-section">
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

                <?php if ( have_rows( 'values_list' ) ) : ?>
                    <div class="values-list">
                        <?php while ( have_rows( 'values_list' ) ) : the_row();
                            $value_hover_text = get_sub_field( 'value_hover_text' );
                            $value_title      = get_sub_field( 'value_title' );
                            $value_icon       = get_sub_field( 'value_icon' );
                            ?>
                            <div class="values-list__item">
                                <?php if ( $value_icon ) : ?>
                                    <?php echo wp_get_attachment_image( $value_icon['id'], 'large' ); ?>
                                <?php endif; ?>

                                <?php if ( $value_title ) : ?>
                                    <div class="value-title">
                                        <?php echo $value_title; ?>
                                    </div>
                                <?php endif; ?>

                                <?php if ( $value_hover_text ) : ?>
                                    <div class="value-hover-text">
                                        <?php echo $value_hover_text; ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- END  core-values-section -->
