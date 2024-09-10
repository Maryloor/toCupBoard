<?php
if ( ! get_theme_mod( 'coffee_bistro_enable_banner_section', false ) ) {
	return;
}

$coffee_bistro_slider_content_ids  = array();
$coffee_bistro_slider_content_type = get_theme_mod( 'coffee_bistro_banner_slider_content_type', 'post' );

for ( $i = 1; $i <= 3; $i++ ) {
	$coffee_bistro_slider_content_ids[] = get_theme_mod( 'coffee_bistro_banner_slider_content_' . $coffee_bistro_slider_content_type . '_' . $i );
}
$coffee_bistro_banner_slider_args = array(
	'post_type'           => $coffee_bistro_slider_content_type,
	'post__in'            => array_filter( $coffee_bistro_slider_content_ids ),
	'orderby'             => 'post__in',
	'posts_per_page'      => absint( 3 ),
	'ignore_sticky_posts' => true,
);
$coffee_bistro_banner_slider_args = apply_filters( 'coffee_bistro_banner_section_args', $coffee_bistro_banner_slider_args );

coffee_bistro_render_banner_section( $coffee_bistro_banner_slider_args );

/**
 * Render Banner Section.
 */
function coffee_bistro_render_banner_section( $coffee_bistro_banner_slider_args ) {     ?>

	<section id="coffee_bistro_banner_section" class="banner-section banner-style-1">
		<?php
		if ( is_customize_preview() ) :
			coffee_bistro_section_link( 'coffee_bistro_banner_section' );
		endif;
		?>
		<div class="banner-section-wrapper">
			<?php
			$query = new WP_Query( $coffee_bistro_banner_slider_args );
			if ( $query->have_posts() ) :
				?>
				<div class="asterthemes-banner-wrapper banner-slider coffee-bistro-carousel-navigation" data-slick='{"autoplay": false }'>
					<?php
					$i = 1;
					while ( $query->have_posts() ) :
						$query->the_post();
						$coffee_bistro_button_label = get_theme_mod( 'coffee_bistro_banner_button_label_' . $i, '' );
						$coffee_bistro_button_link  = get_theme_mod( 'coffee_bistro_banner_button_link_' . $i, '' );
						$coffee_bistro_button_link  = ! empty( $coffee_bistro_button_link ) ? $coffee_bistro_button_link : get_the_permalink();
						?>
						<div class="banner-single-outer">
							<div class="banner-single">
								<div class="banner-img">
									<?php the_post_thumbnail( 'full' ); ?>
								</div>
								<div class="banner-caption">
									<div class="asterthemes-wrapper">
										<div class="banner-catption-wrapper">
											<h1 class="banner-caption-title">
												<?php the_title(); ?>
											</h1>
											<!-- <div class="caption-description">
												<p>
													<?php echo wp_kses_post( wp_trim_words( get_the_content(), 25 ) ); ?>
												</p>
											</div> -->
											<?php if ( ! empty( $coffee_bistro_button_label ) ) { ?>
												<div class="banner-slider-btn">
													<a href="<?php echo esc_url( $coffee_bistro_button_link ); ?>" class="asterthemes-button"><?php echo esc_html( $coffee_bistro_button_label ); ?></a>
												</div>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php
						$i++;
					endwhile;
					wp_reset_postdata();
					?>
				</div>
				<?php
			endif;
			?>
		</div>
	</section>

	<?php
}
