<?php

/**
 * Sidebar Position
 *
 * @package coffee_bistro
 */

$wp_customize->add_section(
	'coffee_bistro_sidebar_position',
	array(
		'title' => esc_html__( 'Sidebar Position', 'coffee-bistro' ),
		'panel' => 'coffee_bistro_theme_options',
	)
);

// Add Separator Custom Control
$wp_customize->add_setting( 'coffee_bistro_global_sidebar_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Coffee_Bistro_Separator_Custom_Control( $wp_customize, 'coffee_bistro_global_sidebar_separator', array(
	'label' => __( 'Global Sidebar Position', 'coffee-bistro' ),
	'section' => 'coffee_bistro_sidebar_position',
	'settings' => 'coffee_bistro_global_sidebar_separator',
)));

// Sidebar Position - Global Sidebar Position.
$wp_customize->add_setting(
	'coffee_bistro_sidebar_position',
	array(
		'sanitize_callback' => 'coffee_bistro_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'coffee_bistro_sidebar_position',
	array(
		'label'   => esc_html__( 'Select Sidebar Position', 'coffee-bistro' ),
		'section' => 'coffee_bistro_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'coffee-bistro' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'coffee-bistro' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'coffee-bistro' ),
		),
	)
);

// Add Separator Custom Control
$wp_customize->add_setting( 'coffee_bistro_post_sidebar_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Coffee_Bistro_Separator_Custom_Control( $wp_customize, 'coffee_bistro_post_sidebar_separator', array(
	'label' => __( 'Post Sidebar Position', 'coffee-bistro' ),
	'section' => 'coffee_bistro_sidebar_position',
	'settings' => 'coffee_bistro_post_sidebar_separator',
)));

// Sidebar Position - Post Sidebar Position.
$wp_customize->add_setting(
	'coffee_bistro_post_sidebar_position',
	array(
		'sanitize_callback' => 'coffee_bistro_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'coffee_bistro_post_sidebar_position',
	array(
		'label'   => esc_html__( 'Select Sidebar Position', 'coffee-bistro' ),
		'section' => 'coffee_bistro_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'coffee-bistro' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'coffee-bistro' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'coffee-bistro' ),
		),
	)
);

// Add Separator Custom Control
$wp_customize->add_setting( 'coffee_bistro_page_sidebar_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Coffee_Bistro_Separator_Custom_Control( $wp_customize, 'coffee_bistro_page_sidebar_separator', array(
	'label' => __( 'Page Sidebar Position', 'coffee-bistro' ),
	'section' => 'coffee_bistro_sidebar_position',
	'settings' => 'coffee_bistro_page_sidebar_separator',
)));

// Sidebar Position - Page Sidebar Position.
$wp_customize->add_setting(
	'coffee_bistro_page_sidebar_position',
	array(
		'sanitize_callback' => 'coffee_bistro_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'coffee_bistro_page_sidebar_position',
	array(
		'label'   => esc_html__( 'Select Sidebar Position', 'coffee-bistro' ),
		'section' => 'coffee_bistro_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'coffee-bistro' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'coffee-bistro' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'coffee-bistro' ),
		),
	)
);


// Add Separator Custom Control
$wp_customize->add_setting( 'coffee_bistro_sidebar_width_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Coffee_Bistro_Separator_Custom_Control( $wp_customize, 'coffee_bistro_sidebar_width_separator', array(
	'label' => __( 'Sidebar Width Setting', 'coffee-bistro' ),
	'section' => 'coffee_bistro_sidebar_position',
	'settings' => 'coffee_bistro_sidebar_width_separator',
)));


$wp_customize->add_setting( 'coffee_bistro_sidebar_width', array(
	'default'           => '30',
	'sanitize_callback' => 'coffee_bistro_sanitize_range_value',
) );

$wp_customize->add_control(new Coffee_Bistro_Customize_Range_Control($wp_customize, 'coffee_bistro_sidebar_width', array(
	'section'     => 'coffee_bistro_sidebar_position',
	'label'       => __( 'Adjust Sidebar Width', 'coffee-bistro' ),
	'description' => __( 'Adjust the width of the sidebar.', 'coffee-bistro' ),
	'input_attrs' => array(
		'min'  => 10,
		'max'  => 50,
		'step' => 1,
	),
)));