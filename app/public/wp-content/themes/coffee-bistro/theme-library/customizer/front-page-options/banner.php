<?php

/**
 * Banner Section
 *
 * @package coffee_bistro
 */

$wp_customize->add_section(
	'coffee_bistro_banner_section',
	array(
		'panel'    => 'coffee_bistro_front_page_options',
		'title'    => esc_html__( 'Banner Section', 'coffee-bistro' ),
		'priority' => 10,
	)
);

// Banner Section - Enable Section.
$wp_customize->add_setting(
	'coffee_bistro_enable_banner_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'coffee_bistro_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Coffee_Bistro_Toggle_Switch_Custom_Control(
		$wp_customize,
		'coffee_bistro_enable_banner_section',
		array(
			'label'    => esc_html__( 'Enable Banner Section', 'coffee-bistro' ),
			'section'  => 'coffee_bistro_banner_section',
			'settings' => 'coffee_bistro_enable_banner_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'coffee_bistro_enable_banner_section',
		array(
			'selector' => '#coffee_bistro_banner_section .section-link',
			'settings' => 'coffee_bistro_enable_banner_section',
		)
	);
}

// Banner Section - Banner Slider Content Type.
$wp_customize->add_setting(
	'coffee_bistro_banner_slider_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'coffee_bistro_sanitize_select',
	)
);

$wp_customize->add_control(
	'coffee_bistro_banner_slider_content_type',
	array(
		'label'           => esc_html__( 'Select Banner Slider Content Type', 'coffee-bistro' ),
		'section'         => 'coffee_bistro_banner_section',
		'settings'        => 'coffee_bistro_banner_slider_content_type',
		'type'            => 'select',
		'active_callback' => 'coffee_bistro_is_banner_slider_section_enabled',
		'choices'         => array(
			'page' => esc_html__( 'Page', 'coffee-bistro' ),
			'post' => esc_html__( 'Post', 'coffee-bistro' ),
		),
	)
);

for ( $i = 1; $i <= 3; $i++ ) {

	// Banner Section - Select Banner Post.
	$wp_customize->add_setting(
		'coffee_bistro_banner_slider_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'coffee_bistro_banner_slider_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'coffee-bistro' ), $i ),
			'section'         => 'coffee_bistro_banner_section',
			'settings'        => 'coffee_bistro_banner_slider_content_post_' . $i,
			'active_callback' => 'coffee_bistro_is_banner_slider_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => coffee_bistro_get_post_choices(),
		)
	);

	// Banner Section - Select Banner Page.
	$wp_customize->add_setting(
		'coffee_bistro_banner_slider_content_page_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'coffee_bistro_banner_slider_content_page_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Page %d', 'coffee-bistro' ), $i ),
			'section'         => 'coffee_bistro_banner_section',
			'settings'        => 'coffee_bistro_banner_slider_content_page_' . $i,
			'active_callback' => 'coffee_bistro_is_banner_slider_section_and_content_type_page_enabled',
			'type'            => 'select',
			'choices'         => coffee_bistro_get_page_choices(),
		)
	);

	// Banner Section - Button Label.
	$wp_customize->add_setting(
		'coffee_bistro_banner_button_label_' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'coffee_bistro_banner_button_label_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Button Label %d', 'coffee-bistro' ), $i ),
			'section'         => 'coffee_bistro_banner_section',
			'settings'        => 'coffee_bistro_banner_button_label_' . $i,
			'type'            => 'text',
			'active_callback' => 'coffee_bistro_is_banner_slider_section_enabled',
		)
	);

	// Banner Section - Button Link.
	$wp_customize->add_setting(
		'coffee_bistro_banner_button_link_' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'coffee_bistro_banner_button_link_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Button Link %d', 'coffee-bistro' ), $i ),
			'section'         => 'coffee_bistro_banner_section',
			'settings'        => 'coffee_bistro_banner_button_link_' . $i,
			'type'            => 'url',
			'active_callback' => 'coffee_bistro_is_banner_slider_section_enabled',
		)
	);
}
