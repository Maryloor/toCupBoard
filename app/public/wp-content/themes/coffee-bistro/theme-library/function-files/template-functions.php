<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package coffee_bistro
 */

function coffee_bistro_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	$classes[] = coffee_bistro_sidebar_layout();

	return $classes;
}
add_filter( 'body_class', 'coffee_bistro_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function coffee_bistro_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'coffee_bistro_pingback_header' );


/**
 * Get all posts for customizer Post content type.
 */
function coffee_bistro_get_post_choices() {
	$coffee_bistro_choices = array( '' => esc_html__( '--Select--', 'coffee-bistro' ) );
	$args    = array( 'numberposts' => -1 );
	$coffee_bistro_posts   = get_posts( $args );

	foreach ( $coffee_bistro_posts as $post ) {
		$id             = $post->ID;
		$coffee_bistro_title          = $post->post_title;
		$coffee_bistro_choices[ $id ] = $coffee_bistro_title;
	}

	return $coffee_bistro_choices;
}

/**
 * Get all pages for customizer Page content type.
 */
function coffee_bistro_get_page_choices() {
	$coffee_bistro_choices = array( '' => esc_html__( '--Select--', 'coffee-bistro' ) );
	$coffee_bistro_pages   = get_pages();

	foreach ( $coffee_bistro_pages as $page ) {
		$coffee_bistro_choices[ $page->ID ] = $page->post_title;
	}

	return $coffee_bistro_choices;
}

/**
 * Get all categories for customizer Category content type.
 */
function coffee_bistro_get_post_cat_choices() {
	$coffee_bistro_choices = array( '' => esc_html__( '--Select--', 'coffee-bistro' ) );
	$coffee_bistro_cats    = get_categories();

	foreach ( $coffee_bistro_cats as $cat ) {
		$coffee_bistro_choices[ $cat->term_id ] = $cat->name;
	}

	return $coffee_bistro_choices;
}

/**
 * Get all donation forms for customizer form content type.
 */
function coffee_bistro_get_post_donation_form_choices() {
	$coffee_bistro_choices = array( '' => esc_html__( '--Select--', 'coffee-bistro' ) );
	$coffee_bistro_posts   = get_posts(
		array(
			'post_type'   => 'give_forms',
			'numberposts' => -1,
		)
	);
	foreach ( $coffee_bistro_posts as $post ) {
		$coffee_bistro_choices[ $post->ID ] = $post->post_title;
	}
	return $coffee_bistro_choices;
}

if ( ! function_exists( 'coffee_bistro_excerpt_length' ) ) :
	/**
	 * Excerpt length.
	 */
	function coffee_bistro_excerpt_length( $length ) {
		if ( is_admin() ) {
			return $length;
		}

		return get_theme_mod( 'coffee_bistro_excerpt_length', 20 );
	}
endif;
add_filter( 'excerpt_length', 'coffee_bistro_excerpt_length', 999 );

if ( ! function_exists( 'coffee_bistro_excerpt_more' ) ) :
	/**
	 * Excerpt more.
	 */
	function coffee_bistro_excerpt_more( $more ) {
		if ( is_admin() ) {
			return $more;
		}

		return '&hellip;';
	}
endif;
add_filter( 'excerpt_more', 'coffee_bistro_excerpt_more' );

if ( ! function_exists( 'coffee_bistro_sidebar_layout' ) ) {
	/**
	 * Get sidebar layout.
	 */
	function coffee_bistro_sidebar_layout() {
		$coffee_bistro_sidebar_position      = get_theme_mod( 'coffee_bistro_sidebar_position', 'right-sidebar' );
		$coffee_bistro_sidebar_position_post = get_theme_mod( 'coffee_bistro_post_sidebar_position', 'right-sidebar' );
		$coffee_bistro_sidebar_position_page = get_theme_mod( 'coffee_bistro_page_sidebar_position', 'right-sidebar' );

		if ( is_single() ) {
			$coffee_bistro_sidebar_position = $coffee_bistro_sidebar_position_post;
		} elseif ( is_page() ) {
			$coffee_bistro_sidebar_position = $coffee_bistro_sidebar_position_page;
		}

		return $coffee_bistro_sidebar_position;
	}
}

if ( ! function_exists( 'coffee_bistro_is_sidebar_enabled' ) ) {
	/**
	 * Check if sidebar is enabled.
	 */
	function coffee_bistro_is_sidebar_enabled() {
		$coffee_bistro_sidebar_position      = get_theme_mod( 'coffee_bistro_sidebar_position', 'right-sidebar' );
		$coffee_bistro_sidebar_position_post = get_theme_mod( 'coffee_bistro_post_sidebar_position', 'right-sidebar' );
		$coffee_bistro_sidebar_position_page = get_theme_mod( 'coffee_bistro_page_sidebar_position', 'right-sidebar' );

		$coffee_bistro_sidebar_enabled = true;
		if ( is_home() || is_archive() || is_search() ) {
			if ( 'no-sidebar' === $coffee_bistro_sidebar_position ) {
				$coffee_bistro_sidebar_enabled = false;
			}
		} elseif ( is_single() ) {
			if ( 'no-sidebar' === $coffee_bistro_sidebar_position || 'no-sidebar' === $coffee_bistro_sidebar_position_post ) {
				$coffee_bistro_sidebar_enabled = false;
			}
		} elseif ( is_page() ) {
			if ( 'no-sidebar' === $coffee_bistro_sidebar_position || 'no-sidebar' === $coffee_bistro_sidebar_position_page ) {
				$coffee_bistro_sidebar_enabled = false;
			}
		}
		return $coffee_bistro_sidebar_enabled;
	}
}

if ( ! function_exists( 'coffee_bistro_get_homepage_sections ' ) ) {
	/**
	 * Returns homepage sections.
	 */
	function coffee_bistro_get_homepage_sections() {
		$coffee_bistro_sections = array(
			'banner'  => esc_html__( 'Banner Section', 'coffee-bistro' ),
			'services' => esc_html__( 'Services Section', 'coffee-bistro' ),
		);
		return $coffee_bistro_sections;
	}
}

/**
 * Renders customizer section link
 */
function coffee_bistro_section_link( $coffee_bistro_section_id ) {
	$coffee_bistro_section_name      = str_replace( 'coffee_bistro_', ' ', $coffee_bistro_section_id );
	$coffee_bistro_section_name      = str_replace( '_', ' ', $coffee_bistro_section_name );
	$coffee_bistro_starting_notation = '#';
	?>
	<span class="section-link">
		<span class="section-link-title"><?php echo esc_html( $coffee_bistro_section_name ); ?></span>
	</span>
	<style type="text/css">
		<?php echo $coffee_bistro_starting_notation . $coffee_bistro_section_id; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>:hover .section-link {
			visibility: visible;
		}
	</style>
	<?php
}

/**
 * Adds customizer section link css
 */
function coffee_bistro_section_link_css() {
	if ( is_customize_preview() ) {
		?>
		<style type="text/css">
			.section-link {
				visibility: hidden;
				background-color: black;
				position: relative;
				top: 80px;
				z-index: 99;
				left: 40px;
				color: #fff;
				text-align: center;
				font-size: 20px;
				border-radius: 10px;
				padding: 20px 10px;
				text-transform: capitalize;
			}

			.section-link-title {
				padding: 0 10px;
			}

			.banner-section {
				position: relative;
			}

			.banner-section .section-link {
				position: absolute;
				top: 100px;
			}
		</style>
		<?php
	}
}
add_action( 'wp_head', 'coffee_bistro_section_link_css' );

/**
 * Breadcrumb.
 */
function coffee_bistro_breadcrumb( $args = array() ) {
	if ( ! get_theme_mod( 'coffee_bistro_enable_breadcrumb', true ) ) {
		return;
	}

	$args = array(
		'show_on_front' => false,
		'show_title'    => true,
		'show_browse'   => false,
	);
	breadcrumb_trail( $args );
}
add_action( 'coffee_bistro_breadcrumb', 'coffee_bistro_breadcrumb', 10 );

/**
 * Add separator for breadcrumb trail.
 */
function coffee_bistro_breadcrumb_trail_print_styles() {
	$coffee_bistro_breadcrumb_separator = get_theme_mod( 'coffee_bistro_breadcrumb_separator', '/' );

	$coffee_bistro_style = '
		.trail-items li::after {
			content: "' . $coffee_bistro_breadcrumb_separator . '";
		}'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	$coffee_bistro_style = apply_filters( 'coffee_bistro_breadcrumb_trail_inline_style', trim( str_replace( array( "\r", "\n", "\t", '  ' ), '', $coffee_bistro_style ) ) );

	if ( $coffee_bistro_style ) {
		echo "\n" . '<style type="text/css" id="breadcrumb-trail-css">' . $coffee_bistro_style . '</style>' . "\n"; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}
add_action( 'wp_head', 'coffee_bistro_breadcrumb_trail_print_styles' );

/**
 * Pagination for archive.
 */
function coffee_bistro_render_posts_pagination() {
	$coffee_bistro_is_pagination_enabled = get_theme_mod( 'coffee_bistro_enable_pagination', true );
	if ( $coffee_bistro_is_pagination_enabled ) {
		$coffee_bistro_pagination_type = get_theme_mod( 'coffee_bistro_pagination_type', 'default' );
		if ( 'default' === $coffee_bistro_pagination_type ) :
			the_posts_navigation();
		else :
			the_posts_pagination();
		endif;
	}
}
add_action( 'coffee_bistro_posts_pagination', 'coffee_bistro_render_posts_pagination', 10 );

/**
 * Pagination for single post.
 */
function coffee_bistro_render_post_navigation() {
	the_post_navigation(
		array(
			'prev_text' => '<span>&#10229;</span> <span class="nav-title">%title</span>',
			'next_text' => '<span class="nav-title">%title</span> <span>&#10230;</span>',
		)
	);
}
add_action( 'coffee_bistro_post_navigation', 'coffee_bistro_render_post_navigation' );

/**
 * Adds footer copyright text.
 */


function coffee_bistro_output_footer_copyright_content() {
    $coffee_bistro_theme_data = wp_get_theme();
    $coffee_bistro_copyright_text = get_theme_mod('coffee_bistro_footer_copyright_text');

    if (!empty($coffee_bistro_copyright_text)) {
        $coffee_bistro_text = $coffee_bistro_copyright_text;
    } else {
        $coffee_bistro_default_text = '<a href="'. esc_url(__('https://asterthemes.com/products/free-coffee-wordpress-theme','coffee-bistro')) . '" target="_blank"> ' . esc_html($coffee_bistro_theme_data->get('Name')) . '</a>' . '&nbsp;' . esc_html__('by', 'coffee-bistro') . '&nbsp;<a target="_blank" href="' . esc_url($coffee_bistro_theme_data->get('AuthorURI')) . '">' . esc_html(ucwords($coffee_bistro_theme_data->get('Author'))) . '</a>';
        $coffee_bistro_default_text .= sprintf(esc_html__(' | Powered by %s', 'coffee-bistro'), '<a href="' . esc_url(__('https://wordpress.org/', 'coffee-bistro')) . '" target="_blank">WordPress</a>. ');

        $coffee_bistro_text = $coffee_bistro_default_text;
    }
    ?>
    <span><?php echo wp_kses_post($coffee_bistro_text); ?></span>
    <?php
}
add_action('coffee_bistro_footer_copyright', 'coffee_bistro_output_footer_copyright_content');


/**
 * GET START FUNCTION
 */

function coffee_bistro_getpage_css($hook) {
	wp_enqueue_script( 'coffee-bistro-admin-script', get_template_directory_uri() . '/resource/js/coffee-bistro-admin-notice-script.js', array( 'jquery' ) );
    wp_localize_script( 'coffee-bistro-admin-script', 'coffee_bistro_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
    wp_enqueue_style( 'coffee-bistro-notice-style', get_template_directory_uri() . '/resource/css/notice.css' );
}

add_action( 'admin_enqueue_scripts', 'coffee_bistro_getpage_css' );


add_action('wp_ajax_coffee_bistro_dismissable_notice', 'coffee_bistro_dismissable_notice');
function coffee_bistro_switch_theme() {
    delete_user_meta(get_current_user_id(), 'coffee_bistro_dismissable_notice');
}
add_action('after_switch_theme', 'coffee_bistro_switch_theme');
function coffee_bistro_dismissable_notice() {
    update_user_meta(get_current_user_id(), 'coffee_bistro_dismissable_notice', true);
    die();
}

	function coffee_bistro_deprecated_hook_admin_notice() {
	    global $pagenow;
	    
	    // Check if the current page is the one where you don't want the notice to appear
	    if ( $pagenow === 'themes.php' && isset( $_GET['page'] ) && $_GET['page'] === 'coffee-bistro-getting-started' ) {
	        return;
	    }

	    $dismissed = get_user_meta( get_current_user_id(), 'coffee_bistro_dismissable_notice', true );
	    if ( !$dismissed) { ?>
	        <div class="getstrat updated notice notice-success is-dismissible notice-get-started-class">
	            <div class="at-admin-content" >
	                <h2><?php esc_html_e('Welcome to Coffee Bistro', 'coffee-bistro'); ?></h2>
	                <p><?php _e('Explore the features of our Pro Theme and take your Coffee journey to the next level.', 'coffee-bistro'); ?></p>
	                <p ><?php _e('Get Started With Theme By Clicking On Getting Started.', 'coffee-bistro'); ?><p>
	                <div style="display: flex; justify-content: center;">
	                    <a class="admin-notice-btn button button-primary button-hero" href="<?php echo esc_url( admin_url( 'themes.php?page=coffee-bistro-getting-started' )); ?>"><?php esc_html_e( 'Get started', 'coffee-bistro' ) ?></a>
	                    <a  class="admin-notice-btn button button-primary button-hero" target="_blank" href="https://demo.asterthemes.com/coffee-bistro"><?php esc_html_e('View Demo', 'coffee-bistro') ?></a>
	                    <a  class="admin-notice-btn button button-primary button-hero" target="_blank" href="https://asterthemes.com/products/bistro-wordpress-theme"><?php esc_html_e('Buy Now', 'coffee-bistro') ?></a>
	                    <a  class="admin-notice-btn button button-primary button-hero" target="_blank" href="https://demo.asterthemes.com/docs/coffee-bistro-free"><?php esc_html_e('Free Doc', 'coffee-bistro') ?></a>
	                </div>
	            </div>
	            <div class="at-admin-image">
	                <img style="width: 100%;max-width: 320px;line-height: 40px;display: inline-block;vertical-align: top;border: 2px solid #ddd;border-radius: 4px;" src="<?php echo esc_url(get_stylesheet_directory_uri()) .'/screenshot.png'; ?>" />
	            </div>
	        </div>
	    <?php }
	}

	add_action( 'admin_notices', 'coffee_bistro_deprecated_hook_admin_notice' );


//Admin Notice For Getstart
function coffee_bistro_ajax_notice_handler() {
    if ( isset( $_POST['type'] ) ) {
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        update_option( 'dismissed-' . $type, TRUE );
    }
}
if ( ! function_exists( 'coffee_bistro_footer_widget' ) ) :
function coffee_bistro_footer_widget() {
	$coffee_bistro_footer_widget_column	= get_theme_mod('coffee_bistro_footer_widget_column','4'); 
		if ($coffee_bistro_footer_widget_column == '4') {
			$coffee_bistro_column = '3';
		} elseif ($coffee_bistro_footer_widget_column == '3') {
			$coffee_bistro_column = '4';
		} elseif ($coffee_bistro_footer_widget_column == '2') {
			$coffee_bistro_column = '6';
		} else{
			$coffee_bistro_column = '12';
		}
	if($coffee_bistro_footer_widget_column !==''): 
	?>
	<div class="dt_footer-widgets">
		
    <div class="footer-widgets-column">
    	<?php
		$coffee_bistro_footer_widget_column = get_theme_mod('coffee_bistro_footer_widget_column','4');
	for ($i=1; $i<=$coffee_bistro_footer_widget_column; $i++) { ?>
        <?php if ( is_active_sidebar( 'coffee-bistro-footer-widget-' .$i ) ) : ?>
            <div class="footer-one-column" >
                <?php dynamic_sidebar( 'coffee-bistro-footer-widget-'.$i); ?>
            </div>
        <?php endif; ?>
        <?php  } ?>
    </div>

</div>
	<?php 
	endif; } 
endif;
add_action( 'coffee_bistro_footer_widget', 'coffee_bistro_footer_widget' );

function coffee_bistro_footer_text_transform_css() {
    $coffee_bistro_footer_text_transform = get_theme_mod('footer_text_transform', 'none');
    ?>
    <style type="text/css">
        .site-footer h4 {
            text-transform: <?php echo esc_html($coffee_bistro_footer_text_transform); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'coffee_bistro_footer_text_transform_css');