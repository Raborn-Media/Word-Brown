<?php
$section_title  = get_sub_field( 'section_title' );
$section_text   = get_sub_field( 'section_text' );
$section_button = get_sub_field( 'section_button' );
?>

<!-- BEGIN  career-opportunities-section -->
<section class="career-opportunities-section">
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
            </div>
            <?php if ( have_rows( 'opportunities_list' ) ) : ?>
                <div class="cell">
                    <div class="opportunities-list">
                        <?php while ( have_rows( 'opportunities_list' ) ) : the_row();
                            $opportunity_image = get_sub_field( 'opportunity_image' );
                            $opportunity_title = get_sub_field( 'opportunity_title' );
                            ?>
                            <div class="opportunity">
                                <?php if ( $opportunity_image ) : ?>
                                    <?php echo wp_get_attachment_image( $opportunity_image['id'], 'medium' ); ?>
                                <?php endif; ?>
                                <?php if ( $opportunity_title ) : ?>
                                    <p>
                                        <?php echo $opportunity_title; ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ( $section_button ) : ?>
                <div class="cell">
                    <a href="<?php echo $section_button['url']; ?>"
                       class="button">
                        <?php echo $section_button['title']; ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- END  career-opportunities-section -->
