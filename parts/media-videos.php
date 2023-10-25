<section id="videos">

    <div class="grid-container">
        <div class="grid-x">
            <div class="cell">
                <h2 class="underlined-header section-title">
                    <?php _e('Videos'); ?>
                </h2>
            </div>
        </div>
    </div>

    <div class="grid-container">
        <div class="grid-x">
            <div class="cell text-center">
                <ul id="video-filter" class="filters">
                    <li>
                        <a href="#" filter-videos="wbgeneral">
                            <?php _e('WORD & BROWN GENERAL AGENCY'); ?>
                        </a>
                    </li>
                    <li>
                        <a href="#" filter-videos="calchoice">
                            <?php _e('CALIFORNIACHOICE'); ?>
                        </a>
                    </li>
                    <li class="all active">
                        <a href="#" filter-videos="all">
                            <?php _e('VIEW ALL VIDEO SOURCES'); ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="grid-container">
        <div class="grid-x">
            <ul id="video-list"></ul>
            <a id="view-all-videos" class="view-all button" href="<?php echo home_url(); ?>/videos">
                <?php _e('VIEW MORE VIDEOS'); ?>
            </a>
        </div>
    </div>
    <div id="youtube-lightbox" class="hidden">
        <i class="fa fa-times" aria-hidden="true"></i>
        <div class="wrapper"></div>
    </div>
</section>
