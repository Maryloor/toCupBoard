<?php

/**
 * Active Callbacks
 *
 * @package coffee_bistro
 */

// Theme Options.
function coffee_bistro_is_pagination_enabled( $control ) {
	return ( $control->manager->get_setting( 'coffee_bistro_enable_pagination' )->value() );
}
function coffee_bistro_is_breadcrumb_enabled( $control ) {
	return ( $control->manager->get_setting( 'coffee_bistro_enable_breadcrumb' )->value() );
}
function coffee_bistro_is_layout_enabled( $control ) {
	return ( $control->manager->get_setting( 'coffee_bistro_website_layout' )->value() );
}

// Header Options.
function coffee_bistro_is_topbar_enabled( $control ) {
	return ( $control->manager->get_Setting( 'coffee_bistro_enable_topbar' )->value() );
}

// Banner Slider Section.
function coffee_bistro_is_banner_slider_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'coffee_bistro_enable_banner_section' )->value() );
}
function coffee_bistro_is_banner_slider_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'coffee_bistro_banner_slider_content_type' )->value();
	return ( coffee_bistro_is_banner_slider_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function coffee_bistro_is_banner_slider_section_and_content_type_page_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'coffee_bistro_banner_slider_content_type' )->value();
	return ( coffee_bistro_is_banner_slider_section_enabled( $control ) && ( 'page' === $content_type ) );
}

//Services section.
function coffee_bistro_is_service_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'coffee_bistro_enable_service_section' )->value() );
}
function coffee_bistro_is_service_left_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'coffee_bistro_service_left_content_type' )->value();
	return ( coffee_bistro_is_service_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function coffee_bistro_is_service_left_section_and_content_type_page_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'coffee_bistro_service_left_content_type' )->value();
	return ( coffee_bistro_is_service_section_enabled( $control ) && ( 'page' === $content_type ) );
}

function coffee_bistro_is_service_right_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'coffee_bistro_service_right_content_type' )->value();
	return ( coffee_bistro_is_service_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function coffee_bistro_is_service_right_section_and_content_type_page_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'coffee_bistro_service_right_content_type' )->value();
	return ( coffee_bistro_is_service_section_enabled( $control ) && ( 'page' === $content_type ) );
}