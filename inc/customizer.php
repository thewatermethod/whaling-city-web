<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * whalingcityweb Theme Customizer.
 *
 * @package whalingcityweb
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function whalingcityweb_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// $wp_customize->add_section( 'whaling_settings' , array(
	// 	'title'      => 'Theme Options',
	// 	'priority'   => 30,
	// ) );

	// $wp_customize->add_setting( 'featured_category', array(
	// 	'default'           => 0,
	// 	'sanitize_callback' => 'absint',
	// 	'type' 				=> 'theme_mod'
	// ) );

	// $wp_customize->add_control( 'featured_category', array(
	// 	'label'    => 'Category Featured on Home Page',
	// 	'section'  => 'goldenagehorror_settings',
	// 	'type'     => 'select',
	// 	'choices' => $categories,
	// 	'priority' => 2
	// ) );


}
add_action( 'customize_register', 'whalingcityweb_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function whalingcityweb_customize_preview_js() {
	wp_enqueue_script( 'whalingcityweb_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'whalingcityweb_customize_preview_js' );
