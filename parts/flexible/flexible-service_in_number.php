<?php
$section_title = get_sub_field( 'section_title' );
?>

<!-- BEGIN  service-in-number-section -->
<section class="service-in-number-section">
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell">
                <?php if ( $section_title ) : ?>
                    <h2 class="section-title">
                        <?php echo $section_title; ?>
                    </h2>
                <?php endif; ?>

                <?php if ( have_rows( 'services_list' ) ) : ?>
                    <div class="services-list">
                        <?php while ( have_rows( 'services_list' ) ) : the_row();
                            $service_icon    = get_sub_field( 'service_icon' );
                            $service_numbers = get_sub_field( 'service_numbers' );
                            $service_title   = get_sub_field( 'service_title' );
                            $service_class   = strtolower( str_replace( ' ', '-', $service_title ) );
                            ?>
                            <div class="services-list__item <?php echo $service_class; ?>">
                                <?php echo wp_get_attachment_image( $service_icon['id'], 'large' ); ?>
                                <h3>
                                    <?php echo $service_numbers; ?>
                                </h3>
                                <p>
                                    <?php echo $service_title; ?>
                                </p>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- END  service-in-number-section -->
