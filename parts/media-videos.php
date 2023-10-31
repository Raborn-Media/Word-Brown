<section id="<?php echo is_page_template( 'templates/template-videos.php' ) == true ? 'videos-single' : 'videos'; ?>
">

    <div class="grid-container">
        <div class="grid-x">
            <div class="cell">
                <h2 class="underlined-header section-title">
                    <?php _e( 'Videos' ); ?>
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
                            <?php _e( 'WORD & BROWN GENERAL AGENCY' ); ?>
                        </a>
                    </li>
                    <li>
                        <a href="#" filter-videos="calchoice">
                            <?php _e( 'CALIFORNIACHOICE' ); ?>
                        </a>
                    </li>
                    <li class="all active">
                        <a href="#" filter-videos="all">
                            <?php _e( 'VIEW ALL VIDEO SOURCES' ); ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="grid-container">
        <div class="grid-x">
            <ul id="<?php echo is_page_template( 'templates/template-videos.php' ) == true ? 'video-list__single' : 'video-list'; ?>"></ul>
            <?php if ( is_page_template( 'templates/template-videos.php' ) ) : ?>
                <button id="view-all-videos" class="view-all button">
                    <?php _e( 'VIEW MORE VIDEOS' ); ?>
                </button>
            <?php else: ?>
                <a class="view-all button" href="<?php echo home_url(); ?>/videos">
                    <?php _e( 'VIEW MORE VIDEOS' ); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
    <div id="youtube-lightbox" class="hidden">
        <i class="fa fa-times" aria-hidden="true"></i>
        <div class="wrapper"></div>
    </div>
</section>

<?php if ( is_page_template( 'templates/template-videos.php' ) ) : ?>
    <script>
        window.filter = 'all';
        window.page = 0;

        function fetchMedia() {
            jQuery.getJSON('/wp-json/media-feeds/v1/videos/' + window.filter + '/' + (window.page * 8) + '/8', function (response) {
                if (!response.total || response.total <= (window.page * 8) + 8) {
                    jQuery('#view-all-videos').fadeOut();
                }

                if (response.results.length) {
                    var list = jQuery('#video-list__single');

                    for (var i = 0; i < response.results.length; i++) {
                        var result = response.results[i];

                        setTimeout(function (result) {
                            list.append(
                                '<li class="lazy-load">' +
                                '<a class="video-wrap " video="' +
                                result.href +
                                '">' +
                                // '<a href="' + result.href + '">' +
                                '<img src="' +
                                result.thumbnail +
                                '" />' +
                                '</a>' +
                                '</div>' +
                                '<div class="video-footer">' +
                                '<h4>' +
                                result.title +
                                '</h4>' +
                                '<p class="post-date">' +
                                result.timestamp +
                                '</p>' +
                                '<p>' +
                                result.author +
                                '</p>' +
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

                if (this.hash !== "") {
                    event.preventDefault();

                    var hash = this.hash;

                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 800, function () {
                        window.location.hash = hash;
                    });
                }
            });

            $('[filter]').click(function (e) {
                var filter = $(this).attr('filter');

                $('[filter]').parent().removeClass('active');
                $(this).parent().addClass('active');

                window.filter = filter;
                window.page = 0;

                $('#video-list').empty();

                fetchMedia();

                e.preventDefault();
                return false;
            });

            $('#view-all-videos').click(function () {
                window.page++;
                fetchMedia();
            });

            fetchMedia();
        });
    </script>
<?php endif; ?>
