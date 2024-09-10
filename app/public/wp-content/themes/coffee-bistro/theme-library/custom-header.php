<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package coffee_bistro
 */

function coffee_bistro_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'coffee_bistro_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1360,
		'height'                 => 110,
		'flex-width'         	=> true,
        'flex-height'        	=> true,
		'wp-head-callback'       => 'coffee_bistro_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'coffee_bistro_custom_header_setup' );

if ( ! function_exists( 'coffee_bistro_header_style' ) ) :

add_action( 'wp_enqueue_scripts', 'coffee_bistro_header_style' );
function coffee_bistro_header_style() {
	if ( get_header_image() ) :
	$custom_css = "
        .bottom-header-outer-wrapper{
			background-image:url('".esc_url(get_header_image())."') !important;
			background-position: center;
			background-size: cover;
		}";
	   	wp_add_inline_style( 'coffee-bistro-style', $custom_css );
	endif;
}
endif;