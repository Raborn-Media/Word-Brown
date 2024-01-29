<?php
$page_title = get_sub_field( 'page_title' );
?>
<!-- BEGIN  site-map-section -->
<section class="site-map-section">
    <div class="grid-container site-map-section__container">
        <div class="grid-x grid-margin-x">
            <div class="cell">
                <?php if ( $page_title ) : ?>
                    <h2 class="section-title">
                        <?php echo $page_title; ?>
                    </h2>
                <?php endif; ?>
            </div>
        </div>
        <?php if ( have_rows( 'links_columns' ) ) : ?>
            <div class="grid-x">
                <?php while ( have_rows( 'links_columns' ) ) : the_row();
                    $column_title = get_sub_field( 'column_title' );
                    ?>
                    <div class="cell large-3 medium-6 small-12 links-column <?php echo sanitize_title($column_title)?>">

                        <h4>
                            <?php echo $column_title; ?>
                        </h4>
                        <?php if ( have_rows( 'column_links' ) ) : ?>
                            <div class="column-links">
                                <?php while ( have_rows( 'column_links' ) ) : the_row();
                                    $link = get_sub_field( 'link' );
                                    ?>
                                    <a href="<?php echo $link['url']; ?>"
                                    class="<?php echo sanitize_title($column_title);?>-link">
                                        <?php echo $link['title']; ?>
                                    </a>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
