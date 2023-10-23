<?php
?>

<!-- BEGIN  persona-section -->
<section class="persona-section">
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell">
                <div class="tabs">
                    <?php if ( have_rows( 'persona_tabs' ) ) :
                        $counter = 1;
                        $couner_content = 1; ?>
                        <div class="tabs" data-active-collapse="true" data-tabs id="collapsing-tabs">
                            <?php while ( have_rows( 'persona_tabs' ) ) : the_row();
                                $tabs_title = get_sub_field( 'tab_title' );
                                ?>
                                <div class="tabs-title <?php echo $counter == 1 ? 'is-active' : '' ?>">
                                    <a href="#panel-<?php echo $counter ?>"
                                       aria-selected="<?php echo $counter == 1 ? 'true' : '' ?>"
                                    ><?php echo $tabs_title; ?> </a><?php ?>
                                </div>
                                <?php $counter ++; ?>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if ( have_rows( 'persona_tabs' ) ) : ?>
                    <div class="tabs-content" data-tabs-content="collapsing-tabs">
                        <?php while ( have_rows( 'persona_tabs' ) ) :
                            the_row();
                            $tab_text  = get_sub_field( 'tab_text' );
                            $tab_image = get_sub_field( 'tab_image' );
                            $tab_quote = get_sub_field( 'tab_quote' );
                            ?>
                            <div class="tabs-panel <?php echo $couner_content == 1 ? 'is-active' : '' ?>"
                                 id="panel-<?php echo $couner_content; ?>">
                                <div class="tabs-panel__content grid-x">
                                    <div class="tab-text large-6 cell">
                                        <?php echo $tab_text ?>
                                    </div>
                                    <div class="tab-image large-6 cell">
                                        <?php echo wp_get_attachment_image( $tab_image['id'], 'large' ); ?>
                                    </div>
                                    <div class="tab-quote">
                                        <?php echo $tab_quote ?>
                                    </div>
                                </div>
                            </div>
                            <?php $couner_content ++; ?>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- END  persona-section -->
