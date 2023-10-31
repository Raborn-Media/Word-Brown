<section
    id="<?php echo is_page_template('templates/template-news.php') == true ? 'news-press__single' : 'news-press'; ?>">

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
                            <? //= get_template_directory_uri(); ?><!--/assets/images/WordBrown.png"-->
                            <!--                                     class="wnb" width="200px">-->
                            <?php _e('THE INSURANCE BROKER BLOG') ?>
                        </a>
                    </li>
                    <li>
                        <a href="#" filter-news-press="calchoice">
                            <!--                                <img src="-->
                            <? //= get_template_directory_uri(); ?><!--/assets/images/choice-admin.png"">-->
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
        <div class="grid-x blog-list-row">
            <div class="small-12 large-9 cell">

                <ul id="<?php echo is_page_template('templates/template-news.php') == true ? 'blog-list__single' : 'blog-list'; ?>"></ul>

                <?php if (is_page_template('templates/template-news.php')) : ?>
                    <button id="view-all-posts" class="view-all button">
                        <?php _e('VIEW MORE ARTICLES'); ?>
                    </button>
                <?php else : ?>
                    <a id="view-all-artictes" class="button view-all" href="<?php echo home_url(); ?>/latest-news">
                        <?php _e('VIEW MORE ARTICLES'); ?>
                    </a>
                <?php endif; ?>

            </div>
            <div class="small-12 large-3 cell">
                <div class="date-filter-wrap">
                    <h4 class="archive-title"><?php _e('Archive'); ?></h4>
                    <ul class="show-for-large" id="<?php echo is_page_template('templates/template-news.php') == true ? 'blog-list-archive__single' : 'blog-list-archive'; ?>"></ul>
                    <label for="archiveSelect"></label>
                    <select class="hide-for-large" id="<?php echo is_page_template('templates/template-news.php') == true ? 'archiveSelect__single' : 'archiveSelect'; ?>">
                        <option value="" selected><?php _e('Choose date'); ?></option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if (is_page_template('templates/template-news.php')) : ?>
    <script>
        window.filter = 'all';
        window.page = 0;

        function fetchMedia() {
            jQuery.getJSON('/wp-json/media-feeds/v1/news/' + window.filter + '/' + (window.page * 5) + '/5', function (response) {
                if (!response.total || response.total <= (window.page * 5) + 5) {
                    jQuery('#view-all-posts').fadeOut();
                }

                if (response.results.length) {
                    var list = jQuery('#blog-list__single');

                    for (var i = 0; i < response.results.length; i++) {
                        var result = response.results[i];

                        setTimeout(function (result) {
                            list.append(
                                '<li class="lazy-load feed-post">' +
                                '<div class="post-image">' +
                                '<a target="blanck" href="' +
                                result.href +
                                '">' +
                                '<img src="' +
                                result.thumbnail +
                                '" alt="Image">' +
                                '</a>' +
                                '</div>' +
                                '<div class="post-content">' +
                                '<a target="blanck" href="' +
                                result.href +
                                '">' +
                                '<h3>' +
                                result.title +
                                '</h3>' +
                                '</a>' +
                                '<div class="post-date">' +
                                result.date +
                                '</div>' +
                                '<div class="list-filter-date">' +
                                result.list_filter_date +
                                '</div>' +
                                '<p>' +
                                result.description +
                                '</p>' +
                                '</div>' +
                                '</li>'
                            );
                        }, i * 100, result);

                    }
                }
            });
        }

        // function fetchArchiveDatesSingle() {
        //     // jQuery.getJSON('/wp-json/media-feeds/v1/news/' + window.filter + '/' + (window.page * 5) + '/99', function (response) {
        //     //     if (!response.total || response.total <= (window.page * 5) + 5) {
        //     //         jQuery('#view-all-posts').fadeOut();
        //     //     }
        //     jQuery.getJSON(
        //         '/wp-json/media-feeds/v1/news/' + window.filters.news + '/0/5',
        //         function (response) {
        //             var listArchive = jQuery('#blog-list-archive__single');
        //             var addedDates = [];
        //
        //             if (response.results.length) {
        //                 for (var i = 0; i < response.results.length; i++) {
        //                     var result = response.results[i];
        //                     if (addedDates.indexOf(result.archive_date) === -1) {
        //                         listArchive.append(
        //                             '<li class="archive-item">' +
        //                             '<div class="archive-date" data-date="' +
        //                             result.archive_date +
        //                             '">' +
        //                             result.archive_date +
        //                             '</div>' +
        //                             '</li>'
        //                         );
        //                         var selectElement = jQuery('#archiveSelect');
        //                         // if (addedDates.indexOf(result.archive_date) === -1) {
        //                         var option = new Option(result.archive_date, result.archive_date);
        //                         selectElement.append(option);
        //
        //                         // Add the archive_date to the addedDates array
        //                         addedDates.push(result.archive_date);
        //                     }
        //                 }
        //
        //                 let listItemContent =
        //                     '<li class="lazy-load feed-post">' +
        //                     '<div class="post-image">' +
        //                     '<a target="_blank" href="' +
        //                     result.href +
        //                     '">' +
        //                     '<img src="' +
        //                     result.thumbnail +
        //                     '" alt="Image">' +
        //                     '</a>' +
        //                     '</div>' +
        //                     '<div class="post-content">' +
        //                     '<a target="_blank" href="' +
        //                     result.href +
        //                     '">' +
        //                     '<h3>' +
        //                     result.title +
        //                     '</h3>' +
        //                     '</a>' +
        //                     '<div class="post-date">' +
        //                     result.date +
        //                     '</div>' +
        //                     '<div class="list-filter-date">' +
        //                     result.list_filter_date +
        //                     '</div>' +
        //                     '<p>' +
        //                     result.description +
        //                     '</p>' +
        //                     '</div>' +
        //                     '</li>';
        //
        //                 listArchive.find('.archive-date').click(function () {
        //                     var clickedDate = jQuery(this).data('date');
        //                     // console.log(clickedDate);
        //
        //                     var list = jQuery('#blog-list__single');
        //                     list.empty();
        //
        //                     // Перевірте кожен пост
        //                     for (var i = 0; i < response.results.length; i++) {
        //                         var result = response.results[i];
        //                         if (result.list_filter_date === clickedDate) {
        //                             list.append(listItemContent);
        //                         }
        //                     }
        //                 });
        //                 jQuery('#archiveSelect__single').change(function () {
        //                     var selectedDate = jQuery(this).val();
        //
        //                     // Clear the list before adding new posts
        //                     var list = jQuery('#blog-list__single');
        //                     list.empty();
        //
        //                     // Check each post
        //                     for (var i = 0; i < response.results.length; i++) {
        //                         var result = response.results[i];
        //                         if (result.list_filter_date === selectedDate) {
        //                             list.append(listItemContent);
        //                         }
        //                     }
        //                 });
        //             }
        //         }
        //     );
        // }

        jQuery(document).ready(function ($) {
            $('[filter-news-press]').click(function(e) {
                var filter = $(this).attr('filter-news-press');

                $('[filter-news-press]').parent().removeClass('active');
                $(this).parent().addClass('active');

                window.filter = filter;
                window.page   = 0;

                $('#blog-list__single').empty();
                $('#view-all-posts').fadeIn();

                fetchMedia();
                // fetchArchiveDatesSingle();
                e.preventDefault();
                return false;
            });

            $('#view-all-posts').click(function () {
                window.page++;
                fetchMedia();
            });
            // fetchArchiveDatesSingle();
            fetchMedia();
        });
    </script>
<?php endif; ?>
