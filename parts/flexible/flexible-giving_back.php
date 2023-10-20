<?php
$section_title = get_sub_field( 'section_title' );
$section_text  = get_sub_field( 'section_text' );
$quotes_list   = get_sub_field( 'quotes_list' );
?>

<!-- BEGIN  giving-back-section -->
<section class="giving-back-section">
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

                <?php
                $top_located_quote = get_sub_field( 'top_located_quote' );
                if ( $top_located_quote ): ?>
                    <div class="top-located-quote">
                        <?php foreach ( $top_located_quote as $featured_post ):
                            setup_postdata( $featured_post );
                            $title        = get_the_title( $featured_post->ID );
                            $post_img     = get_the_post_thumbnail( $featured_post->ID );
                            $custom_field = get_field( 'quote_author_line', $featured_post->ID );
                            ?>
                            <div class="top-located-quote__image">
                                <?php echo $post_img; ?>
                            </div>
                            <div class="top-located-quote__text">
                                <h4><?php echo esc_html( $title ); ?></h4>
                                <article><?php the_content( $featured_post->ID ); ?></article>
                                <span<?php echo esc_html( $custom_field ); ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <?php
                    wp_reset_postdata();
                endif; ?>
            </div>
        </div>
        <?php
        $quotes_list = get_sub_field( 'quotes_list' );
        if ( $quotes_list ): ?>
            <div class="grid-x">
                <div class="cell">
                    <div class="quotes-list carousel">
                        <?php foreach ( $quotes_list as $quote ):
                            setup_postdata( $quote );
                            $title             = get_the_title( $quote->ID );
                            $post_img          = get_the_post_thumbnail( $quote->ID );
                            $quote_author_line = get_field( 'quote_author_line', $quote->ID );

                            ?>
                            <div class="quote">
                                <div class="quote-img">
                                    <?php echo $post_img; ?>
                                </div>
                                <div class="quote__content matchHeight">
                                    <h4><?php echo esc_html( $title ); ?></h4>
                                    <div class="text"><?php the_content(); ?></div>
                                    <p class="author-info"><?php echo $quote_author_line; ?></p>
                                </div>
                            </div>
                        <?php endforeach;
                        ?>
                    </div>
                </div>
            </div>
            <?php
            wp_reset_postdata();
        endif; ?>
    </div>
    </div>
</section>
<!-- END  giving-back-section -->
