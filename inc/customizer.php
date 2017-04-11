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

	//Create Theme Options Settings
	$wp_customize->add_section( 'whaling_settings' , array(
		'title'      => 'Theme Options',
		'priority'   => 210,
	) );


	//Home Page Callout
	$wp_customize->add_setting( 'home_page_message', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'home_page_message', array(
		'label'    =>  'Homepage Message',
		'section'  => 'whaling_settings',
		'type'     => 'text',
		'priority' => 28
	) );

	//Contact Us Link
	$wp_customize->add_setting( 'contact_link', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'contact_link', array(
		'label'    =>  'Contact Us Link',
		'section'  => 'whaling_settings',
		'type'     => 'text',
		'priority' => 30
	) );

	//Phone Number
	$wp_customize->add_setting( 'phone_number', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'phone_number', array(
		'label'    =>  'Phone Number',
		'section'  => 'whaling_settings',
		'type'     => 'text',
		'priority' => 30
	) );

	//Facebook URL
	$wp_customize->add_setting( 'facebook', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'facebook', array(
		'label'    =>  'Facebook URL',
		'section'  => 'whaling_settings',
		'type'     => 'text',
		'priority' => 30
	) );

	//Twitter
	$wp_customize->add_setting( 'twitter', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'twitter', array(
		'label'    =>  'Twitter URL',
		'section'  => 'whaling_settings',
		'type'     => 'text',
		'priority' => 30
	) );


}
add_action( 'customize_register', 'whalingcityweb_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function whalingcityweb_customize_preview_js() {
	wp_enqueue_script( 'whalingcityweb_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'whalingcityweb_customize_preview_js' );
