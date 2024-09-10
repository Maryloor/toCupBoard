<?php

/**
 * Services Section
 *
 * @package coffee_bistro
 */

$wp_customize->add_section(
	'coffee_bistro_service_section',
	array(
		'panel'    => 'coffee_bistro_front_page_options',
		'title'    => esc_html__( 'Services Section', 'coffee-bistro' ),
		'priority' => 10,
	)
);

//Service Section - Enable Section.
$wp_customize->add_setting(
	'coffee_bistro_enable_service_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'coffee_bistro_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Coffee_Bistro_Toggle_Switch_Custom_Control(
		$wp_customize,
		'coffee_bistro_enable_service_section',
		array(
			'label'    => esc_html__( 'Enable Service Section', 'coffee-bistro' ),
			'section'  => 'coffee_bistro_service_section',
			'settings' => 'coffee_bistro_enable_service_section'
		)
	)
);

// Services Section - Left Content Type.
$wp_customize->add_setting(
	'coffee_bistro_service_left_content_type',
	array(
		'default'           => 'page',
		'sanitize_callback' => 'coffee_bistro_sanitize_select',
	)
);

$wp_customize->add_control(
	'coffee_bistro_service_left_content_type',
	array(
		'label'           => esc_html__( 'Select Left Content Type', 'coffee-bistro' ),
		'section'         => 'coffee_bistro_service_section',
		'settings'        => 'coffee_bistro_service_left_content_type',
		'type'            => 'select',
		'active_callback' => 'coffee_bistro_is_service_section_enabled',
		'choices'         => array(
			'page' => esc_html__( 'Page', 'coffee-bistro' ),
			'post' => esc_html__( 'Post', 'coffee-bistro' ),
		),
	)
);

for ( $i = 1; $i <= 3; $i++ ) {

	// Service Section - Select Post.
	$wp_customize->add_setting(
		'coffee_bistro_service_left_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'coffee_bistro_service_left_content_post_' . $i,
		array(
			'label'           => esc_html__( 'Select Left Post ', 'coffee-bistro' ) . $i,
			'section'         => 'coffee_bistro_service_section',
			'settings'        => 'coffee_bistro_service_left_content_post_' . $i,
			'active_callback' => 'coffee_bistro_is_service_left_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => coffee_bistro_get_post_choices(),
		)
	);

	// Service Section - Select Page.
	$wp_customize->add_setting(
		'coffee_bistro_service_left_content_page_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'coffee_bistro_service_left_content_page_' . $i,
		array(
			'label'           => esc_html__( 'Select Left Page ', 'coffee-bistro' ) . $i,
			'section'         => 'coffee_bistro_service_section',
			'settings'        => 'coffee_bistro_service_left_content_page_' . $i,
			'active_callback' => 'coffee_bistro_is_service_left_section_and_content_type_page_enabled',
			'type'            => 'select',
			'choices'         => coffee_bistro_get_page_choices(),
		)
	);
}

// Services Section - Right Content Type.
$wp_customize->add_setting(
	'coffee_bistro_service_right_content_type',
	array(
		'default'           => 'page',
		'sanitize_callback' => 'coffee_bistro_sanitize_select',
	)
);

$wp_customize->add_control(
	'coffee_bistro_service_right_content_type',
	array(
		'label'           => esc_html__( 'Select Right Content Type', 'coffee-bistro' ),
		'section'         => 'coffee_bistro_service_section',
		'settings'        => 'coffee_bistro_service_right_content_type',
		'type'            => 'select',
		'active_callback' => 'coffee_bistro_is_service_section_enabled',
		'choices'         => array(
			'page' => esc_html__( 'Page', 'coffee-bistro' ),
			'post' => esc_html__( 'Post', 'coffee-bistro' ),
		),
	)
);

for ( $i = 1; $i <= 3; $i++ ) {

	// Service Section - Select Post.
	$wp_customize->add_setting(
		'coffee_bistro_service_right_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'coffee_bistro_service_right_content_post_' . $i,
		array(
			'label'           => esc_html__( 'Select Right Post ', 'coffee-bistro' ) . $i,
			'section'         => 'coffee_bistro_service_section',
			'settings'        => 'coffee_bistro_service_right_content_post_' . $i,
			'active_callback' => 'coffee_bistro_is_service_right_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => coffee_bistro_get_post_choices(),
		)
	);

	// Service Section - Select Page.
	$wp_customize->add_setting(
		'coffee_bistro_service_right_content_page_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'coffee_bistro_service_right_content_page_' . $i,
		array(
			'label'           => esc_html__( 'Select Right Page ', 'coffee-bistro' ) . $i,
			'section'         => 'coffee_bistro_service_section',
			'settings'        => 'coffee_bistro_service_right_content_page_' . $i,
			'active_callback' => 'coffee_bistro_is_service_right_section_and_content_type_page_enabled',
			'type'            => 'select',
			'choices'         => coffee_bistro_get_page_choices(),
		)
	);
}

// Service Section - Services Icons.
$wp_customize->add_setting(
	'coffee_bistro_center_services_images',
	array(
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'coffee_bistro_center_services_images',
		array(
			'label'           => sprintf( esc_html__( 'Service Image', 'coffee-bistro' ), ),
			'section'         => 'coffee_bistro_service_section',
			'settings'        => 'coffee_bistro_center_services_images',
			'active_callback' => 'coffee_bistro_is_service_section_enabled',
		)
	)
);