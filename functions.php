<?php
/**
 * WPAC Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WPAC
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_WPAC_VERSION', '1.0.0' );

/**
 * Enqueue styles a d scripts
 */
function child_enqueue_scripts() {

	wp_enqueue_script('jquery');
	wp_enqueue_style( 'wpac-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_WPAC_VERSION, 'all' );

}

add_action( 'wp_enqueue_scripts', 'child_enqueue_scripts', 15 );