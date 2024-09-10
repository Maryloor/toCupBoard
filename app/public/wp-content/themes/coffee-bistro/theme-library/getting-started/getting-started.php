<?php
/**
 * Getting Started Page.
 *
 * @package coffee_bistro
 */

if( ! function_exists( 'coffee_bistro_getting_started_menu' ) ) :
/**
 * Adding Getting Started Page in admin menu
 */
function coffee_bistro_getting_started_menu(){	
	add_theme_page(
		__( 'Getting Started', 'coffee-bistro' ),
		__( 'Getting Started', 'coffee-bistro' ),
		'manage_options',
		'coffee-bistro-getting-started',
		'coffee_bistro_getting_started_page'
	);
}
endif;
add_action( 'admin_menu', 'coffee_bistro_getting_started_menu' );

if( ! function_exists( 'coffee_bistro_getting_started_admin_scripts' ) ) :
/**
 * Load Getting Started styles in the admin
 */
function coffee_bistro_getting_started_admin_scripts( $hook ){
	// Load styles only on our page
	if( 'appearance_page_coffee-bistro-getting-started' != $hook ) return;

    wp_enqueue_style( 'coffee-bistro-getting-started', get_template_directory_uri() . '/resource/css/getting-started.css', false, COFFEE_BISTRO_VERSION );

    wp_enqueue_script( 'coffee-bistro-getting-started', get_template_directory_uri() . '/resource/js/getting-started.js', array( 'jquery' ), COFFEE_BISTRO_VERSION, true );
}
endif;
add_action( 'admin_enqueue_scripts', 'coffee_bistro_getting_started_admin_scripts' );

if( ! function_exists( 'coffee_bistro_getting_started_page' ) ) :
/**
 * Callback function for admin page.
*/
function coffee_bistro_getting_started_page(){ 
	$coffee_bistro_theme = wp_get_theme();?>
	<div class="wrap getting-started">
		<div class="intro-wrap">
			<div class="intro cointaner">
				<div class="intro-content">
					<h3><?php echo esc_html( 'Welcome to', 'coffee-bistro' );?> <span class="theme-name"><?php echo esc_html( COFFEE_BISTRO_THEME_NAME ); ?></span></h3>
					<p class="about-text">
						<?php
						// Remove last sentence of description.
						$coffee_bistro_description = explode( '. ', $coffee_bistro_theme->get( 'Description' ) );

						array_pop( $coffee_bistro_description );

						$coffee_bistro_description = implode( '. ', $coffee_bistro_description );

						echo esc_html( $coffee_bistro_description . '.' );
					?></p>
					<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>"target="_blank" class="button button-primary"><?php esc_html_e( 'Customize', 'coffee-bistro' ); ?></a>
			        <a class="button button-primary" href="<?php echo esc_url( 'https://wordpress.org/support/theme/coffee-bistro/reviews/#new-post' ); ?>" title="<?php esc_attr_e( 'Visit the Review', 'coffee-bistro' ); ?>" target="_blank">
			            <?php esc_html_e( 'REVIEW', 'coffee-bistro' ); ?>
			        </a>
			        <a class="button button-primary" href="<?php echo esc_url( 'https://wordpress.org/support/theme/coffee-bistro' ); ?>" title="<?php esc_attr_e( 'Visit the Support', 'coffee-bistro' ); ?>" target="_blank">
			            <?php esc_html_e( 'CONTACT SUPPORT', 'coffee-bistro' ); ?>
			        </a>
				</div>
				<div class="intro-img">
					<img src="<?php echo esc_url(get_template_directory_uri()) .'/screenshot.png'; ?>" />
				</div>
				
			</div>
		</div>

		<div class="cointaner panels">
			<ul class="inline-list">
				<li class="current">
                    <a id="help" href="javascript:void(0);">
                        <?php esc_html_e( 'Getting Started', 'coffee-bistro' ); ?>
                    </a>
                </li>
				<li>
                    <a id="free-pro-panel" href="javascript:void(0);">
                        <?php esc_html_e( 'Free Vs Pro', 'coffee-bistro' ); ?>
                    </a>
                </li>
			</ul>
			<div id="panel" class="panel">
				<?php require get_template_directory() . '/theme-library/getting-started/tabs/help-panel.php'; ?>
				<?php require get_template_directory() . '/theme-library/getting-started/tabs/free-vs-pro-panel.php'; ?>
				<?php require get_template_directory() . '/theme-library/getting-started/tabs/link-panel.php'; ?>
			</div>
		</div>
	</div>
	<?php
}
endif;