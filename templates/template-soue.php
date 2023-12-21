<?php
/**
 * Template Name: SOUE Template
 */
get_header( 'soue' );
$hero_bg = get_field( 'hero_bg' );
?>


<!-- BEGIN  soue-hero -->
<section class="soue-hero" <?php bg( $hero_bg['url'], 'full_hd' ); ?>>
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

                <a href="<?php echo $hero_button['url']; ?>" class="button">
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
            <div class="cell large-5 text-right">
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

                <?php if (have_rows('core_values')) : ?>
                    <div class="core-values">
                        <h4>
                            <?php _e('Our Core Values'); ?>
                        </h4>
                        <div class="values-list">
                	 <?php while (have_rows('core_values')) : the_row();
                     $value_image = get_sub_field('value_image');
                     $value_title = get_sub_field('value_title');
                     $value_text = get_sub_field('value_text');
                     ?>
                        <div class="values-list__item">
                            <div class="value-image">
                                <?php echo display_svg( $value_image ); ?>
                            </div>

                            <h5 class="value-title">
                                <?php echo $value_title; ?>
                            </h5>
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
<?php $nominate_section_bg = get_field('nominate_section_bg'); ?>
<section id="soue-nominate" class="soue-nominate-section" <?php bg( $nominate_section_bg['url'], 'full_hd' ); ?>>
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell">
                <?php if($nominate_section_title = get_field('nominate_section_title')) : ?>
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
                <?php if($past_winners_title = get_field('past_winners_title')) : ?>
                    <h2 class="text-center soue-section-title">
                        <?php echo $past_winners_title; ?>
                    </h2>
                <?php endif; ?>

                <?php if($past_winners_text = get_field('past_winners_text')) : ?>
                 <article>
                     <?php echo $past_winners_text;?>
                 </article>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- END  soue-winners-section -->
<?php get_footer('soue'); ?>
