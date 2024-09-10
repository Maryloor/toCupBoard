<?php

/**
 * Single Post Options
 *
 * @package coffee_bistro
 */

$wp_customize->add_section(
	'coffee_bistro_single_post_options',
	array(
		'title' => esc_html__( 'Single Post Options', 'coffee-bistro' ),
		'panel' => 'coffee_bistro_theme_options',
	)
);



// Post Options - Show / Hide Date.
$wp_customize->add_setting(
	'coffee_bistro_single_post_hide_date',
	array(
		'default'           => false,
		'sanitize_callback' => 'coffee_bistro_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Coffee_Bistro_Toggle_Switch_Custom_Control(
		$wp_customize,
		'coffee_bistro_single_post_hide_date',
		array(
			'label'   => esc_html__( 'Show / Hide Date', 'coffee-bistro' ),
			'section' => 'coffee_bistro_single_post_options',
		)
	)
);

// Post Options - Show / Hide Author.
$wp_customize->add_setting(
	'coffee_bistro_single_post_hide_author',
	array(
		'default'           => false,
		'sanitize_callback' => 'coffee_bistro_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Coffee_Bistro_Toggle_Switch_Custom_Control(
		$wp_customize,
		'coffee_bistro_single_post_hide_author',
		array(
			'label'   => esc_html__( 'Show / Hide Author', 'coffee-bistro' ),
			'section' => 'coffee_bistro_single_post_options',
		)
	)
);

// Post Options - Show / Hide Category.
$wp_customize->add_setting(
	'coffee_bistro_single_post_hide_category',
	array(
		'default'           => false,
		'sanitize_callback' => 'coffee_bistro_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Coffee_Bistro_Toggle_Switch_Custom_Control(
		$wp_customize,
		'coffee_bistro_single_post_hide_category',
		array(
			'label'   => esc_html__( 'Show / Hide Category', 'coffee-bistro' ),
			'section' => 'coffee_bistro_single_post_options',
		)
	)
);

// Post Options - Show / Hide Tag.
$wp_customize->add_setting(
	'coffee_bistro_post_hide_tags',
	array(
		'default'           => false,
		'sanitize_callback' => 'coffee_bistro_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Coffee_Bistro_Toggle_Switch_Custom_Control(
		$wp_customize,
		'coffee_bistro_post_hide_tags',
		array(
			'label'   => esc_html__( 'Show / Hide Tag', 'coffee-bistro' ),
			'section' => 'coffee_bistro_single_post_options',
		)
	)
);


// Add Separator Custom Control
$wp_customize->add_setting( 'coffee_bistro_related_post_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Coffee_Bistro_Separator_Custom_Control( $wp_customize, 'coffee_bistro_related_post_separator', array(
	'label' => __( 'Enable / Disable Related Post Section', 'coffee-bistro' ),
	'section' => 'coffee_bistro_single_post_options',
	'settings' => 'coffee_bistro_related_post_separator',
)));

// Post Options - Show / Hide Related Posts.
$wp_customize->add_setting(
	'coffee_bistro_post_hide_related_posts',
	array(
		'default'           => false,
		'sanitize_callback' => 'coffee_bistro_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Coffee_Bistro_Toggle_Switch_Custom_Control(
		$wp_customize,
		'coffee_bistro_post_hide_related_posts',
		array(
			'label'   => esc_html__( 'Show / Hide Related Posts', 'coffee-bistro' ),
			'section' => 'coffee_bistro_single_post_options',
		)
	)
);

// Register setting for number of related posts
$wp_customize->add_setting(
	'coffee_bistro_related_posts_count',
	array(
		'default'           => 3,
		'sanitize_callback' => 'absint', // Ensure it's an integer
	)
);

// Add control for number of related posts
$wp_customize->add_control(
	'coffee_bistro_related_posts_count',
	array(
		'type'        => 'number',
		'label'       => esc_html__( 'Number of Related Posts to Display', 'coffee-bistro' ),
		'section'     => 'coffee_bistro_single_post_options',
		'input_attrs' => array(
			'min'  => 1,
			'max'  => 3, // Adjust maximum based on your preference
			'step' => 1,
		),
	)
);

// Post Options - Related Post Label.
$wp_customize->add_setting(
	'coffee_bistro_post_related_post_label',
	array(
		'default'           => __( 'Related Posts', 'coffee-bistro' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'coffee_bistro_post_related_post_label',
	array(
		'label'    => esc_html__( 'Related Posts Label', 'coffee-bistro' ),
		'section'  => 'coffee_bistro_single_post_options',
		'settings' => 'coffee_bistro_post_related_post_label',
		'type'     => 'text',
	)
);


