<?php
/**
 * Header
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Set up Meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta charset="<?php bloginfo( 'charset' ); ?>">

    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, user-scalable=yes">
    <!-- Remove Microsoft Edge's & Safari phone-email styling -->
    <meta name="format-detection" content="telephone=no,email=no,url=no">

    <!-- Add external fonts below (GoogleFonts / Typekit) -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap">
    <link rel="stylesheet" href="https://use.typekit.net/cco6nzg.css">

    <?php wp_head(); ?>
</head>

<body <?php body_class( 'no-outline fxy' ); ?>>
<?php wp_body_open(); ?>

<!-- <div class="preloader hide-for-medium">
    <div class="preloader__icon"></div>
</div> -->

<!-- BEGIN of header -->
<header class="header-soue">
    <div class="grid-container menu-grid-container">
        <div class="grid-x grid-margin-x">
            <div class="medium-4 small-12 cell">
                <a href="<?php echo get_home_url(); ?>">
                    <?php if ( $page_logo = get_field( 'page_logo' ) ) : ?>
                        <?php echo display_svg( $page_logo, '', 'small' ); ?>
                    <?php endif; ?>
                </a>
            </div>
            <div class="medium-8 small-12 cell">
                <a href="#soue-about" class="soue-nav-link">
                    <?php _e('About'); ?>
                </a>
                <a href="#soue-nominate" class="soue-nav-link">
                    <?php _e('Nominate'); ?>
                </a>
                <a href="#soue-winners" class="soue-nav-link">
                    <?php _e('Past Winners'); ?>
                </a>
            </div>
        </div>
    </div>
</header>
<!-- END of header -->
