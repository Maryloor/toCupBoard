<?php

/**
 * Header Options
 *
 * @package coffee_bistro
 */
// ---------------------------------------- GENERAL OPTIONBS ----------------------------------------------------


// ---------------------------------------- PRELOADER ----------------------------------------------------

$wp_customize->add_section(
	'coffee_bistro_general_options',
	array(
		'panel' => 'coffee_bistro_theme_options',
		'title' => esc_html__( 'General Options', 'coffee-bistro' ),
	)
);

// Add Separator Custom Control
$wp_customize->add_setting( 'coffee_bistro_preloader_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Coffee_Bistro_Separator_Custom_Control( $wp_customize, 'coffee_bistro_preloader_separator', array(
	'label' => __( 'Enable / Disable Site Preloader Section', 'coffee-bistro' ),
	'section' => 'coffee_bistro_general_options',
	'settings' => 'coffee_bistro_preloader_separator',
) ) );

// General Options - Enable Preloader.
$wp_customize->add_setting(
	'coffee_bistro_enable_preloader',
	array(
		'sanitize_callback' => 'coffee_bistro_sanitize_switch',
		'default'           => false,
	)
);

$wp_customize->add_control(
	new Coffee_Bistro_Toggle_Switch_Custom_Control(
		$wp_customize,
		'coffee_bistro_enable_preloader',
		array(
			'label'   => esc_html__( 'Enable Preloader', 'coffee-bistro' ),
			'section' => 'coffee_bistro_general_options',
		)
	)
);



// ---------------------------------------- PAGINATION ----------------------------------------------------


// Add Separator Custom Control
$wp_customize->add_setting( 'coffee_bistro_pagination_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Coffee_Bistro_Separator_Custom_Control( $wp_customize, 'coffee_bistro_pagination_separator', array(
	'label' => __( 'Enable / Disable Pagination Section', 'coffee-bistro' ),
	'section' => 'coffee_bistro_general_options',
	'settings' => 'coffee_bistro_pagination_separator',
) ) );

// Pagination - Enable Pagination.
$wp_customize->add_setting(
	'coffee_bistro_enable_pagination',
	array(
		'default'           => true,
		'sanitize_callback' => 'coffee_bistro_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Coffee_Bistro_Toggle_Switch_Custom_Control(
		$wp_customize,
		'coffee_bistro_enable_pagination',
		array(
			'label'    => esc_html__( 'Enable Pagination', 'coffee-bistro' ),
			'section'  => 'coffee_bistro_general_options',
			'settings' => 'coffee_bistro_enable_pagination',
			'type'     => 'checkbox',
		)
	)
);

// Pagination - Pagination Type.
$wp_customize->add_setting(
	'coffee_bistro_pagination_type',
	array(
		'default'           => 'default',
		'sanitize_callback' => 'coffee_bistro_sanitize_select',
	)
);

$wp_customize->add_control(
	'coffee_bistro_pagination_type',
	array(
		'label'           => esc_html__( 'Pagination Type', 'coffee-bistro' ),
		'section'         => 'coffee_bistro_general_options',
		'settings'        => 'coffee_bistro_pagination_type',
		'active_callback' => 'coffee_bistro_is_pagination_enabled',
		'type'            => 'select',
		'choices'         => array(
			'default' => __( 'Default (Older/Newer)', 'coffee-bistro' ),
			'numeric' => __( 'Numeric', 'coffee-bistro' ),
		),
	)
);


// ---------------------------------------- BREADCRUMB ----------------------------------------------------


// Add Separator Custom Control
$wp_customize->add_setting( 'coffee_bistro_breadcrumb_separators', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Coffee_Bistro_Separator_Custom_Control( $wp_customize, 'coffee_bistro_breadcrumb_separators', array(
	'label' => __( 'Enable / Disable Breadcrumb Section', 'coffee-bistro' ),
	'section' => 'coffee_bistro_general_options',
	'settings' => 'coffee_bistro_breadcrumb_separators',
)));

// Breadcrumb - Enable Breadcrumb.
$wp_customize->add_setting(
	'coffee_bistro_enable_breadcrumb',
	array(
		'sanitize_callback' => 'coffee_bistro_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Coffee_Bistro_Toggle_Switch_Custom_Control(
		$wp_customize,
		'coffee_bistro_enable_breadcrumb',
		array(
			'label'   => esc_html__( 'Enable Breadcrumb', 'coffee-bistro' ),
			'section' => 'coffee_bistro_general_options',
		)
	)
);

// Breadcrumb - Separator.
$wp_customize->add_setting(
	'coffee_bistro_breadcrumb_separator',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '/',
	)
);

$wp_customize->add_control(
	'coffee_bistro_breadcrumb_separator',
	array(
		'label'           => esc_html__( 'Separator', 'coffee-bistro' ),
		'active_callback' => 'coffee_bistro_is_breadcrumb_enabled',
		'section'         => 'coffee_bistro_general_options',
	)
);



// ---------------------------------------- Website layout ----------------------------------------------------


// Add Separator Custom Control
$wp_customize->add_setting( 'coffee_bistro_layuout_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Coffee_Bistro_Separator_Custom_Control( $wp_customize, 'coffee_bistro_layuout_separator', array(
	'label' => __( 'Website Layout Setting', 'coffee-bistro' ),
	'section' => 'coffee_bistro_general_options',
	'settings' => 'coffee_bistro_layuout_separator',
)));


$wp_customize->add_setting(
	'coffee_bistro_website_layout',
	array(
		'sanitize_callback' => 'coffee_bistro_sanitize_switch',
		'default'           => false,
	)
);

$wp_customize->add_control(
	new Coffee_Bistro_Toggle_Switch_Custom_Control(
		$wp_customize,
		'coffee_bistro_website_layout',
		array(
			'label'   => esc_html__('Boxed Layout', 'coffee-bistro'),
			'section' => 'coffee_bistro_general_options',
		)
	)
);

$wp_customize->add_setting('coffee_bistro_layout_width_margin', array(
	'default'           => 50,
	'sanitize_callback' => 'coffee_bistro_sanitize_range_value',
));

$wp_customize->add_control(new Coffee_Bistro_Customize_Range_Control($wp_customize, 'coffee_bistro_layout_width_margin', array(
		'label'       => __('Set Width', 'coffee-bistro'),
		'description' => __('Adjust the width around the website layout by moving the slider. Use this setting to customize the appearance of your site to fit your design preferences.', 'coffee-bistro'),
		'section'     => 'coffee_bistro_general_options',
		'settings'    => 'coffee_bistro_layout_width_margin',
		'active_callback' => 'coffee_bistro_is_layout_enabled',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 130,
			'step' => 1,
		),
)));



// ---------------------------------------- HEADER OPTIONS ----------------------------------------------------	


$wp_customize->add_section(
	'coffee_bistro_header_options',
	array(
		'panel' => 'coffee_bistro_theme_options',
		'title' => esc_html__( 'Header Options', 'coffee-bistro' ),
	)
);


// Add setting for sticky header
$wp_customize->add_setting(
	'coffee_bistro_enable_sticky_header',
	array(
		'sanitize_callback' => 'coffee_bistro_sanitize_switch',
		'default'           => false,
	)
);

// Add control for sticky header setting
$wp_customize->add_control(
	new coffee_bistro_Toggle_Switch_Custom_Control(
		$wp_customize,
		'coffee_bistro_enable_sticky_header',
		array(
			'label'   => esc_html__( 'Enable Sticky Header', 'coffee-bistro' ),
			'section' => 'coffee_bistro_header_options',
		)
	)
);


// Header Options - Enable Topbar.
$wp_customize->add_setting(
	'coffee_bistro_enable_topbar',
	array(
		'sanitize_callback' => 'coffee_bistro_sanitize_switch',
		'default'           => false,
	)
);

$wp_customize->add_control(
	new Coffee_Bistro_Toggle_Switch_Custom_Control(
		$wp_customize,
		'coffee_bistro_enable_topbar',
		array(
			'label'   => esc_html__( 'Enable Topbar', 'coffee-bistro' ),
			'section' => 'coffee_bistro_header_options',
		)
	)
);

// Header Options - Welcome Text.
$wp_customize->add_setting(
	'coffee_bistro_welcome_topbar_text',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'coffee_bistro_welcome_topbar_text',
	array(
		'label'           => esc_html__( 'Topbar Text', 'coffee-bistro' ),
		'section'         => 'coffee_bistro_header_options',
		'type'            => 'text',
		'active_callback' => 'coffee_bistro_is_topbar_enabled',
	)
);

// Header Options - Email Address.
$wp_customize->add_setting(
	'coffee_bistro_email_topbar_address',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_email',
	)
);

$wp_customize->add_control(
	'coffee_bistro_email_topbar_address',
	array(
		'label'           => esc_html__( 'Email Address', 'coffee-bistro' ),
		'section'         => 'coffee_bistro_header_options',
		'type'            => 'text',
		'active_callback' => 'coffee_bistro_is_topbar_enabled',
	)
);

// icon // 
$wp_customize->add_setting(
	'coffee_bistro_email_icon',
	array(
        'default' => 'far fa-envelope',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
		
	)
);	

$wp_customize->add_control(new Coffee_Bistro_Change_Icon_Control($wp_customize, 
	'coffee_bistro_email_icon',
	array(
	    'label'   		=> __('Email Icon','coffee-bistro'),
	    'section' 		=> 'coffee_bistro_header_options',
		'iconset' => 'fa',
	))  
);

// Header Options - Location.
$wp_customize->add_setting(
	'coffee_bistro_location_topbar',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'coffee_bistro_location_topbar',
	array(
		'label'           => esc_html__( 'Location', 'coffee-bistro' ),
		'section'         => 'coffee_bistro_header_options',
		'type'            => 'text',
		'active_callback' => 'coffee_bistro_is_topbar_enabled',
	)
);

// icon // 
$wp_customize->add_setting(
	'coffee_bistro_location_icon',
	array(
        'default' => 'fas fa-map-marker-alt',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
		
	)
);	

$wp_customize->add_control(new Coffee_Bistro_Change_Icon_Control($wp_customize, 
	'coffee_bistro_location_icon',
	array(
	    'label'   		=> __('Location Icon','coffee-bistro'),
	    'section' 		=> 'coffee_bistro_header_options',
		'iconset' => 'fa',
	))  
);


// Header Options - Button Text.
$wp_customize->add_setting(
	'coffee_bistro_button_header_text',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'coffee_bistro_button_header_text',
	array(
		'label'           => esc_html__( 'Button Text', 'coffee-bistro' ),
		'section'         => 'coffee_bistro_header_options',
		'type'            => 'text',
		'active_callback' => 'coffee_bistro_is_topbar_enabled',
	)
);

// Header Options - Button Link.
$wp_customize->add_setting(
	'coffee_bistro_button_header_link',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'coffee_bistro_button_header_link',
	array(
		'label'           => esc_html__( 'Button Link', 'coffee-bistro' ),
		'section'         => 'coffee_bistro_header_options',
		'type'            => 'url',
		'active_callback' => 'coffee_bistro_is_topbar_enabled',
	)
);


// Add Separator Custom Control
$wp_customize->add_setting( 'coffee_bistro_menu_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Coffee_Bistro_Separator_Custom_Control( $wp_customize, 'coffee_bistro_menu_separator', array(
	'label' => __( 'Menu Settings', 'coffee-bistro' ),
	'section' => 'coffee_bistro_header_options',
	'settings' => 'coffee_bistro_menu_separator',
)));

$wp_customize->add_setting( 'menu_text_transform', array(
    'default'           => 'capitalize', // Default value for text transform
    'sanitize_callback' => 'sanitize_text_field',
) );

// Add control for menu text transform
$wp_customize->add_control( 'menu_text_transform', array(
    'type'     => 'select',
    'section'  => 'coffee_bistro_header_options', // Adjust the section as needed
    'label'    => __( 'Menu Text Transform', 'coffee-bistro' ),
    'choices'  => array(
        'none'       => __( 'None', 'coffee-bistro' ),
        'capitalize' => __( 'Capitalize', 'coffee-bistro' ),
        'uppercase'  => __( 'Uppercase', 'coffee-bistro' ),
        'lowercase'  => __( 'Lowercase', 'coffee-bistro' ),
    ),
) );


// ----------------------------------------SITE IDENTITY----------------------------------------------------



// Site Title - Enable Setting.
$wp_customize->add_setting(
	'coffee_bistro_enable_site_title_setting',
	array(
		'default'           => true,
		'sanitize_callback' => 'coffee_bistro_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Coffee_Bistro_Toggle_Switch_Custom_Control(
		$wp_customize,
		'coffee_bistro_enable_site_title_setting',
		array(
			'label'    => esc_html__( 'Disable Site Title', 'coffee-bistro' ),
			'section'  => 'title_tagline',
			'settings' => 'coffee_bistro_enable_site_title_setting',
		)
	)
);

$wp_customize->add_setting( 'coffee_bistro_site_title_size', array(
    'default'           => 36, // Default font size in pixels
    'sanitize_callback' => 'absint', // Sanitize the input as a positive integer
) );

// Add control for site title size
$wp_customize->add_control( 'coffee_bistro_site_title_size', array(
    'type'        => 'number',
    'section'     => 'title_tagline', // You can change this section to your preferred section
    'label'       => __( 'Site Title Font Size ', 'coffee-bistro' ),
    'input_attrs' => array(
        'min'  => 10,
        'max'  => 100,
        'step' => 1,
    ),
) );

// Tagline - Enable Setting.
$wp_customize->add_setting(
	'coffee_bistro_enable_tagline_setting',
	array(
		'default'           => false,
		'sanitize_callback' => 'coffee_bistro_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Coffee_Bistro_Toggle_Switch_Custom_Control(
		$wp_customize,
		'coffee_bistro_enable_tagline_setting',
		array(
			'label'    => esc_html__( 'Enable Tagline', 'coffee-bistro' ),
			'section'  => 'title_tagline',
			'settings' => 'coffee_bistro_enable_tagline_setting',
		)
	)
);