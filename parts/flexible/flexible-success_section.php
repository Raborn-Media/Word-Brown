<?php
$quote_icon    = get_sub_field('quote_icon');
$quote_author  = get_sub_field('quote_author');
$section_quote = get_sub_field('section_quote');
?>

<!-- BEGIN  success-section -->
<section class="success-section">
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell quote-col">
                <?php if ($quote_icon) : ?>
                    <div class="quote-icon">
                        <?php echo wp_get_attachment_image($quote_icon['id'], 'medium'); ?>
                    </div>
                <?php endif; ?>
                <?php if ($section_quote) : ?>
                    <h3 class="success-section__quote">
                        <?php echo $section_quote; ?>
                    </h3>
                <?php endif; ?>
                <?php if ($quote_author) : ?>
                    <p class="success-section__quote-author">
                        <?php echo $quote_author; ?>
                    </p>
                <?php endif; ?>
            </div>

            <div class="cell">
                <?php if (have_rows('success_articles_list')) : ?>
                    <div class="success-articles-list">
                        <?php while (have_rows('success_articles_list')) :
                            the_row();
                            $success_image = get_sub_field('success_image');
                            $success_text  = get_sub_field('success_text');
                            ?>
                            <div class="success-article">
                                <?php if ($success_image) : ?>
                                    <div class="success-image">
                                        <?php echo wp_get_attachment_image($success_image['id'], 'large'); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ($success_text) : ?>
                                    <article class="success-text">
                                        <?php echo $success_text; ?>
                                    </article>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- END  success-section -->
