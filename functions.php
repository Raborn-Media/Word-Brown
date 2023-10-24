<?php
/**
 * Functions
 */

// Declaring the assets manifest
$manifest_json = get_theme_file_path() . '/dist/assets.json';
$assets        = [
    'manifest'  => file_exists($manifest_json) ? json_decode(file_get_contents($manifest_json), true) : [],
    'dist'      => get_theme_file_uri() . '/dist',
    'dist_path' => get_theme_file_path() . '/dist',
];
unset($manifest_json);

/**
 * Retrieve the path to the asset, use hashed version if exists
 *
 * @param $asset
 * @param boolean $path Defines if returned result is a path or a url
 *
 * @return string
 */
function asset_path($asset, $path = false)
{
    global $assets;
    $asset = isset($assets['manifest'][ $asset ]) ? $assets['manifest'][ $asset ] : $asset;

    return "{$assets[$path ? 'dist_path' : 'dist']}/{$asset}";
}

/******************************************************************************
 * Constants
 *****************************************************************************/
define('IMAGE_PLACEHOLDER', asset_path('images/placeholder.jpg'));

/******************************************************************************
 * Included Functions
 *****************************************************************************/
if (file_exists($composer = __DIR__ . '/vendor/autoload.php')) {
    require_once $composer;
}

array_map(function ($file) {
    $file = "/inc/{$file}.php";
    if (! locate_template($file, true, true)) {
        echo sprintf(__('Error locating <code>%s</code> for inclusion.', 'fxy'), $file);
    }
}, [
    'helpers',
    'recommended-plugins',
    'class-foundation-navigation',
    'class-dynamic-admin',
    'class-lazyload',
    'theme-customizations',
//    'home-slider',
    'svg-support',
    'gravity-form-customizations',
    'custom-fields-search',
    'google-maps',
    'tiny-mce-customizations',
//    'posttypes',
    'rest',
//    'gutenberg-support', // !!!IMPORTANT  Comment line 159 for enable Gutenberg
//    'woo-customizations',
//    'divi-support',
//    'elementor-support',
//    'shortcodes',
]);

// Register ACF Gravity Forms field
add_action('init', function () {
    if (class_exists('ACF')) {
        require_once 'inc/class-fxy-acf-field-gf-field-v5.php';
    }
});

// Prevent Fatal error on site if ACF not installed/activated
add_action('wp', function () {
    include_once 'inc/acf-placeholder.php';
}, PHP_INT_MAX);

/******************************************************************************
 * Enqueue Scripts and Styles for Front-End
 *****************************************************************************/
add_action('init', function () {
    wp_register_script('runtime.js', asset_path('scripts/runtime.js'), [], null, true);
    wp_register_script('vendor.js', asset_path('scripts/vendor.js'), [], null, true);
    if (file_exists(asset_path('styles/vendor.css', true))) {
        wp_register_style('vendor.css', asset_path('styles/vendor.css'), [], null);
    }
});

add_action('wp_enqueue_scripts', function () {
    if (! is_admin()) {
        // Disable gutenberg built-in styles
        // wp_dequeue_style('wp-block-library');

        wp_enqueue_script('jquery');

        wp_enqueue_style('vendor.css');
        wp_enqueue_style('main.css', asset_path('styles/main.css'), [], null);
        wp_enqueue_script(
            'main.js',
            asset_path('scripts/main.js'),
            [ 'jquery', 'runtime.js', 'vendor.js' ],
            null,
            true
        );

        wp_localize_script(
            'main.js',
            'ajax_object',
            [
                'ajax_url' => admin_url('admin-ajax.php'),
                'nonce'    => wp_create_nonce('project_nonce'),
            ]
        );
    }
});

/******************************************************************************
 * Additional Functions
 *****************************************************************************/

// Dynamic Admin
if (class_exists('theme\DynamicAdmin') && is_admin()) {
    $dynamic_admin = new theme\DynamicAdmin();
//    $dynamic_admin->addField('page', 'template', __('Page Template', 'fxy'), 'template_detail_field_for_page');
    $dynamic_admin->run();
}

// Apply lazyload to whole page content
if (class_exists('theme\CreateLazyImg')) {
    add_action(
        'template_redirect',
        function () {
            ob_start(function ($html) {
                $lazy   = new theme\CreateLazyImg;
                $buffer = $lazy->ignoreScripts($html);
                $buffer = $lazy->ignoreNoscripts($buffer);

                $html = $lazy->lazyloadImages($html, $buffer);
                $html = $lazy->lazyloadPictures($html, $buffer);
                $html = $lazy->lazyloadBackgroundImages($html, $buffer);

                return $html;
            });
        }
    );
}

/*********************** PUT YOU FUNCTIONS BELOW *****************************/

// Custom media library's image sizes
add_image_size('full_hd', 1920, 0, [ 'center', 'center' ]);
add_image_size('large_high', 1024, 0, false);
// add_image_size( 'name', width, height, ['center','center']);

// Disable gutenberg
add_filter('use_block_editor_for_post_type', '__return_false');

/*****************************************************************************/
////////////////////////////////////////////////////////////////////////
// API ENDPOINTS FOR MEDIA FEEDS
////////////////////////////////////////////////////////////////////////
include_once(ABSPATH . WPINC . '/feed.php');

function get_news_feeds($data)
{
    $count  = intval($data['count']);
    $skip   = intval($data['skip']);
    $filter = $data['filter'];
    $total  = 0;

//    TODO: Switch Cal to https:www.mycalchoice.com/feed
    $feed_results = [];
    $feed_sources = [
        'all'       => [
            'http://mycalchoice.staging.wpengine.com/feed/',
            'http://brokerblog.wordandbrown.com/feed'
        ],
        'wbgeneral' => [
            'http://brokerblog.wordandbrown.com/feed'
        ],
        'calchoice' => [
            'http://mycalchoice.staging.wpengine.com/feed/'
        ]
    ];

    foreach ($feed_sources[ $filter ] as $source) {
        $result = fetch_feed($source);

        if (! is_wp_error($result)) {
            $total        += $result->get_item_quantity();
            $max          = $result->get_item_quantity($skip + $count);
            $feed_results = array_merge($feed_results, $result->get_items(0, $max));
        }
    }

    if (count($feed_results)) {
        $feed_results = array_map(function ($result) {

            return [
                'title'        => $result->get_title(),
                'description'  => explode('...', strip_tags($result->get_description()))[0] . '...',
                'author'       => $result->get_author()->name,
                'thumbnail'    => 'https://ad24d43cb5.nxcli.io/wp-content/uploads/2023/10/partners-employers-img.jpg',
//                'thumbnail'   => $result->data['child']['http://search.yahoo.com/mrss/']['group'][0]['child']['http://search.yahoo.com/mrss/']['thumbnail'][0]['attribs']['']['url'],
                'href'         => $result->get_link(),
                'category'     => $result->data['child']['']['category'][0]['data'],
                'date'         => date('F d, Y', strtotime($result->get_date())),
                'list_filter_date' => date('F Y', strtotime($result->get_date())),
                'archive_date' => date('F Y', strtotime($result->get_date())),
            ];
        }, $feed_results);

        usort($feed_results, function ($a, $b) {
            return $a['timestamp'] < $b['timestamp'];
        });

        $feed_results = array_slice($feed_results, $skip, $count);
    }

    return [
        'results' => $feed_results,
        'total'   => $total
    ];
}

//function get_social_feeds( $data ) {
//    $count  = intval( $data['count'] );
//    $skip   = intval( $data['skip'] );
//    $filter = $data['filter'];
//    $total  = 0;
//
//    $feed_results = [];
//    $feed_sources = [
//        'all'       => [
//            'https://twitrss.me/twitter_user_to_rss/?user=wordandbrownga',
//            'https://twitrss.me/twitter_user_to_rss/?user=CAChoice'
//        ],
//        'wbgeneral' => [
//            'https://twitrss.me/twitter_user_to_rss/?user=wordandbrownga'
//        ],
//        'calchoice' => [
//            'https://twitrss.me/twitter_user_to_rss/?user=CAChoice'
//        ]
//    ];
//
//    foreach ( $feed_sources[ $filter ] as $source ) {
//        $result = fetch_feed( $source );
//
//        if ( ! is_wp_error( $result ) ) {
//            $total        += $result->get_item_quantity();
//            $max          = $result->get_item_quantity( $skip + $count );
//            $feed_results = array_merge( $feed_results, $result->get_items( 0, $max ) );
//        }
//    }
//
//    if ( count( $feed_results ) ) {
//        $feed_results = array_map( function ( $result ) {
//            return [
//                'description' => $result->get_description(),
//                'href'        => $result->get_link(),
//                'id'          => substr( $result->get_link(), strrpos( $result->get_link(), '/' ) + 1 ),
//                'author'      => str_replace( [
//                    '(',
//                    ')'
//                ], '', $result->data['child']['http://purl.org/dc/elements/1.1/']['creator'][0]['data'] ),
//                'date'        => human_time_diff( strtotime( $result->get_date() ) ),
//                'timestamp'   => strtotime( $result->get_date() )
//            ];
//        }, $feed_results );
//
//        usort( $feed_results, function ( $a, $b ) {
//            return $a['timestamp'] < $b['timestamp'];
//        } );
//
//        $feed_results = array_slice( $feed_results, $skip, $count );
//    }
//
//    return [
//        'results' => $feed_results,
//        'total'   => $total
//    ];
//}

function get_video_feeds($data)
{
    $count  = intval($data['count']);
    $skip   = intval($data['skip']);
    $filter = $data['filter'];
    $total  = 0;

    $feed_results = [];
    $feed_sources = [
        'all'       => [
            'https://www.youtube.com/feeds/videos.xml?channel_id=UCxF8-IbTRZ1ac3gRLXHj2FA',
            'https://www.youtube.com/feeds/videos.xml?channel_id=UC4ihCh6Xbv7XT77k3wCEQQA'
        ],
        'wbgeneral' => [
            'https://www.youtube.com/feeds/videos.xml?channel_id=UC4ihCh6Xbv7XT77k3wCEQQA'
        ],
        'calchoice' => [
            'https://www.youtube.com/feeds/videos.xml?channel_id=UCxF8-IbTRZ1ac3gRLXHj2FA'
        ]
    ];

    foreach ($feed_sources[ $filter ] as $source) {
        $result = fetch_feed($source);

        if (! is_wp_error($result)) {
            $total        += $result->get_item_quantity();
            $max          = $result->get_item_quantity($skip + $count);
            $feed_results = array_merge($feed_results, $result->get_items(0, $max));
        }
    }

    if (count($feed_results)) {
        $feed_results = array_map(function ($result) {
            return [
                'title'       => $result->get_title(),
                'description' => $result->data['child']['http://search.yahoo.com/mrss/']['group'][0]['child']['http://search.yahoo.com/mrss/']['description'][0]['data'],
                'thumbnail'   => $result->data['child']['http://search.yahoo.com/mrss/']['group'][0]['child']['http://search.yahoo.com/mrss/']['thumbnail'][0]['attribs']['']['url'],
                'href'        => $result->get_link(),
                'author'      => $result->get_author()->name,
                'timestamp'   => date('F d, Y', $result->data['date']['parsed'])

            ];
        }, $feed_results);

        usort($feed_results, function ($a, $b) {
            return $a['timestamp'] < $b['timestamp'];
        });

        $feed_results = array_slice($feed_results, $skip, $count);
    }

    return [
        'results' => $feed_results,
        'total'   => $total
    ];
}

add_action('rest_api_init', function () {
    register_rest_route('media-feeds/v1', '/news/(?P<filter>\w+)/(?P<skip>\d+)/(?P<count>\d+)', array(
        'methods'  => 'GET',
        'callback' => 'get_news_feeds'
    ));

    register_rest_route('media-feeds/v1', '/social/(?P<filter>\w+)/(?P<skip>\d+)/(?P<count>\d+)', array(
        'methods'  => 'GET',
        'callback' => 'get_social_feeds'
    ));

    register_rest_route('media-feeds/v1', '/videos/(?P<filter>\w+)/(?P<skip>\d+)/(?P<count>\d+)', array(
        'methods'  => 'GET',
        'callback' => 'get_video_feeds'
    ));
});
