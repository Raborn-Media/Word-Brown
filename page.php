<?php
/**
 * Page
 */
get_header(); ?>

<!-- BEGIN of main content -->
<?php if (have_rows('flexible')) : ?>
    <?php while (have_rows('flexible')) :
        the_row();
        $layout = get_row_layout(); ?>
        <?php get_template_part('parts/flexible/flexible', $layout);
        ?>
    <?php endwhile; ?>
<?php endif;?>
<!-- END of main content -->

<?php get_footer(); ?>
