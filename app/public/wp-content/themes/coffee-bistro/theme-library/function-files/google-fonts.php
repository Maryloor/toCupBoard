<?php
function coffee_bistro_get_all_google_fonts() {
    $coffee_bistro_webfonts_json = get_template_directory() . '/theme-library/google-webfonts.json';
    if ( ! file_exists( $coffee_bistro_webfonts_json ) ) {
        return array();
    }

    $coffee_bistro_fonts_json_data = file_get_contents( $coffee_bistro_webfonts_json );
    if ( false === $coffee_bistro_fonts_json_data ) {
        return array();
    }

    $coffee_bistro_all_fonts = json_decode( $coffee_bistro_fonts_json_data, true );
    if ( json_last_error() !== JSON_ERROR_NONE ) {
        return array();
    }

    $coffee_bistro_google_fonts = array();
    foreach ( $coffee_bistro_all_fonts as $font ) {
        $coffee_bistro_google_fonts[ $font['family'] ] = array(
            'family'   => $font['family'],
            'variants' => $font['variants'],
        );
    }
    return $coffee_bistro_google_fonts;
}


function coffee_bistro_get_all_google_font_families() {
    $coffee_bistro_google_fonts  = coffee_bistro_get_all_google_fonts();
    $coffee_bistro_font_families = array();
    foreach ( $coffee_bistro_google_fonts as $font ) {
        $coffee_bistro_font_families[ $font['family'] ] = $font['family'];
    }
    return $coffee_bistro_font_families;
}

function coffee_bistro_get_fonts_url() {
    $coffee_bistro_fonts_url = '';
    $fonts     = array();

    $coffee_bistro_all_fonts = coffee_bistro_get_all_google_fonts();

    if ( ! empty( get_theme_mod( 'coffee_bistro_site_title_font', 'Raleway' ) ) ) {
        $fonts[] = get_theme_mod( 'coffee_bistro_site_title_font', 'Raleway' );
    }

    if ( ! empty( get_theme_mod( 'coffee_bistro_site_description_font', 'Raleway' ) ) ) {
        $fonts[] = get_theme_mod( 'coffee_bistro_site_description_font', 'Raleway' );
    }

    if ( ! empty( get_theme_mod( 'coffee_bistro_header_font', 'Epilogue' ) ) ) {
        $fonts[] = get_theme_mod( 'coffee_bistro_header_font', 'Epilogue' );
    }

    if ( ! empty( get_theme_mod( 'coffee_bistro_content_font', 'Raleway' ) ) ) {
        $fonts[] = get_theme_mod( 'coffee_bistro_content_font', 'Raleway' );
    }

    $fonts = array_unique( $fonts );

    foreach ( $fonts as $font ) {
        $coffee_bistro_variants      = $coffee_bistro_all_fonts[ $font ]['variants'];
        $coffee_bistro_font_family[] = $font . ':' . implode( ',', $coffee_bistro_variants );
    }

    $query_args = array(
        'family' => urlencode( implode( '|', $coffee_bistro_font_family ) ),
    );

    if ( ! empty( $coffee_bistro_font_family ) ) {
        $coffee_bistro_fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }

    return $coffee_bistro_fonts_url;
}

