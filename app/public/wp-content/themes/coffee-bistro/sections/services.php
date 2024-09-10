<?php

if ( ! get_theme_mod( 'coffee_bistro_enable_service_section', false ) ) {
	return;
}

$coffee_bistro_left_content_ids  = array();
$coffee_bistro_left_content_type = get_theme_mod( 'coffee_bistro_service_left_content_type', 'page' );

for ( $i = 1; $i <= 3; $i++ ) {
	$coffee_bistro_left_content_ids[] = get_theme_mod( 'coffee_bistro_service_left_content_' . $coffee_bistro_left_content_type . '_' . $i );
}

$coffee_bistro_left_args = array(
	'post_type'           => $coffee_bistro_left_content_type,
	'post__in'            => array_filter( $coffee_bistro_left_content_ids ),
	'orderby'             => 'post__in',
	'posts_per_page'      => absint( 3 ),
	'ignore_sticky_posts' => true,
);

$coffee_bistro_left_args = apply_filters( 'coffee_bistro_service_section_args', $coffee_bistro_left_args );

$coffee_bistro_right_content_ids  = array();
$coffee_bistro_right_content_type = get_theme_mod( 'coffee_bistro_service_right_content_type', 'page' );

for ( $i = 1; $i <= 3; $i++ ) {
	$coffee_bistro_right_content_ids[] = get_theme_mod( 'coffee_bistro_service_right_content_' . $coffee_bistro_right_content_type . '_' . $i );
}

$coffee_bistro_right_args = array(
	'post_type'           => $coffee_bistro_right_content_type,
	'post__in'            => array_filter( $coffee_bistro_right_content_ids ),
	'orderby'             => 'post__in',
	'posts_per_page'      => absint( 3 ),
	'ignore_sticky_posts' => true,
);

$coffee_bistro_right_args = apply_filters( 'coffee_bistro_service_section_args', $coffee_bistro_right_args );

coffee_bistro_render_service_section( $coffee_bistro_left_args, $coffee_bistro_right_args );

/**
 * Render Service Section.
 */
function coffee_bistro_render_service_section( $coffee_bistro_left_args, $coffee_bistro_right_args ) { ?>

	<section id="coffee_bistro_service_section" class="asterthemes-frontpage-section service-section service-style-1">
		<?php
		if ( is_customize_preview() ) :
			coffee_bistro_section_link( 'coffee_bistro_service_section' );
		endif;
		?>
		<div class="asterthemes-wrapper">
			<div class="video-main-box">
				<?php 
				$coffee_bistro_query = new WP_Query( $coffee_bistro_left_args );
				if ( $coffee_bistro_query->have_posts() ) :
					?>
					<div class="section-body">
						<div class="service-section-wrapper">
							<?php
							$i = 1;
							while ( $coffee_bistro_query->have_posts() ) :
								$coffee_bistro_query->the_post();
								?>
								<div class="service-single text-right">
									<div class="service-title">
										<h3>
											<a href="<?php the_permalink(); ?>">
												<?php the_title(); ?>
											</a>
										</h3>
										<p>
											<?php echo wp_kses_post( wp_trim_words( get_the_content(), 20 ) ); ?>
										</p>
									</div>
								</div>
								<?php
								$i++;
							endwhile;
							wp_reset_postdata();
							?>
						</div>
					</div>
				<?php endif; ?>
				<div class="video-title">
					<?php
						$center_services_images = get_theme_mod( 'coffee_bistro_center_services_images', '' );
				 		if ( ! empty( $center_services_images ) ) { ?>

						<img src="<?php echo esc_url( $center_services_images ); ?>" >
					<?php } ?>
				</div>
				<?php 
				$coffee_bistro_query = new WP_Query( $coffee_bistro_right_args );
				if ( $coffee_bistro_query->have_posts() ) :
					?>
					<div class="section-body">
						<div class="service-section-wrapper">
							<?php
							$i = 1;
							while ( $coffee_bistro_query->have_posts() ) :
								$coffee_bistro_query->the_post();
								?>
								<div class="service-single">
									<div class="service-title">
										<h3>
											<a href="<?php the_permalink(); ?>">
												<?php the_title(); ?>
											</a>
										</h3>
										<p>
											<?php echo wp_kses_post( wp_trim_words( get_the_content(), 20 ) ); ?>
										</p>
									</div>
								</div>
								<?php
								$i++;
							endwhile;
							wp_reset_postdata();
							?>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
	<?php
}
