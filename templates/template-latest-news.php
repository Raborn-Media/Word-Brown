<?php

/**
 * Template Name: Latest News
 */
global $varCurrentPage;
$varCurrentPage = "page-latest-news";

get_header();

?>
    <div class="media-wrap">

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


        <section id="brand-assets">

            <div class="grid-container">
                <div class="grid-x">
                    <div class="cell">
                        <h2 class="underlined-header">Brand Assets</h2>
                    </div>

                    <div class="grid-container">
                        <div class="grid-x">
                            <div class="small-24 large-18 small-offset-3 cell brand-intro">
                                <h3>Request our Brand Assets</h3>
                                <p>To download high resolution logos and style guides, click on the logo below, then
                                    choose your preferred file format, then read and accept our brand guidelines.</p>
                            </div>
                        </div>
                    </div>
                    <div id="company-asset-list">
                        <div class="grid-container">
                            <div class="grid-x">

                                <div class="cologo">
                                    <div class="logo-general"></div>
                                </div>

                                <div class="cologo">
                                    <div class="logo-choice"></div>
                                </div>

                                <div class="cologo">
                                    <div class="logo-california"></div>
                                </div>

                            </div>
                        </div>

                        <div id="general-agency" class="modal">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <span class="close">&times;</span>
                                    <h3>Choose Your File Format</h3>
                                    <img src="
        <?= get_template_directory_uri(); ?>/img/WB.2019.Logo.PMS.Full.svg"/>
                                </div>
                                <div class="modal-body">
                                    <div class="grid-container">
                                        <div class="grid-x">
                                            <div class="cologo">
                                                <a href="
        <?= get_template_directory_uri(); ?>/img/corporate-logos/WB.2018.Logo.PMS.Full.png"
                                                   download>
                                                    <div class='download-box'>
                                                        Download SVG
                                                        <br/>
                                                        <i class="fas fa-download"></i>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="cologo">
                                                <a href="
        <?= get_template_directory_uri(); ?>/img/corporate-logos/WB.2018.Logo.PMS.Full.svg"
                                                   download>
                                                    <div class='download-box'>
                                                        Download PNG
                                                        <br/>
                                                        <i class="fas fa-download"></i>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="cologo">
                                                <a href="
        <?= get_template_directory_uri(); ?>/img/corporate-logos/WB.2018.Logo.PMS.Full.eps"
                                                   download>
                                                    <div class='download-box'>
                                                        Download EPS
                                                        <br/>
                                                        <i class="fas fa-download"></i>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="choice-administrators" class="modal">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <span class="close">&times;</span>
                                    <h3>Choose Your File Format</h3>
                                    <img
                                        src="
        <?= get_template_directory_uri(); ?>/img/corporate-logos/CHOICE.Administrators.png"/>
                                </div>
                                <div class="modal-body">
                                    <div class="grid-container">
                                        <div class="grid-x">
                                            <div class="cologo">
                                                <a href="
        <?= get_template_directory_uri(); ?>/img/corporate-logos/CHOICE.Administrators.png"
                                                   download>
                                                    <div class='download-box'>
                                                        Download PNG
                                                        <br/>
                                                        <i class="fas fa-download"></i>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="cologo">
                                                <a href="
        <?= get_template_directory_uri(); ?>/img/corporate-logos/CHOICE.Administrators.jpg"
                                                   download>
                                                    <div class='download-box'>
                                                        Download JPG
                                                        <br/>
                                                        <i class="fas fa-download"></i>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="cologo">
                                                <a href="
        <?= get_template_directory_uri(); ?>/img/corporate-logos/CHOICE.Administrators.PMS.ProcessBlue.eps"
                                                   download>
                                                    <div class='download-box'>
                                                        Download EPS
                                                        <br/>
                                                        <i class="fas fa-download"></i>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="california-rx-card" class="modal">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <span class="close">&times;</span>
                                    <h3>Choose Your File Format</h3>
                                    <img
                                        src="
        <?= get_template_directory_uri(); ?>/img/about/company-logo-calrx-black.svg"/>
                                </div>
                                <div class="modal-body">
                                    <div class="grid-container">
                                        <div class="grid-x">
                                            <div class="cologo">
                                                <a href="
        <?= get_template_directory_uri(); ?>/img/corporate-logos/California%20Rx%20Card.png"
                                                   download>
                                                    <div class='download-box'>
                                                        Download PNG
                                                        <br/>
                                                        <i class="fas fa-download"></i>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="cologo">
                                                <a href="
        <?= get_template_directory_uri(); ?>/img/corporate-logos/California%20Rx%20Card.jpg"
                                                   download>
                                                    <div class='download-box'>
                                                        Download JPG
                                                        <br/>
                                                        <i class="fas fa-download"></i>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="cologo">
                                                <a href="
        <?= get_template_directory_uri(); ?>/img/corporate logos/CaliforniaRx_logo.eps"
                                                   download>
                                                    <div class='download-box'>
                                                        Download EPS
                                                        <br/>
                                                        <i class="fas fa-download"></i>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

    </div>
    <script>
        window.filters = {
            news: 'all',
            social: 'all',
            videos: 'all'
        };

        function fetchNews() {
            jQuery.getJSON('/wp-json/media-feeds/v1/news/' + window.filters.news + '/0/5', function (response) {
                var list = jQuery('#blog-list');
                var listArchive = jQuery('#blog-list-archive');

                list.empty();

                var addedDates = [];

                if (response.results.length) {
                    for (var i = 0; i < response.results.length; i++) {
                        var result = response.results[i];

                        list.append(
                            '<li class="lazy-load feed-post">' +
                            '<div class="post-image">' +
                            '<a href="' + result.href + '">' +
                            '<img src="' + result.thumbnail + '" alt="Image">' +
                            '</a>' +
                            '</div>' +
                            '<div class="post-content">' +
                            '<a href="' + result.href + '">' +
                            '<h3>' + result.title + '</h3>' +
                            '</a>' +
                            '<div class="post-date">' + result.date + '</div>' +
                            '<p>' + result.description + '</p>' +
                            '</div>' +
                            '</li>'
                        );
                    }
                }
            });
        }

        function fetchArchiveDates() {
            jQuery.getJSON('/wp-json/media-feeds/v1/news/' + window.filters.news + '/0/5', function (response) {
                var listArchive = jQuery('#blog-list-archive');
                var addedDates = [];

                if (response.results.length) {
                    for (var i = 0; i < response.results.length; i++) {
                        var result = response.results[i];
                        if (addedDates.indexOf(result.archive_date) === -1) {
                            listArchive.append(
                                '<li class="archive-item">' +
                                '<div class="archive-date" data-date="' + result.archive_date + '">' + result.archive_date + '</div>' +
                                '</li>'
                            );

                            // Add the archive_date to the addedDates array
                            addedDates.push(result.archive_date);
                        }
                    }

                    // Додайте обробник подій до archive-date
                    listArchive.find('.archive-date').click(function () {
                        var clickedDate = jQuery(this).data('date');
                        console.log(clickedDate)

                        // Очистіть список перед додаванням нових постів
                        var list = jQuery('#blog-list');
                        list.empty();

                        // Перевірте кожен пост
                        for (var i = 0; i < response.results.length; i++) {
                            var result = response.results[i];
                            if (result.list_filter_date === clickedDate) {

                                list.append(
                                    '<li class="lazy-load feed-post">' +
                                    '<div class="post-image">' +
                                    '<a href="' + result.href + '">' +
                                    '<img src="' + result.thumbnail + '" alt="Image">' +
                                    '</a>' +
                                    '</div>' +
                                    '<div class="post-content">' +
                                    '<a href="' + result.href + '">' +
                                    '<h3>' + result.title + '</h3>' +
                                    '</a>' +
                                    '<div class="post-date">' + result.date + '</div>' +
                                    '<div class="list-filter-date">' + result.list_filter_date + '</div>' +
                                    '<p>' + result.description + '</p>' +
                                    '</div>' +
                                    '</li>'
                                );
                            }
                        }
                    });
                }
            });
        }

        function fetchVideos() {
            jQuery.getJSON('/wp-json/media-feeds/v1/videos/' + window.filters.videos + '/0/6', function (response) {
                var list = jQuery('#video-list');

                list.empty();

                if (response.results.length) {
                    for (var i = 0; i < response.results.length; i++) {
                        var result = response.results[i];

                        setTimeout(function (result) {

                            list.append(
                                '<li class="lazy-load">' +
                                '<a data-fancybox class="video-wrap " video="' + result.href + '">' +
                                // '<a href="' + result.href + '">' +
                                '<img src="' + result.thumbnail + '" />' +
                                '</a>' +
                                '</div>' +
                                '<div class="video-footer">' +
                                '<h4>' + result.title + '</h4>' +
                                '<p class="post-date">' + result.timestamp + '</p>' +
                                '<p>' + result.author + '</p>' +
                                '</div>' +
                                '</li>'
                            );
                        }, i * 100, result);
                    }
                }
            });
        }

        jQuery(document).ready(function ($) {
            $("a#headerpush").on('click', function (event) {
                if (this.hash !== '') {
                    event.preventDefault();

                    var hash = this.hash;

                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 800, function () {
                        window.location.hash = hash;
                    });
                }
            });

            $('input').focusin(function () {
                input = $(this);
                input.data('place-holder-text', input.attr('placeholder'));
                input.attr('placeholder', '');
            });

            $('input').focusout(function () {
                input = $(this);
                input.attr('placeholder', input.data('place-holder-text'));
            });

            $('#youtube-lightbox .fa').click(function () {
                $('#youtube-lightbox').addClass('hidden');
                $('body').removeClass('fixed');
                var lightbox = $('#youtube-lightbox');
                lightbox.find('.wrapper').html('<iframe src="" />');
            });

            $('body').on('click', '[video]', function () {
                var lightbox = $('#youtube-lightbox');
                var video = $(this).attr('video').replace('watch?v=', 'embed/');

                lightbox.find('.wrapper').html('<iframe src="' + video + '" />');
                lightbox.removeClass('hidden');
                $('body').addClass('fixed');
            });

            $('[filter-news-press]').click(function (e) {
                var filter = $(this).attr('filter-news-press');

                $('[filter-news-press]').parent().removeClass('active');
                $(this).parent().addClass('active');

                window.filters.news = filter;
                window.filters.social = filter;

                fetchNews();
                // fetchSocial();

                e.preventDefault();
                return false;
            });

            $('[filter-videos]').click(function (e) {
                var filter = $(this).attr('filter-videos');

                $('[filter-videos]').parent().removeClass('active');
                $(this).parent().addClass('active');

                window.filters.videos = filter;

                fetchVideos();

                e.preventDefault();
                return false;
            });

            fetchNews();
            fetchArchiveDates();
            fetchVideos();
        });
    </script>

<?php
get_footer();
