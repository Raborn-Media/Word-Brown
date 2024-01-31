<?php
/**
 * Template Name: SOUE Template
 */
get_header( 'soue' );
$hero_bg      = get_field( 'hero_bg' );
$bg_video_url = get_field( 'hero_bg_video' );
?>


<!-- BEGIN  soue-hero -->
<section class="soue-hero" <?php bg( $hero_bg['url'], 'full_hd' ); ?>>
    <video src="<?php echo $bg_video_url; ?>"
           autoplay
           preload="none"
           muted="muted"
           loop="loop"
           class="video soue-hero__videoBg"></video>
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell text-center">
                <?php
                $hero_title       = get_field( 'hero_title' );
                $hero_subtitle    = get_field( 'hero_subtitle' );
                $hero_text        = get_field( 'hero_text' );
                $hero_button      = get_field( 'hero_button' );
                $hero_bottom_text = get_field( 'hero_bottom_text' );
                ?>
                <h1>
                    <?php echo $hero_title; ?>
                </h1>
                <h2>
                    <?php echo $hero_subtitle; ?>
                </h2>
                <article>
                    <?php echo $hero_text; ?>
                </article>

                <a href="<?php echo $hero_button['url']; ?>" class="button soue-hero-btn">
                    <?php echo $hero_button['title']; ?>
                </a>

                <small>
                    <?php echo $hero_bottom_text; ?>
                </small>
            </div>
        </div>
    </div>
</section>
<!-- END  soue-hero -->

<!-- BEGIN  soue-about-section -->
<section id="soue-about" class="soue-about-section">
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell large-5 show-for-medium">
                <?php if ( $about_image = get_field( 'about_image' ) ) : ?>
                    <div class="about-image">
                        <?php echo wp_get_attachment_image( $about_image['id'], 'large' ); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="cell large-7">
                <?php if ( $about_text = get_field( 'about_text' ) ) : ?>
                    <article>
                        <?php echo $about_text; ?>
                    </article>
                <?php endif; ?>

                <?php if ( $about_image = get_field( 'about_image' ) ) : ?>
                    <div class="about-image hide-for-medium">
                        <?php echo wp_get_attachment_image( $about_image['id'], 'large' ); ?>
                    </div>
                <?php endif; ?>

                <?php if ( have_rows( 'core_values' ) ) : ?>
                    <div class="core-values">
                        <h4>
                            <?php _e( 'Our Core Values' ); ?>
                        </h4>
                        <div class="values-list">
                            <?php while ( have_rows( 'core_values' ) ) : the_row();
                                $value_image = get_sub_field( 'value_image' );
                                $value_title = get_sub_field( 'value_title' );
                                $value_text  = get_sub_field( 'value_text' );
                                ?>
                                <div class="values-list__item">
                                    <?php if ( $value_image ) : ?>
                                        <div class="value-image">
                                            <?php echo display_svg( $value_image ); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ( $value_title ) : ?>
                                        <h5 class="value-title">
                                            <?php echo $value_title; ?>
                                        </h5>
                                    <?php endif; ?>
                                    <?php if ( $value_text ) : ?>
                                        <article>
                                            <?php echo $value_text; ?>
                                        </article>
                                    <?php endif; ?>

                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- END  soue-about-section -->

<!-- BEGIN  soue-nominate-section -->
<?php $nominate_section_bg = get_field( 'nominate_section_bg' ); ?>
<section id="soue-nominate" class="soue-nominate-section" <?php bg( $nominate_section_bg['url'], 'full_hd' ); ?>>
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell">
                <?php if ( $nominate_section_title = get_field( 'nominate_section_title' ) ) : ?>
                    <h2 class="text-center soue-section-title">
                        <?php echo $nominate_section_title; ?>
                    </h2>
                <?php endif; ?>

                <?php $nominate_form = get_field( 'nominate_form' ); ?>
                <div class="nominate__form">
                    <?php echo do_shortcode( "[gravityform id='{$nominate_form['id']}' title='false' description='false' ajax='true']" ); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END  soue-nominate-section -->

<!-- BEGIN  soue-winners-section -->
<section id="soue-winners" class="soue-winners-section">
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell">
                <?php if ( $past_winners_title = get_field( 'past_winners_title' ) ) : ?>
                    <h2 class="text-center soue-section-title">
                        <?php echo $past_winners_title; ?>
                    </h2>
                <?php endif; ?>

                <?php if ( $past_winners_text = get_field( 'past_winners_text' ) ) : ?>
                    <article>
                        <?php echo $past_winners_text; ?>
                    </article>
                <?php endif; ?>
            </div>

            <div class="cell">
                <div class="winners-filter">
                    <div class="filter-heading">
                        <h4>
                            <?php _e( 'Filter by Date' ) ?>
                        </h4>
                        <button class="clear-selection">
                            <?php _e( 'Clear Selection' ) ?>
                        </button>
                    </div>
                    <?php
                    $winners_categories = get_categories( [
                        'taxonomy'   => 'victory_year',
                        'type'       => 'winners',
                        'orderby'    => 'ID',
                        'order'      => 'DESC',
                        'hide_empty' => 0
                    ] );

                    if ( $winners_categories ) { ?>
                        <div class="dropdown-year hide-for-medium">
                            <?php _e( 'Select year' ); ?>
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                        <div class="category-list-wrap">
                            <div class="category-list">
                                <?php
                                foreach ( $winners_categories as $cat ) { ?>
                                    <div data-category='<?php echo $cat->term_id; ?>'
                                         class="category-list__item">
                                        <p class="cat-title">
                                            <?php echo $cat->name; ?>
                                        </p>
                                    </div>
                                <?php }; ?>
                            </div>
                        </div>
                    <?php }; ?>
                </div>
                <div class="winners-list">
                    <!-- BEGIN of Blog posts -->
                    <?php
                    $args = array(
                        'post_type'      => 'winners',
                        'order'          => 'DESC',
                        'orderby'        => 'ID',
                        'posts_per_page' => 12,
                    );
                    ?>

                    <?php $winners_query = new WP_Query( $args ); ?>

                    <?php if ( $winners_query->have_posts() ) : ?>
                        <!-- the loop -->
                        <?php while ( $winners_query->have_posts() ) :
                            $winners_query->the_post(); ?>
                            <?php
                            global $post;
                            setup_postdata( $post );
                            $employee_of_the_year = get_field( 'employee_of_the_year' );
                            ?>
                            <div
                                class='winners-list__winner ease-btm <?php echo $employee_of_the_year ? 'employee-of-the-year' : ''; ?>'
                                data-scroll>
                                <div class="winner-image">
                                    <div class="year-tag">
                                        <?php
                                        $post_id = get_the_ID(); // Assuming you're inside the loop, otherwise, specify the post ID

                                        $selected_year    = wp_get_post_terms( $post_id, 'victory_year', array(
                                            'orderby' => 'term_id',
                                            'order'   => 'DESC',
                                            'number'  => 1
                                        ) );
                                        $selected_quarter = wp_get_post_terms( $post_id, 'victoty_quarter', array(
                                            'orderby' => 'term_id',
                                            'order'   => 'DESC',
                                            'number'  => 1
                                        ) );
                                        ?>

                                        <?php if ( ! empty( $selected_quarter ) ) {
                                            foreach ( $selected_quarter as $quarter ) { ?>
                                                <p class="quarter-title">
                                                    <?php echo $quarter->name; ?>
                                                </p>
                                            <?php }
                                        }

                                        if ( ! empty( $selected_year ) ) {
                                            foreach ( $selected_year as $year ) { ?>
                                                <p class="year-title">
                                                    <?php echo $year->name; ?>
                                                </p>
                                            <?php }
                                        }
                                        ?>
                                    </div>
                                    <div class="image">
                                        <?php the_post_thumbnail(); ?>
                                    </div>

                                    <p class="employee-of-the-year__label">
                                        <?php _e( 'employee' ); ?>
                                        <span><?php _e( 'of the' ); ?></span>
                                        <?php _e( 'year' ); ?>
                                        <?php if ( ! empty( $selected_year ) ) {
                                            foreach (
                                                $selected_year

                                                as $year
                                            ) { ?>
                                                <?php echo $year->name; ?>
                                            <?php }
                                        }
                                        ?>
                                    </p>

                                </div>
                                <h4 class="winner-name">
                                    <?php the_title(); ?>
                                </h4>
                                <?php if ( $winner_position = get_field( 'winner_position' ) ) : ?>
                                    <p class="winner-position">
                                        <?php echo $winner_position; ?>
                                    </p>
                                <?php endif; ?>

                                <?php if ( $winner_department = get_field( 'winner_department' ) ) : ?>
                                    <p class="winner-department">
                                        <?php echo $winner_department; ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                    <?php if ( $winners_query->max_num_pages >= 2 ) : ?>
                        <div class="more-button-wrap">
                            <button class="button winners-more-button" data-paged="2">
                                <?php _e( 'View More Past Winners' ); ?>
                            </button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="scroll-to-up">
        <div style="text-align: right;" class="container">
            <div class="up_arrow_div">
                <i class="fa-solid fa-chevron-up"></i></div>
        </div>
    </div>
</section>
<!-- END  soue-winners-section -->
<?php get_footer( 'soue' ); ?>
