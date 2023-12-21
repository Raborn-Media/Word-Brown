<?php
$section_content = get_sub_field( 'section_content' );
?>

<!-- BEGIN  full-width-content-section -->
<section class="full-width-content-section">
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell">
                <?php if ( have_rows( 'logos' ) ) : ?>
                    <?php while ( have_rows( 'logos' ) ) : the_row();
                        $logo_1 = get_sub_field( 'logo_1' );
                        $logo_2 = get_sub_field( 'logo_2' );
                        ?>

                        <?php if ( $logo_1 || $logo_2 )  :
                            ?>
                            <div class="logos">
                                <?php if ( $logo_1 ) :
                                    $logo_1_name = $logo_1['name'];
                                    ?>
                                    <div class="logo-1 logo">
                                        <?php display_svg( $logo_1, $logo_1_name ) ?>
                                    </div>
                                <?php endif; ?>

                                <?php if ( $logo_2 ) :
                                    $logo_2_name = $logo_2['name'];
                                    ?>
                                    <div class="logo-1 logo">
                                        <?php display_svg( $logo_2, $logo_2_name ) ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <?php if ( $section_content ) : ?>
                            <div class="section-content">
                                <?php echo $section_content ?>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- END  full-width-content-section -->
