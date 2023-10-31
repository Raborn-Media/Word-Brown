<?php

/**
 * Template Name: News
 */
global $varCurrentPage;
$varCurrentPage = "page-latest-news";

get_header();
?>

    <!-- BEGIN of main content -->
<?php if ( have_rows( 'flexible' ) ) : ?>
    <?php while ( have_rows( 'flexible' ) ) :
        the_row();
        $layout = get_row_layout(); ?>
        <?php get_template_part( 'parts/flexible/flexible', 'hero' );
        ?>
    <?php endwhile; ?>
<?php endif; ?>
    <!-- END of main content -->
    <div class="media-wrap">
        <?php get_template_part( 'parts/news', 'press' ); ?>
    </div>

    <!-- BEGIN  partnering-section -->
<?php if ( $section_form = get_field( 'section_form' ) ) : ?>
    <section class="partnering-section">
        <div class="grid-container">
            <div class="grid-x">
                <div class="cell">
                    <?php echo do_shortcode( "[gravityform id='{$section_form['id']}' title='true' description='false' ajax='true']" ); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
    <!-- END  partnering-section -->
<?php
get_footer();
