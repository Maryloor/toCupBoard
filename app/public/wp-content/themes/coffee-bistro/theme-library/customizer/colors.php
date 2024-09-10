<?php

/**
 * Color Option
 *
 * @package coffee_bistro
 */

// Primary Color.
$wp_customize->add_setting(
	'primary_color',
	array(
		'default'           => '#8e5331',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'primary_color',
		array(
			'label'    => __( 'Primary Color', 'coffee-bistro' ),
			'section'  => 'colors',
			'priority' => 5,
		)
	)
);
