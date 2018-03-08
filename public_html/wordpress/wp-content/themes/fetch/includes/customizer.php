<?php
/**
 * clean Theme Customizer
 *
 * @package Fetch     
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function fetch_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->fetch         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->fetch  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->fetch = 'postMessage';
}
add_action( 'customize_register', 'fetch_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function fetch_customize_preview_js() {
	wp_enqueue_script( 'fetch_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'fetch_customize_preview_js' );

