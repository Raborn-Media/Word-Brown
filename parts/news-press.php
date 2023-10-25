<section id="news-press">

    <div class="grid-container">
        <div class="grid-x">
            <div class="small-24 cell">
                <h2 class="underlined-header section-title">News & Press</h2>
            </div>
        </div>
    </div>

    <div class="grid-container">
        <div class="grid-x">
            <div class="small-12 cell text-center">
                <ul id="news-press-filter" class="filters">
                    <li>
                        <a href="#" filter-news-press="wbgeneral">
                            <!--                                <img src="-->
                            <?//= get_template_directory_uri(); ?><!--/assets/images/WordBrown.png"-->
                            <!--                                     class="wnb" width="200px">-->
                            <?php _e('THE INSURANCE BROKER BLOG') ?>
                        </a>
                    </li>
                    <li>
                        <a href="#" filter-news-press="calchoice">
                            <!--                                <img src="-->
                            <?//= get_template_directory_uri(); ?><!--/assets/images/choice-admin.png"">-->
                            <?php _e('MYCALCHOICE') ?>
                        </a>
                    </li>
                    <li class="all active">
                        <a href="#" filter-news-press="all">
                            <?php _e('VIEW ALL NEWS SOURCES'); ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="grid-container">
        <div class="grid-x">
            <div class="small-12 large-9 cell">

                <ul id="blog-list"></ul>
                <a id="view-all-posts" class="button view-all" href="<?php echo home_url(); ?>/latest-news">
                    <?php _e('VIEW MORE ARTICLES'); ?>
                </a>

            </div>
            <div class="small-12 large-3 cell">
                <h4 class="archive-title"><?php _e('Archive'); ?></h4>
                <ul id="blog-list-archive"></ul>
            </div>
        </div>
    </div>
</section>
