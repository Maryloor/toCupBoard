<?php

/**
 * Dynamic CSS
 */
function coffee_bistro_dynamic_css() {
	$primary_color = get_theme_mod( 'primary_color', '#fab915' );

	$coffee_bistro_site_title_font       = get_theme_mod( 'coffee_bistro_site_title_font', 'Raleway' );
	$coffee_bistro_site_description_font = get_theme_mod( 'coffee_bistro_site_description_font', 'Raleway' );
	$coffee_bistro_header_font           = get_theme_mod( 'coffee_bistro_header_font', 'Epilogue' );
	$coffee_bistro_content_font             = get_theme_mod( 'coffee_bistro_content_font', 'Raleway' );

	// Enqueue Google Fonts
	$fonts_url = coffee_bistro_get_fonts_url();
	if ( ! empty( $fonts_url ) ) {
		wp_enqueue_style( 'coffee-bistro-google-fonts', esc_url( $fonts_url ), array(), null );
	}

	$coffee_bistro_custom_css  = '';
	$coffee_bistro_custom_css .= '
    /* Color */
    :root {
        --primary-color: ' . esc_attr( $primary_color ) . ';
        --header-text-color: ' . esc_attr( '#' . get_header_textcolor() ) . ';
    }
    ';

	$coffee_bistro_custom_css .= '
    /* Typography */
    :root {
        --font-heading: "' . esc_attr( $coffee_bistro_header_font ) . '", serif;
        --font-main: -apple-system, BlinkMacSystemFont, "' . esc_attr( $coffee_bistro_content_font ) . '", "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
    }

    body,
	button, input, select, optgroup, textarea, p {
        font-family: "' . esc_attr( $coffee_bistro_content_font ) . '", serif;
	}

	.site-identity p.site-title, h1.site-title a, h1.site-title, p.site-title a, .site-branding h1.site-title a {
        font-family: "' . esc_attr( $coffee_bistro_site_title_font ) . '", serif;
	}
    
	p.site-description {
        font-family: "' . esc_attr( $coffee_bistro_site_description_font ) . '", serif !important;
	}
    ';

	wp_add_inline_style( 'coffee-bistro-style', $coffee_bistro_custom_css );
}
add_action( 'wp_enqueue_scripts', 'coffee_bistro_dynamic_css', 99 );
