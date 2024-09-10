<?php
/**
 * The template for displaying the footer
 * 
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package coffee_bistro
 */

// Get the footer background color/image settings from customizer
$coffee_bistro_footer_background_color = get_theme_mod('footer_background_color_setting', ''); // Default to white if not set
$coffee_bistro_footer_background_image = get_theme_mod('footer_background_image_setting');

if (!is_front_page() || is_home()) {
    ?>
    </div>
    </div>
</div>
<?php } ?>

<footer id="colophon" class="site-footer" style="background-color: <?php echo esc_attr($coffee_bistro_footer_background_color); ?>; <?php echo ($coffee_bistro_footer_background_image) ? 'background-image: url(' . esc_url($coffee_bistro_footer_background_image) . ');' : ''; ?>">
    <div class="site-footer-top">
        <div class="asterthemes-wrapper">
            <div class="footer-widgets-wrapper">

                <?php
                // Footer Widget
                do_action('coffee_bistro_footer_widget');
                ?>

            </div>
        </div>
    </div>
    <div class="site-footer-bottom">
        <div class="asterthemes-wrapper">
            <div class="site-footer-bottom-wrapper">
                <div class="site-info">
                    <?php
                    do_action('coffee_bistro_footer_copyright');
                    ?>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php
$coffee_bistro_is_scroll_top_active = get_theme_mod( 'coffee_bistro_scroll_top', true );
if ( $coffee_bistro_is_scroll_top_active ) :
    $coffee_bistro_scroll_position = get_theme_mod( 'coffee_bistro_scroll_top_position', 'bottom-right' );
    $coffee_bistro_scroll_shape = get_theme_mod( 'coffee_bistro_scroll_top_shape', 'box' );

    ?>
    <style>
        #scroll-to-top {
            position: fixed;
            <?php
            switch ( $coffee_bistro_scroll_position ) {
                case 'bottom-left':
                    echo 'bottom: 25px; left: 20px;';
                    break;
                case 'bottom-center':
                    echo 'bottom: 25px; left: 50%; transform: translateX(-50%);';
                    break;
                default: // 'bottom-right'
                    echo 'bottom: 25px; right: 90px;';
            }
            ?>
        }
    </style>
    <a href="#" id="scroll-to-top" class="coffee-bistro-scroll-to-top <?php echo esc_attr($coffee_bistro_scroll_shape); ?>"><i class="<?php echo esc_attr( get_theme_mod( 'coffee_bistro_scroll_btn_icon', 'fas fa-chevron-up' ) ); ?>"></i></a>
<?php
endif;
?>
</div>

<?php wp_footer(); ?>

</body>
</html>