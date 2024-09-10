<?php

/**
 * Excerpt
 *
 * @package coffee_bistro
 */

$wp_customize->add_section(
	'coffee_bistro_excerpt_options',
	array(
		'panel' => 'coffee_bistro_theme_options',
		'title' => esc_html__( 'Excerpt', 'coffee-bistro' ),
	)
);

// Excerpt - Excerpt Length.
$wp_customize->add_setting(
	'coffee_bistro_excerpt_length',
	array(
		'default'           => 20,
		'sanitize_callback' => 'absint',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'coffee_bistro_excerpt_length',
	array(
		'label'       => esc_html__( 'Excerpt Length (no. of words)', 'coffee-bistro' ),
		'section'     => 'coffee_bistro_excerpt_options',
		'settings'    => 'coffee_bistro_excerpt_length',
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 10,
			'max'  => 200,
			'step' => 1,
		),
	)
);