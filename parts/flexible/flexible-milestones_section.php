<?php
$section_title = get_sub_field( 'section_title' );
$section_bg    = get_sub_field( 'section_bg' );
?>

<!-- BEGIN  milestones-section -->
<section class="milestones-section" <?php bg( $section_bg['url'], 'full_hd' ) ?>>
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell">
                <?php if ( $section_title ) : ?>
                    <h2 class="section-title">
                        <?php echo $section_title; ?>
                    </h2>
                <?php endif; ?>
            </div>

            <div class='milestones-tabs-row'>
                <?php if ( have_rows( 'milestones' ) ) :
                    $counter = 1;
                    $couner_content = 1; ?>
                    <div class="tabs" data-active-collapse="true" data-tabs id="collapsing-tabs">
                        <?php while ( have_rows( 'milestones' ) ) : the_row();
                            $tabs_title = get_sub_field( 'milestone_title' );
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

            <?php if ( have_rows( 'milestones' ) ) : ?>
                <div class="tabs-content" data-tabs-content="collapsing-tabs">
                    <?php while ( have_rows( 'milestones' ) ) :
                        the_row(); ?>
                        <div class="tabs-panel <?php echo $couner_content == 1 ? 'is-active' : '' ?>"
                             id="panel-<?php echo $couner_content; ?>">
                            <div class="tabs-panel__content">
                                <?php if ( have_rows( 'milestone' ) ) : ?>
                                    <?php while ( have_rows( 'milestone' ) ) :
                                        the_row();
                                        $content = get_sub_field( 'milestone_content' );
                                        ?>
                                        <div class="tabs-panel__content-item">
                                            <?php echo $content; ?>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php $couner_content ++; ?>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>
<!-- END  milestones-section -->
