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
<header class="header">
    <div class="grid-container menu-grid-container">
        <div class="grid-x grid-margin-x">
            <div class="medium-4 small-6 cell">
                <?php if ( is_front_page() ): ?>
                    <div class="logo text-center medium-text-left">
                        <h1>
                            <?php show_custom_logo(); ?><span
                                class="show-for-sr"><?php echo get_bloginfo( 'name' ); ?></span>
                        </h1>
                    </div>
                <?php else:
                    $dark_logo = get_field('header_logo_on_dark', 'options');
                    ?>
                    <div class="logo dark-logo text-center medium-text-left">
                        <h1>
                            <a href="<?php echo get_home_url();?>" class="custom-logo-link" rel="home" title="%2$s" itemscope>
                            <?php echo wp_get_attachment_image($dark_logo['id'], 'large'); ?><span
                                class="show-for-sr"><?php echo get_bloginfo( 'name' ); ?></span>
                            </a>
                        </h1>
                    </div>
                <?php endif; ?>

                <div class="scroll-logo text-center medium-text-left">
                    <h1>
                        <?php show_custom_logo(); ?><span
                            class="show-for-sr"><?php echo get_bloginfo( 'name' ); ?></span>
                    </h1>
                </div>
            </div>
            <div class="medium-8 small-6 cell">
                <?php if ( has_nav_menu( 'header-menu' ) ) : ?>
                    <div class="title-bar hide-for-large" data-responsive-toggle="main-menu" data-hide-for="large">
                        <button class="menu-icon" type="button" data-toggle aria-label="Menu" aria-controls="main-menu">
                            <span></span></button>
<!--                        <div class="title-bar-title">Menu</div>-->
                    </div>
                    <nav class="top-bar" id="main-menu">
                        <?php wp_nav_menu( array(
                            'theme_location' => 'header-menu',
                            'menu_class'     => 'menu header-menu',
                            'items_wrap'     => '<ul id="%1$s" class="%2$s" data-responsive-menu="accordion large-dropdown" data-submenu-toggle="true" data-multi-open="false" data-close-on-click-inside="false">%3$s</ul>',
                            'walker'         => new theme\FoundationNavigation()
                        ) ); ?>
                    </nav>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>
<!-- END of header -->
