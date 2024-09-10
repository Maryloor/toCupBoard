<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(get_theme_mod('coffee_bistro_website_layout', false) ? 'site-boxed--layout' : ''); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site asterthemes-site-wrapper">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'coffee-bistro' ); ?></a>
    <?php if ( get_theme_mod( 'coffee_bistro_enable_preloader', false ) === true ) { ?>
        <div id="loader">
            <div class="loader-container">
                <div id="preloader">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/resource/loader.gif' ); ?>">
                </div>
            </div>
        </div>
    <?php } ?>
    <header id="masthead" class="site-header">
    <div class="header-main-wrapper">
            <?php if ( get_theme_mod( 'coffee_bistro_enable_topbar', false ) === true ) {
                $coffee_bistro_location_topbar = get_theme_mod( 'coffee_bistro_location_topbar', '' );
                $coffee_bistro_email_topbar_address = get_theme_mod( 'coffee_bistro_email_topbar_address', '' );
                $coffee_bistro_welcome_topbar_text = get_theme_mod( 'coffee_bistro_welcome_topbar_text', '' );

                $coffee_bistro_button_header_text = get_theme_mod( 'coffee_bistro_button_header_text', '' );
                $coffee_bistro_button_header_link = get_theme_mod( 'coffee_bistro_button_header_link', '' );
            ?>
                <div class="top-header-part">
                    <div class="asterthemes-wrapper">
                        <div class="bottom-header-part-wrapper">
                            <div class="header-contact-inner">
                                <?php if ( ! empty( $coffee_bistro_location_topbar ) ) { ?>
                                    <span><i class="<?php echo esc_attr(get_theme_mod('coffee_bistro_location_icon', 'fas fa-map-marker-alt')); ?>"></i><?php echo esc_html( $coffee_bistro_location_topbar ); ?></span>
                                <?php } ?>

                            </div>
                            <div class="header-social-inner">
                                <?php if ( ! empty( $coffee_bistro_welcome_topbar_text ) ) { ?>
                                    <span><?php echo esc_html( $coffee_bistro_welcome_topbar_text ); ?></span>
                                <?php } ?>
                            </div>
                            <div class="header-contact-inner">
                                <?php if ( ! empty( $coffee_bistro_email_topbar_address ) ) { ?>
                                    <span><i class="<?php echo esc_attr(get_theme_mod('coffee_bistro_email_icon', 'far fa-envelope')); ?>"></i><?php echo esc_html( $coffee_bistro_email_topbar_address ); ?></span>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="bottom-header-outer-wrapper">
                <div class="bottom-header-part">
                    <div class="asterthemes-wrapper">
                        <div class="bottom-header-part-wrapper hello <?php echo esc_attr( get_theme_mod( 'coffee_bistro_enable_sticky_header', false ) ? 'sticky-header' : '' ); ?>">
                            <div class="bottom-header-left-part">
                                <div class="site-branding">
                                    <?php if ( has_custom_logo() ) { ?>
                                        <div class="site-logo">
                                            <?php the_custom_logo(); ?>
                                        </div>
                                    <?php } ?>
                                    <div class="site-identity">
                                        <?php
                                        $coffee_bistro_site_title_size = get_theme_mod( 'coffee_bistro_site_title_size', 36 ); 
                                        if ( get_theme_mod( 'coffee_bistro_enable_site_title_setting', true ) ) {
                                            if ( is_front_page() && is_home() ) :
                                                ?>
                                                <h1 class="site-title" style="font-size: <?php echo esc_attr( $coffee_bistro_site_title_size ); ?>px;"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                                <?php
                                            else :
                                                ?>
                                                <p class="site-title" style="font-size: <?php echo esc_attr( $coffee_bistro_site_title_size ); ?>px;"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                                                <?php
                                            endif;
                                        }

                                        if ( get_theme_mod( 'coffee_bistro_enable_tagline_setting', false ) ) :
                                            $coffee_bistro_description = get_bloginfo( 'description', 'display' );

                                            if ( $coffee_bistro_description || is_customize_preview() ) :
                                                ?>
                                                <p class="site-description">
                                                    <?php
                                                    echo esc_html( $coffee_bistro_description );
                                                    ?>
                                                </p>
                                                <?php
                                            endif;
                                            ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="navigation-menus">
                                <div class="asterthemes-wrapper">
                                    <div class="navigation-part">
                                        <nav id="site-navigation" class="main-navigation">
                                            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </button>
                                            <div class="main-navigation-links" style="<?php echo esc_attr( $coffee_bistro_menu_text_transform_css ); ?>">
                                                <?php
                                                    wp_nav_menu(
                                                        array(
                                                            'theme_location' => 'primary',
                                                        )
                                                    );
                                                ?>
                                            </div>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom-header-middle-part">
                                <?php if ( ! empty( $coffee_bistro_button_header_text ) ) { ?>
                                    <a class="asterthemes-button" href="<?php echo esc_url( $coffee_bistro_button_header_link ); ?>"><?php echo esc_html( $coffee_bistro_button_header_text ); ?></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <?php
    if ( ! is_front_page() || is_home() ) {
        if ( is_front_page() ) {
            require get_template_directory() . '/sections/sections.php';
            coffee_bistro_homepage_sections();
        }
        ?>
        <div id="content" class="site-content">
            <div class="asterthemes-wrapper">
                <div class="asterthemes-page">
                <?php } ?>
                
