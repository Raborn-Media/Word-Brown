<?php
$section_title = get_sub_field( 'section_title' );
$section_text  = get_sub_field( 'section_text' );
?>
<div class="grid-container">
    <section id="culture">
        <div class="row grid-x">
            <?php if ( $section_title ) : ?>
                <div class="cell">
                    <h2 class="section-title">
                        <?php echo $section_title; ?>
                    </h2>
                </div>
            <?php endif; ?>
            <div class="cell">
                <?php if ( $section_text ) : ?>
                    <div class="section-text">
                        <article>
                            <?php echo $section_text; ?>
                        </article>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Culture of Excellence, Mobile -->
        <div id="culture-mobile" class="hide-for-large">
            <div class="row grid-x">
                <div class="small-12 cell">
                    <div class="small-12 large-12 cell">
                        <?php if ( have_rows( 'first_animated_text' ) ) : ?>
                            <?php while ( have_rows( 'first_animated_text' ) ) : the_row();
                                $first_word           = get_sub_field( 'first_word' );
                                $first_animated_word  = get_sub_field( '1st_animated_word' );
                                $second_animated_word = get_sub_field( '2nd_animated_word' );
                                $third_animated_word  = get_sub_field( '3rd_animated_word' );
                                $last_word            = get_sub_field( 'last_word' );
                                ?>
                                <div class="container mobile-top-words-container">
                                    <div class="words-wrap mobile-top-words-wrap">
                                        <div class="word">
                                            <span><?php echo $first_word; ?>&nbsp;</span>
                                        </div>
                                        <div class="word dynamic">

								        <span class="word-wrap">
                                            <?php echo $first_animated_word; ?>
                                        </span>

                                            <span class="word-wrap">
                                            <?php echo $second_animated_word; ?>
                                        </span>

                                            <span class="word-wrap">
                                            <?php echo $third_animated_word; ?>
                                        </span>

                                        </div>
                                        <div class="word">
                                            <span><?php echo $last_word; ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>

                    </div>
                    <?php if ( have_rows( 'right_column_images' ) ) : ?>
                        <?php while ( have_rows( 'right_column_images' ) ) : the_row();
                            $top_image = get_sub_field( 'top_image' );
                            ?>
                            <div class="container mobile-mid-top-image-container">
                                <div class="image-wrap mobile-mid-top-image-wrap">
                                    <?php echo wp_get_attachment_image( $top_image['id'], 'large' ); ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>

                    <?php if ( have_rows( 'middle_column_images' ) ) : ?>
                        <?php while ( have_rows( 'middle_column_images' ) ) : the_row();
                            $top_image    = get_sub_field( 'top_image' );
                            $second_image = get_sub_field( 'second_image' );
                            $third_image  = get_sub_field( 'third_image' );
                            $bottom_image = get_sub_field( 'bottom_image' );
                            ?>
                            <div class="container mobile-mid-second-image-container">
                                <div class="image-wrap mobile-mid-second-image-wrap">
                                    <?php echo wp_get_attachment_image( $top_image['id'], 'large' ); ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row grid-x">
                <div class="small-12 cell">
                    <?php if ( have_rows( 'second_animated_text' ) ) : ?>
                        <?php while ( have_rows( 'second_animated_text' ) ) : the_row();
                            $first_word           = get_sub_field( 'first_word' );
                            $first_animated_word  = get_sub_field( '1st_animated_word' );
                            $second_animated_word = get_sub_field( '2nd_animated_word' );
                            $third_animated_word  = get_sub_field( '3rd_animated_word' );
                            $last_word            = get_sub_field( 'last_word' );
                            ?>
                            <div class="container mobile-mid-words-container">
                                <div class="words-wrap mobile-mid-words-wrap">
                                    <div class="word">
                                        <span><?php echo $first_word; ?>&nbsp;</span>
                                    </div>
                                    <div class="word dynamic">

								        <span class="word-wrap">
                                            <?php echo $first_animated_word; ?>
                                        </span>

                                        <span class="word-wrap">
                                            <?php echo $second_animated_word; ?>
                                        </span>

                                        <span class="word-wrap">
                                            <?php echo $third_animated_word; ?>
                                        </span>

                                    </div>
                                    <div class="word">
                                        <span><?php echo $last_word; ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <?php if ( have_rows( 'middle_column_images' ) ) : ?>
                        <?php while ( have_rows( 'middle_column_images' ) ) : the_row();
                            $top_image    = get_sub_field( 'top_image' );
                            $second_image = get_sub_field( 'second_image' );
                            $third_image  = get_sub_field( 'third_image' );
                            $bottom_image = get_sub_field( 'bottom_image' );
                            ?>
                            <div class="container mobile-mid-third-image-container">
                                <div class="image-wrap mobile-mid-third-image-wrap">
                                    <?php echo wp_get_attachment_image( $third_image['id'], 'large' ); ?>
                                </div>
                            </div>
                            <div class="container mobile-mid-bottom-image-container">
                                <div class="image-wrap mobile-mid-bottom-image-wrap">
                                    <?php echo wp_get_attachment_image( $bottom_image['id'], 'large' ); ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- Culture of Excellence, Desktop -->

        <div id="culture-desktop" class="show-for-large culture-animation">
            <div class="row grid-x">
                <div class="small-12 large-4 cell">
                    <?php if ( have_rows( 'first_animated_text' ) ) : ?>
                        <?php while ( have_rows( 'first_animated_text' ) ) : the_row();
                            $first_word           = get_sub_field( 'first_word' );
                            $first_animated_word  = get_sub_field( '1st_animated_word' );
                            $second_animated_word = get_sub_field( '2nd_animated_word' );
                            $third_animated_word  = get_sub_field( '3rd_animated_word' );
                            $last_word            = get_sub_field( 'last_word' );
                            ?>

                            <div class="container top-words-container">
                                <div class="words-wrap top-words-wrap">
                                    <div class="word">
                                        <span><?php echo $first_word; ?>&nbsp;</span>
                                    </div>
                                    <div class="word dynamic">

								        <span class="word-wrap">
                                            <?php echo $first_animated_word; ?>
                                        </span>

                                        <span class="word-wrap">
                                            <?php echo $second_animated_word; ?>
                                        </span>

                                        <span class="word-wrap">
                                            <?php echo $third_animated_word; ?>
                                        </span>

                                    </div>
                                    <div class="word">
                                        <span><?php echo $last_word; ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>

                    <?php if ( have_rows( 'left_column_images' ) ) : ?>
                        <?php while ( have_rows( 'left_column_images' ) ) : the_row();
                            $top_image     = get_sub_field( 'top_image' );
                            $central_image = get_sub_field( 'central_image' );
                            $bottom_image  = get_sub_field( 'bottom_image' );
                            ?>
                            <div class="container left-top-image-container">
                                <div class="image-wrap left-top-image-wrap">
                                    <?php echo wp_get_attachment_image( $top_image['id'], 'large' ); ?>
                                </div>
                            </div>

                            <div class="container left-second-image-container">
                                <div class="image-wrap left-second-image-wrap">
                                    <?php echo wp_get_attachment_image( $central_image['id'], 'large' ); ?>
                                </div>
                            </div>
                            <div class="container left-third-image-container">
                                <div class="image-wrap left-third-image-wrap">
                                    <?php echo wp_get_attachment_image( $bottom_image['id'], 'large' ); ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <?php if ( have_rows( 'middle_column_images' ) ) : ?>
                    <?php while ( have_rows( 'middle_column_images' ) ) : the_row();
                        $top_image    = get_sub_field( 'top_image' );
                        $second_image = get_sub_field( 'second_image' );
                        $third_image  = get_sub_field( 'third_image' );
                        $bottom_image = get_sub_field( 'bottom_image' );
                        ?>

                        <div class="small-12 large-4 cell">
                            <div class="container mid-top-image-container">
                                <div class="image-wrap mid-top-image-wrap">
                                    <?php echo wp_get_attachment_image( $top_image['id'], 'large' ); ?>
                                </div>
                            </div>

                            <div class="container mid-second-image-container">
                                <div class="image-wrap mid-second-image-wrap">
                                    <?php echo wp_get_attachment_image( $second_image['id'], 'large' ); ?>
                                </div>
                            </div>

                            <div class="container mid-third-image-container">
                                <div class="image-wrap mid-third-image-wrap">
                                    <?php echo wp_get_attachment_image( $third_image['id'], 'large' ); ?>
                                </div>
                            </div>

                            <div class="container mid-bottom-image-container">
                                <div class="image-wrap mid-bottom-image-wrap">
                                    <?php echo wp_get_attachment_image( $bottom_image['id'], 'large' ); ?>
                                </div>
                            </div>

                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                <div class="small-12 large-4 cell right-col">
                    <?php if ( have_rows( 'right_column_images' ) ) : ?>
                        <?php while ( have_rows( 'right_column_images' ) ) : the_row();
                            $top_image = get_sub_field( 'top_image' );
                            ?>
                            <div class="container right-top-image-container">
                                <div class="image-wrap right-top-image-wrap">
                                    <?php echo wp_get_attachment_image( $top_image['id'], 'large' ); ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>

                    <?php if ( have_rows( 'second_animated_text' ) ) : ?>
                        <?php while ( have_rows( 'second_animated_text' ) ) : the_row();
                            $first_word           = get_sub_field( 'first_word' );
                            $first_animated_word  = get_sub_field( '1st_animated_word' );
                            $second_animated_word = get_sub_field( '2nd_animated_word' );
                            $third_animated_word  = get_sub_field( '3rd_animated_word' );
                            $last_word            = get_sub_field( 'last_word' );
                            ?>

                            <div class="container mid-words-container">
                                <div class="words-wrap mid-words-wrap">
                                    <div class="word">
                                        <span><?php echo $first_word; ?>&nbsp;</span>
                                    </div>
                                    <div class="word dynamic">

								        <span class="word-wrap">
                                            <?php echo $first_animated_word; ?>
                                        </span>

                                        <span class="word-wrap">
                                            <?php echo $second_animated_word; ?>
                                        </span>

                                        <span class="word-wrap">
                                            <?php echo $third_animated_word; ?>
                                        </span>

                                    </div>
                                    <div class="word">
                                        <span><?php echo $last_word; ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <?php if ( have_rows( 'right_column_images' ) ) : ?>
                        <?php while ( have_rows( 'right_column_images' ) ) : the_row();
                            $central_image = get_sub_field( 'central_image' );
                            $bottom_image  = get_sub_field( 'bottom_image' );
                            ?>
                            <div class="container right-second-image-container">
                                <div class="image-wrap right-second-image-wrap">
                                    <?php echo wp_get_attachment_image( $central_image['id'], 'large' ); ?>
                                </div>
                            </div>

                            <div class="container right-third-image-container">
                                <div class="image-wrap right-third-image-wrap">
                                    <?php echo wp_get_attachment_image( $bottom_image['id'], 'large' ); ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row grid-x">
                <div class="small-12 large-4 cell">
                    <?php if ( have_rows( 'third_animated_text' ) ) : ?>
                        <?php while ( have_rows( 'third_animated_text' ) ) : the_row();
                            $first_word           = get_sub_field( 'first_word' );
                            $first_animated_word  = get_sub_field( '1st_animated_word' );
                            $second_animated_word = get_sub_field( '2nd_animated_word' );
                            $third_animated_word  = get_sub_field( '3rd_animated_word' );
//                $last_word            = get_sub_field( 'last_word' );
                            ?>
                            <div class="container bottom-words-container">
                                <div class="words-wrap bottom-words-wrap">
                                    <div class="word">
                                        <span><?php echo $first_word; ?>&nbsp;</span>
                                    </div>
                                    <div class="word dynamic">

                                        <span class="word-wrap">
                                            <?php echo $first_animated_word; ?>
                                        </span>

                                        <span class="word-wrap">
                                            <?php echo $second_animated_word; ?>
                                        </span>

                                        <span class="word-wrap">
                                            <?php echo $third_animated_word; ?>
                                        </span>

                                    </div>

                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <div class="small-12 large-8 cell">
                    <?php if ( $bottom_text_image = get_sub_field( 'bottom_text_image' ) ) : ?>
                        <div class="container bottom-first-image-container">
                            <div class="image-wrap bottom-first-image-wrap">
                                <?php echo wp_get_attachment_image( $bottom_text_image['id'], 'full_hd' ); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row grid-x">
                <div class="small-12 large-12 cell">
                    <?php if ( $bottom_section_image = get_sub_field( 'bottom_section_image' ) ) : ?>
                        <div class="container bottom-second-image-container">
                            <div class="image-wrap bottom-second-image-wrap">
                                <?php echo wp_get_attachment_image( $bottom_section_image['id'], 'full_hd' ); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>

    </section>
</div>
