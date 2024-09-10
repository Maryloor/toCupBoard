<?php

/**
 * Front Page Options
 *
 * @package Coffee Bistro
 */

$wp_customize->add_panel(
	'coffee_bistro_front_page_options',
	array(
		'title'    => esc_html__( 'Front Page Options', 'coffee-bistro' ),
		'priority' => 20,
	)
);

// Banner Section.
require get_template_directory() . '/theme-library/customizer/front-page-options/banner.php';

// Tranding Product Section.
require get_template_directory() . '/theme-library/customizer/front-page-options/services.php';