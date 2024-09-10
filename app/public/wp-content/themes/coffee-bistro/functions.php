<?php
/**
 * Coffee Bistro functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package coffee_bistro
 */

if ( ! defined( 'COFFEE_BISTRO_VERSION' ) ) {
	define( 'COFFEE_BISTRO_VERSION', '1.0.0' );
}
$coffee_bistro_theme_data = wp_get_theme();

if( ! defined( 'COFFEE_BISTRO_THEME_NAME' ) ) define( 'COFFEE_BISTRO_THEME_NAME', $coffee_bistro_theme_data->get( 'Name' ) );

if ( ! function_exists( 'coffee_bistro_setup' ) ) :
	
	function coffee_bistro_setup() {
		
		load_theme_textdomain( 'coffee-bistro', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );
		
		add_theme_support( 'title-tag' );

		add_theme_support( 'woocommerce' );

		add_theme_support( 'post-thumbnails' );

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'coffee-bistro' ),
			)
		);

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'woocommerce',
			)
		);

		add_theme_support( 'post-formats', array(
			'image',
			'video',
			'gallery',
			'audio', 
		) );

		add_theme_support(
			'custom-background',
			apply_filters(
				'coffee_bistro_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		add_theme_support( 'align-wide' );

		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'coffee_bistro_setup' );

function coffee_bistro_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'coffee_bistro_content_width', 640 );
}
add_action( 'after_setup_theme', 'coffee_bistro_content_width', 0 );

function coffee_bistro_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'coffee-bistro' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'coffee-bistro' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title"><span>',
			'after_title'   => '</span></h2>',
		)
	);

	$coffee_bistro_footer_widget_column = get_theme_mod('coffee_bistro_footer_widget_column','4');
	for ($i=1; $i<=$coffee_bistro_footer_widget_column; $i++) {
		register_sidebar( array(
			'name' => __( 'Footer  ', 'coffee-bistro' )  . $i,
			'id' => 'coffee-bistro-footer-widget-' . $i,
			'description' => __( 'The Footer Widget Area', 'coffee-bistro' )  . $i,
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<div class="widget-header"><h4 class="widget-title">',
			'after_title' => '</h4></div>',
		) );
	}
}
add_action( 'widgets_init', 'coffee_bistro_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function coffee_bistro_scripts() {
	// Append .min if SCRIPT_DEBUG is false.
	$min = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	// Slick style.
	wp_enqueue_style( 'coffee-bistro-slick-style', get_template_directory_uri() . '/resource/css/slick' . $min . '.css', array(), '1.8.1' );

	// Fontawesome style.
	wp_enqueue_style( 'coffee-bistro-fontawesome-style', get_template_directory_uri() . '/resource/css/fontawesome' . $min . '.css', array(), '5.15.4' );

	// Main style.
	wp_enqueue_style( 'coffee-bistro-style', get_template_directory_uri() . '/style.css', array(), COFFEE_BISTRO_VERSION );

	// Navigation script.
	wp_enqueue_script( 'coffee-bistro-navigation-script', get_template_directory_uri() . '/resource/js/navigation' . $min . '.js', array(), COFFEE_BISTRO_VERSION, true );

	// Slick script.
	wp_enqueue_script( 'coffee-bistro-slick-script', get_template_directory_uri() . '/resource/js/slick' . $min . '.js', array( 'jquery' ), '1.8.1', true );

	// Custom script.
	wp_enqueue_script( 'coffee-bistro-custom-script', get_template_directory_uri() . '/resource/js/custom' . $min . '.js', array( 'jquery' ), COFFEE_BISTRO_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Include the file.
	require_once get_theme_file_path( 'theme-library/function-files/wptt-webfont-loader.php' );

	// Load the webfont.
	wp_enqueue_style(
		'alice',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap' ),
		array(),
		'1.0'
	);

	// Load the webfont.
	wp_enqueue_style(
		'jost',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap' ),
		array(),
		'1.0'
	);

}
add_action( 'wp_enqueue_scripts', 'coffee_bistro_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/theme-library/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/theme-library/function-files/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/theme-library/function-files/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/theme-library/customizer.php';

/**
 * Breadcrumb
 */
require get_template_directory() . '/theme-library/function-files/class-breadcrumb-trail.php';

/**
 * Getting Started
*/
require get_template_directory() . '/theme-library/getting-started/getting-started.php';

/**
 * Google Fonts
 */
require get_template_directory() . '/theme-library/function-files/google-fonts.php';

/**
 * Dynamic CSS
 */
require get_template_directory() . '/theme-library/dynamic-css.php';




// Enqueue Customizer live preview script
function coffee_bistro_customizer_live_preview() {
    wp_enqueue_script(
        'coffee-bistro-customizer',
        get_template_directory_uri() . '/js/customizer.js',
        array('jquery', 'customize-preview'),
        '',
        true
    );
}
add_action('customize_preview_init', 'coffee_bistro_customizer_live_preview');


// Output inline CSS based on Customizer setting
function coffee_bistro_customizer_css() {
    $enable_breadcrumb = get_theme_mod('coffee_bistro_enable_breadcrumb', true);
    ?>
    <style type="text/css">
        <?php if (!$enable_breadcrumb) : ?>
            nav.woocommerce-breadcrumb {
                display: none;
            }
        <?php endif; ?>
    </style>
    <?php
}
add_action('wp_head', 'coffee_bistro_customizer_css');


function coffee_bistro_customize_css() {
    ?>
    <style type="text/css">
        :root {
            --primary-color: <?php echo esc_html( get_theme_mod( 'primary_color', '#8e5331' ) ); ?>;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'coffee_bistro_customize_css' );


function coffee_bistro_customize_js() { 
   // Register the new jQuery script
   wp_register_script('jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), '3.6.0', true);
}


function add_custom_script_in_footer() {
    if ( get_theme_mod( 'coffee_bistro_enable_sticky_header', false ) ) {
        ?>
        <script>
            jQuery(document).ready(function($) {
                $(window).on('scroll', function() {
                    var scroll = $(window).scrollTop();
                    if (scroll > 0) {
                        $('.bottom-header-part-wrapper.hello').addClass('is-sticky');
                    } else {
                        $('.bottom-header-part-wrapper.hello').removeClass('is-sticky');
                    }
                });
            });
        </script>
        <?php
    }
}
add_action( 'wp_footer', 'add_custom_script_in_footer' );


function coffee_bistro_enqueue_selected_fonts() {
    $fonts_url = coffee_bistro_get_fonts_url();
    if (!empty($fonts_url)) {
        wp_enqueue_style('coffee-bistro-google-fonts', $fonts_url, array(), null);
    }
}
add_action('wp_enqueue_scripts', 'coffee_bistro_enqueue_selected_fonts');

function coffee_bistro_layout_customizer_css() {
    $margin = get_theme_mod('coffee_bistro_layout_width_margin', 0);
    ?>
    <style type="text/css">
        body.site-boxed--layout #page  {
            margin: 0 <?php echo esc_attr($margin); ?>px;
        }
    </style>
    <?php
}
add_action('wp_head', 'coffee_bistro_layout_customizer_css');

function coffee_bistro_blog_layout_customizer_css() {
    // Retrieve the blog layout option
    $coffee_bistro_blog_layouts = get_theme_mod('coffee_bistro_blog_layout_option_setting', 'Left');
    
    // Initialize custom CSS variable
    $coffee_bistro_custom_css = '';

    // Generate custom CSS based on the layout option
    if ($coffee_bistro_blog_layouts == 'Default') {
        $coffee_bistro_custom_css .= '.mag-post-detail {';
        $coffee_bistro_custom_css .= 'text-align: center;';
        $coffee_bistro_custom_css .= '}';
    } elseif ($coffee_bistro_blog_layouts == 'Left') {
        $coffee_bistro_custom_css .= '.mag-post-detail {';
        $coffee_bistro_custom_css .= 'text-align: left;';
        $coffee_bistro_custom_css .= '}';
    } elseif ($coffee_bistro_blog_layouts == 'Right') {
        $coffee_bistro_custom_css .= '.mag-post-detail {';
        $coffee_bistro_custom_css .= 'text-align: right;';
        $coffee_bistro_custom_css .= '}';
    }

    // Output the combined CSS
    ?>
    <style type="text/css">
        <?php echo $coffee_bistro_custom_css; ?>
    </style>
    <?php
}
add_action('wp_head', 'coffee_bistro_blog_layout_customizer_css');

function coffee_bistro_sidebar_width_customizer_css() {
    $width = get_theme_mod('coffee_bistro_sidebar_width', '30');
    ?>
    <style type="text/css">
        .right-sidebar .asterthemes-wrapper .asterthemes-page {
            grid-template-columns: auto <?php echo esc_attr($width); ?>%;
        }
        .left-sidebar .asterthemes-wrapper .asterthemes-page {
            grid-template-columns: <?php echo esc_attr($width); ?>% auto;
        }
    </style>
    <?php
}
add_action('wp_head', 'coffee_bistro_sidebar_width_customizer_css');