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
        <div id="culture-mobile">
            <div class="row grid-x">
                <div class="small-12 columns cell">
                    <div class="small-12 large-12 columns cell">

                        <?php if ( have_rows( 'first_animated_text' ) ) : ?>
                            <?php while ( have_rows( 'first_animated_text' ) ) : the_row();
                                $first_word           = get_sub_field( 'first_word' );
                                $first_animated_word  = get_sub_field( '1st_animated_word' );
                                $second_animated_word = get_sub_field( '2nd_animated_word' );
                                $third_animated_word  = get_sub_field( '3rd_animated_word' );
                                $last_word            = get_sub_field( 'last_word' );
                                ?>
                                <div class="container">
                                    <div class="wrap">
                                        <div class="word">
                                            <span><?php echo $first_word; ?> </span>
                                        </div>
                                        <div class="word dynamic">

                                            <span class="word-wrap"><?php echo $first_animated_word; ?></span>

                                            <span class="word-wrap"><?php echo $second_animated_word; ?></span>

                                            <span class="word-wrap"><?php echo $third_animated_word; ?></span>

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
                            <div class="small-12 large-12 columns cell text-center">
                                <?php echo wp_get_attachment_image( $top_image['id'], 'large' ); ?>
                                <!--                                <img src="-->
                                <?php //echo get_template_directory_uri() ?><!--/img/home/cltr-3a.jpg" alt="">-->
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <?php if ( have_rows( 'middle_column_images' ) ) : ?>
                        <?php while ( have_rows( 'middle_column_images' ) ) : the_row();
                            $top_image = get_sub_field( 'top_image' );
                            ?>
                            <div class="small-12 large-12 columns cell text-center">
                                <?php echo wp_get_attachment_image( $top_image['id'], 'large' ); ?>
                                <!--                                <img src="-->
                                <?php //echo get_template_directory_uri() ?><!--/img/home/cpics2.jpg">-->
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row grid-x">
                <div class="small-12 columns cell">
                    <?php if ( have_rows( 'second_animated_text' ) ) : ?>
                        <?php while ( have_rows( 'second_animated_text' ) ) : the_row();
                            $first_word           = get_sub_field( 'first_word' );
                            $first_animated_word  = get_sub_field( '1st_animated_word' );
                            $second_animated_word = get_sub_field( '2nd_animated_word' );
                            $third_animated_word  = get_sub_field( '3rd_animated_word' );
                            $last_word            = get_sub_field( 'last_word' );
                            ?>
                            <div class="small-12 large-12 columns cell">
                                <div class="container">
                                    <div class="wrap">
                                        <div class="word">
                                            <span><?php echo $first_word; ?></span>
                                        </div>
                                        <div class="word dynamic">

                                            <span class="word-wrap"> <?php echo $first_animated_word; ?></span>

                                            <span class="word-wrap"><?php echo $second_animated_word; ?></span>

                                            <span class="word-wrap"><?php echo $third_animated_word; ?></span>

                                        </div>
                                        <div class="word">
                                            <span><?php echo $last_word; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>

                    <?php if ( have_rows( 'middle_column_images' ) ) : ?>
                        <?php while ( have_rows( 'middle_column_images' ) ) : the_row();
                            $top_image    = get_sub_field( 'top_image' );
                            $third_image  = get_sub_field( 'third_image' );
                            $bottom_image = get_sub_field( 'bottom_image' );
                            ?>
                            <div class="small-12 large-12 columns cell text-center">
                                <?php echo wp_get_attachment_image( $third_image['id'], 'large' ); ?>
                                <!--                                <img src="-->
                                <?php //echo get_template_directory_uri() ?><!--/img/home/cltr-2c.jpg">-->
                            </div>
                            <div class="small-12 large-12 columns cell text-center">
                                <?php echo wp_get_attachment_image( $bottom_image['id'], 'large' ); ?>
                                <!--                                <img src="-->
                                <?php //echo get_template_directory_uri() ?><!--/img/home/cltr-2d.jpg">-->
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Culture of Excellence, Desktop -->

        <div id="culture-desktop">
            <div class="row grid-x">
                <div class="small-12 large-4 columns cell">
                    <?php if ( have_rows( 'first_animated_text' ) ) : ?>
                        <?php while ( have_rows( 'first_animated_text' ) ) : the_row();
                            $first_word           = get_sub_field( 'first_word' );
                            $first_animated_word  = get_sub_field( '1st_animated_word' );
                            $second_animated_word = get_sub_field( '2nd_animated_word' );
                            $third_animated_word  = get_sub_field( '3rd_animated_word' );
                            $last_word            = get_sub_field( 'last_word' );
                            ?>

                            <div class="container" style="height: 300px;" data-bottom-top="transform:translateY(500px);"
                                 data-top="transform:translateY(0px);">
                                <div style="top: 75px; position: absolute; width: 400px;">
                                    <div class="word">
                                        <span><?php echo $first_word; ?></span>
                                    </div>
                                    <div class="word dynamic">

								<span class="word-wrap"
                                      data-100-center-center="transform:translateY(0px); opacity: 1;"
                                      data--100-center-center="transform:translateY(50px); opacity: 0.67;"
                                      data--300-center-center="transform:translateY(100px); opacity: 0.3;"
                                ><?php echo $first_animated_word; ?></span>

                                        <span class="word-wrap"
                                              data-100-center-center="transform:translateY(-50px); opacity: 0.67;"
                                              data--100-center-center="transform:translateY(0px); opacity: 1;"
                                              data--300-center-center="transform:translateY(50px); opacity: 0.67;"
                                        ><?php echo $second_animated_word; ?></span>

                                        <span class="word-wrap"
                                              data-100-center-center="transform:translateY(-100px); opacity: 0.3;"
                                              data--100-center-center="transform:translateY(-50px); opacity: 0.67;"
                                              data--300-center-center="transform:translateY(0px); opacity: 1;"
                                        ><?php echo $third_animated_word; ?></span>

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
                            <div class="container">
                                <div data-bottom-top="transform:translateY(500px); opacity: 0;"
                                     data--10-bottom="transform:translateY(0px); opacity: 1;">
                                    <?php echo wp_get_attachment_image( $top_image['id'], 'large' ); ?>
                                    <!--                        <img src="-->
                                    <?php //echo get_template_directory_uri() ?><!--/img/home/WBC.Home.Page.LauraV.08.22.jpg"-->
                                    <!--                             alt="">-->
                                </div>
                            </div>

                            <div class="container">
                                <div data-bottom-top="transform:translateY(200px); opacity: 0;"
                                     data--10-bottom="transform:translateY(0px); opacity: 1;">
                                    <?php echo wp_get_attachment_image( $central_image['id'], 'large' ); ?>
                                    <!--                        <img src="-->
                                    <?php //echo get_template_directory_uri() ?><!--/img/home/cltr-1b.jpg" alt="">-->
                                </div>
                            </div>
                            <div class="container">
                                <div data-bottom-top="transform:translateY(500px); opacity: 0;"
                                     data--10-bottom="transform:translateY(0px); opacity: 1;">
                                    <?php echo wp_get_attachment_image( $bottom_image['id'], 'large' ); ?>
                                    <!--                        <img src="-->
                                    <?php //echo get_template_directory_uri() ?><!--/img/home/cltr-1c.jpg" alt="">-->
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

                        <div class="small-12 large-4 columns cell">
                            <div class="container">
                                <div data-bottom-top="transform:translateY(500px); opacity: 0;"
                                     data--10-bottom="transform:translateY(0px); opacity: 1;">
                                    <?php echo wp_get_attachment_image( $top_image['id'], 'large' ); ?>
                                    <!--                                <img src="-->
                                    <?php //echo get_template_directory_uri() ?><!--/img/home/cltr-2a.jpg" alt="">-->
                                </div>
                            </div>

                            <div class="container">
                                <div data-bottom-top="transform:translateY(200px); opacity: 0;"
                                     data--10-bottom="transform:translateY(0px); opacity: 1;">
                                    <?php echo wp_get_attachment_image( $second_image['id'], 'large' ); ?>
                                    <!--                                <img src="-->
                                    <?php //echo get_template_directory_uri() ?><!--/img/home/cltr-2b.jpg" alt="">-->
                                </div>
                            </div>

                            <div class="container">
                                <div data-bottom-top="transform:translateY(500px); opacity: 0;"
                                     data--10-bottom="transform:translateY(0px); opacity: 1;">
                                    <?php echo wp_get_attachment_image( $third_image['id'], 'large' ); ?>
                                    <!--                                <img src="-->
                                    <?php //echo get_template_directory_uri() ?><!--/img/home/cltr-2c.jpg" alt="">-->
                                </div>
                            </div>

                            <div class="container">
                                <div data-bottom-top="transform:translateY(500px); opacity: 0;"
                                     data--10-bottom="transform:translateY(0px); opacity: 1;">
                                    <?php echo wp_get_attachment_image( $bottom_image['id'], 'large' ); ?>
                                    <!--                                <img src="-->
                                    <?php //echo get_template_directory_uri() ?><!--/img/home/cltr-2d.jpg" alt="">-->
                                </div>
                            </div>

                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                <div class="small-12 large-4 columns cell right-col">
                    <?php if ( have_rows( 'right_column_images' ) ) : ?>
                        <?php while ( have_rows( 'right_column_images' ) ) : the_row();
                            $top_image = get_sub_field( 'top_image' );
                            ?>
                            <div class="container">
                                <div data-bottom-top="transform:translateY(500px); opacity: 0;"
                                     data--10-bottom="transform:translateY(0px); opacity: 1;">
                                    <?php echo wp_get_attachment_image( $top_image['id'], 'large' ); ?>
                                    <!--                        <img src="-->
                                    <?php //echo get_template_directory_uri() ?><!--/img/home/cltr-3a.jpg" alt="">-->
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

                            <div class="container" style="height: 300px;" data-bottom-top="transform:translateY(500px);"
                                 data-top="transform:translateY(0px);">
                                <div style="top: 75px; position: absolute; width: 400px;">
                                    <div class="word">
                                        <span><?php echo $first_word; ?></span>
                                    </div>
                                    <div class="word dynamic">

								<span class="word-wrap"
                                      data-100-center-center="transform:translateY(0px); opacity: 1;"
                                      data--100-center-center="transform:translateY(50px); opacity: 0.67;"
                                      data--300-center-center="transform:translateY(100px); opacity: 0.3;"
                                ><?php echo $first_animated_word; ?></span>

                                        <span class="word-wrap"
                                              data-100-center-center="transform:translateY(-50px); opacity: 0.67;"
                                              data--100-center-center="transform:translateY(0px); opacity: 1;"
                                              data--300-center-center="transform:translateY(50px); opacity: 0.67;"
                                        ><?php echo $second_animated_word; ?></span>

                                        <span class="word-wrap"
                                              data-100-center-center="transform:translateY(-100px); opacity: 0.3;"
                                              data--100-center-center="transform:translateY(-50px); opacity: 0.67;"
                                              data--300-center-center="transform:translateY(0px); opacity: 1;"
                                        ><?php echo $third_animated_word; ?></span>

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
                            <div class="container">
                                <div data-bottom-top="transform:translateY(500px); opacity: 0;"
                                     data--10-bottom="transform:translateY(0px); opacity: 1;">
                                    <?php echo wp_get_attachment_image( $central_image['id'], 'large' ); ?>
                                    <!--                        <img src="-->
                                    <?php //echo get_template_directory_uri() ?><!--/img/home/cltr-3b.jpg" alt="">-->
                                </div>
                            </div>

                            <div class="container">
                                <div data-bottom-top="transform:translateY(200px); opacity: 0;"
                                     data--10-bottom="transform:translateY(0px); opacity: 1;">
                                    <?php echo wp_get_attachment_image( $bottom_image['id'], 'large' ); ?>
                                    <!--                        <img src="-->
                                    <?php //echo get_template_directory_uri() ?><!--/img/home/cltr-3c.jpg" alt="">-->
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row grid-x">
                <div class="small-12 large-4 columns cell">
                    <?php if ( have_rows( 'third_animated_text' ) ) : ?>
                        <?php while ( have_rows( 'third_animated_text' ) ) : the_row();
                            $first_word           = get_sub_field( 'first_word' );
                            $first_animated_word  = get_sub_field( '1st_animated_word' );
                            $second_animated_word = get_sub_field( '2nd_animated_word' );
                            $third_animated_word  = get_sub_field( '3rd_animated_word' );
//                $last_word            = get_sub_field( 'last_word' );
                            ?>
                            <div class="container" style="height: 300px;" data-bottom-top="transform:translateY(300px);"
                                 data-top="transform:translateY(-100px);">
                                <div style="top: 100px; position: relative;">

                                    <div class="word">
                                        <span><?php echo $first_word; ?> </span>
                                    </div>
                                    <div class="word dynamic">

								<span class="word-wrap"
                                      data-100-center-center="transform:translateY(0px); opacity: 1;"
                                      data--100-center-center="transform:translateY(50px); opacity: 0.67;"
                                      data--300-center-center="transform:translateY(100px); opacity: 0.3;"
                                ><?php echo $first_animated_word; ?></span>

                                        <span class="word-wrap"
                                              data-100-center-center="transform:translateY(-50px); opacity: 0.67;"
                                              data--100-center-center="transform:translateY(0px); opacity: 1;"
                                              data--300-center-center="transform:translateY(50px); opacity: 0.67;"
                                        ><?php echo $second_animated_word; ?></span>

                                        <span class="word-wrap"
                                              data-100-center-center="transform:translateY(-100px); opacity: 0.3;"
                                              data--100-center-center="transform:translateY(-50px); opacity: 0.67;"
                                              data--300-center-center="transform:translateY(0px); opacity: 1;"
                                        ><?php echo $third_animated_word; ?></span>

                                    </div>

                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <div class="small-12 large-8 columns cell">
                    <?php if ( $bottom_text_image = get_sub_field( 'bottom_text_image' ) ) : ?>
                        <div class="container">
                            <div class="container" style="height: 300px;" data-bottom-top="transform:translateY(300px);"
                                 data-top="transform:translateY(-100px);">
                                <?php echo wp_get_attachment_image( $bottom_text_image['id'], 'large' ); ?>
                                <!--            <img src="-->
                                <?php //echo get_template_directory_uri() ?><!--/img/home/cltr-bottom.jpg" alt="">-->
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row grid-x">
                <div class="small-12 large-12 columns cell">
                    <?php if ( $bottom_section_image = get_sub_field( 'bottom_section_image' ) ) : ?>
                        <div class="container">
                            <div class="container" style="height: 300px;" data-bottom-top="transform:translateY(300px);"
                                 data-top="transform:translateY(-100px);">
                                <?php echo wp_get_attachment_image( $bottom_section_image['id'], 'large' ); ?>
                                <!--                        <img src="-->
                                <?php //echo get_template_directory_uri() ?><!--/img/giving-back/giving_back1.png" alt="">-->
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>

    </section>
</div>
