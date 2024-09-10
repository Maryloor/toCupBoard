<?php

/**
 * Typography Settings
 *
 * @package coffee_bistro
 */

// Typography Settings
$wp_customize->add_section(
    'coffee_bistro_typography_setting',
    array(
        'panel' => 'coffee_bistro_theme_options',
        'title' => esc_html__( 'Typography Settings', 'coffee-bistro' ),
    )
);

$wp_customize->add_setting(
    'coffee_bistro_site_title_font',
    array(
        'default'           => 'Raleway',
        'sanitize_callback' => 'coffee_bistro_sanitize_google_fonts',
    )
);

$wp_customize->add_control(
    'coffee_bistro_site_title_font',
    array(
        'label'    => esc_html__( 'Site Title Font Family', 'coffee-bistro' ),
        'section'  => 'coffee_bistro_typography_setting',
        'settings' => 'coffee_bistro_site_title_font',
        'type'     => 'select',
        'choices'  => coffee_bistro_get_all_google_font_families(),
    )
);

// Typography - Site Description Font.
$wp_customize->add_setting(
	'coffee_bistro_site_description_font',
	array(
		'default'           => 'Raleway',
		'sanitize_callback' => 'coffee_bistro_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'coffee_bistro_site_description_font',
	array(
		'label'    => esc_html__( 'Site Description Font Family', 'coffee-bistro' ),
		'section'  => 'coffee_bistro_typography_setting',
		'settings' => 'coffee_bistro_site_description_font',
		'type'     => 'select',
		'choices'  => coffee_bistro_get_all_google_font_families(),
	)
);

// Typography - Header Font.
$wp_customize->add_setting(
	'coffee_bistro_header_font',
	array(
		'default'           => 'Epilogue',
		'sanitize_callback' => 'coffee_bistro_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'coffee_bistro_header_font',
	array(
		'label'    => esc_html__( 'Heading Font Family', 'coffee-bistro' ),
		'section'  => 'coffee_bistro_typography_setting',
		'settings' => 'coffee_bistro_header_font',
		'type'     => 'select',
		'choices'  => coffee_bistro_get_all_google_font_families(),
	)
);

// Typography - Body Font.
$wp_customize->add_setting(
	'coffee_bistro_content_font',
	array(
		'default'           => 'Raleway',
		'sanitize_callback' => 'coffee_bistro_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'coffee_bistro_content_font',
	array(
		'label'    => esc_html__( 'Content Font Family', 'coffee-bistro' ),
		'section'  => 'coffee_bistro_typography_setting',
		'settings' => 'coffee_bistro_content_font',
		'type'     => 'select',
		'choices'  => coffee_bistro_get_all_google_font_families(),
	)
);
