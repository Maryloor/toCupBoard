<?php

/**
 * Footer Options
 *
 * @package coffee_bistro
 */

$wp_customize->add_section(
	'coffee_bistro_footer_options',
	array(
		'panel' => 'coffee_bistro_theme_options',
		'title' => esc_html__( 'Footer Options', 'coffee-bistro' ),
	)
);

// Add Separator Custom Control
$wp_customize->add_setting( 'coffee_bistro_footer_separators', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Coffee_Bistro_Separator_Custom_Control( $wp_customize, 'coffee_bistro_footer_separators', array(
	'label' => __( 'Footer Settings', 'coffee-bistro' ),
	'section' => 'coffee_bistro_footer_options',
	'settings' => 'coffee_bistro_footer_separators',
)));

// column // 
$wp_customize->add_setting(
	'coffee_bistro_footer_widget_column',
	array(
        'default'			=> '4',
		'capability'     	=> 'edit_theme_options',
		'sanitize_callback' => 'coffee_bistro_sanitize_select',
		
	)
);	

$wp_customize->add_control(
	'coffee_bistro_footer_widget_column',
	array(
	    'label'   		=> __('Select Widget Column','coffee-bistro'),
	    'section' 		=> 'coffee_bistro_footer_options',
		'type'			=> 'select',
		'choices'        => 
		array(
			'' => __( 'None', 'coffee-bistro' ),
			'1' => __( '1 Column', 'coffee-bistro' ),
			'2' => __( '2 Column', 'coffee-bistro' ),
			'3' => __( '3 Column', 'coffee-bistro' ),
			'4' => __( '4 Column', 'coffee-bistro' )
		) 
	) 
);

//  BG Color // 
$wp_customize->add_setting('footer_background_color_setting', array(
    'default' => '#202020',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_background_color_setting', array(
    'label' => __('Footer Background Color', 'coffee-bistro'),
    'section' => 'coffee_bistro_footer_options',
)));

// Footer Background Image Setting
$wp_customize->add_setting('footer_background_image_setting', array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_background_image_setting', array(
    'label' => __('Footer Background Image', 'coffee-bistro'),
    'section' => 'coffee_bistro_footer_options',
)));

$wp_customize->add_setting('footer_text_transform', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field',
));

// Add Footer Text Transform Control
$wp_customize->add_control('footer_text_transform', array(
    'label' => __('Footer Text Transform', 'coffee-bistro'),
    'section' => 'coffee_bistro_footer_options',
    'settings' => 'footer_text_transform',
    'type' => 'select',
    'choices' => array(
        'none' => __('None', 'coffee-bistro'),
        'capitalize' => __('Capitalize', 'coffee-bistro'),
        'uppercase' => __('Uppercase', 'coffee-bistro'),
        'lowercase' => __('Lowercase', 'coffee-bistro'),
    ),
));

$wp_customize->add_setting(
	'coffee_bistro_footer_copyright_text',
	array(
		'default'           => '',
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'coffee_bistro_footer_copyright_text',
	array(
		'label'    => esc_html__( 'Copyright Text', 'coffee-bistro' ),
		'section'  => 'coffee_bistro_footer_options',
		'settings' => 'coffee_bistro_footer_copyright_text',
		'type'     => 'textarea',
	)
);


// Add Separator Custom Control
$wp_customize->add_setting( 'coffee_bistro_scroll_separators', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Coffee_Bistro_Separator_Custom_Control( $wp_customize, 'coffee_bistro_scroll_separators', array(
	'label' => __( 'Scroll Top Settings', 'coffee-bistro' ),
	'section' => 'coffee_bistro_footer_options',
	'settings' => 'coffee_bistro_scroll_separators',
)));



// Footer Options - Scroll Top.
$wp_customize->add_setting(
	'coffee_bistro_scroll_top',
	array(
		'sanitize_callback' => 'coffee_bistro_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Coffee_Bistro_Toggle_Switch_Custom_Control(
		$wp_customize,
		'coffee_bistro_scroll_top',
		array(
			'label'   => esc_html__( 'Enable Scroll Top Button', 'coffee-bistro' ),
			'section' => 'coffee_bistro_footer_options',
		)
	)
);

// icon // 
$wp_customize->add_setting(
	'coffee_bistro_scroll_btn_icon',
	array(
        'default' => 'fas fa-chevron-up',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
		
	)
);	

$wp_customize->add_control(new Coffee_Bistro_Change_Icon_Control($wp_customize, 
	'coffee_bistro_scroll_btn_icon',
	array(
	    'label'   		=> __('Scroll Top Icon','coffee-bistro'),
	    'section' 		=> 'coffee_bistro_footer_options',
		'iconset' => 'fa',
	))  
);

$wp_customize->add_setting( 'coffee_bistro_scroll_top_position', array(
    'default'           => 'bottom-right',
    'sanitize_callback' => 'coffee_bistro_sanitize_scroll_top_position',
) );

// Add control for Scroll Top Button Position
$wp_customize->add_control( 'coffee_bistro_scroll_top_position', array(
    'label'    => __( 'Scroll Top Button Position', 'coffee-bistro' ),
    'section'  => 'coffee_bistro_footer_options',
    'settings' => 'coffee_bistro_scroll_top_position',
    'type'     => 'select',
    'choices'  => array(
        'bottom-right' => __( 'Bottom Right', 'coffee-bistro' ),
        'bottom-left'  => __( 'Bottom Left', 'coffee-bistro' ),
        'bottom-center'=> __( 'Bottom Center', 'coffee-bistro' ),
    ),
) );
$wp_customize->add_setting( 'coffee_bistro_scroll_top_shape', array(
	'default'           => 'box',
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'coffee_bistro_scroll_top_shape', array(
	'label'    => __( 'Scroll to Top Button Shape', 'coffee-bistro' ),
	'section'  => 'coffee_bistro_footer_options',
	'settings' => 'coffee_bistro_scroll_top_shape',
	'type'     => 'radio',
	'choices'  => array(
		'box'        => __( 'Box', 'coffee-bistro' ),
		'curved-box' => __( 'Curved Box', 'coffee-bistro' ),
		'circle'     => __( 'Circle', 'coffee-bistro' ),
	),
) );
