<?php

namespace ImageCaptions\Functions\Core;

/**
 * Set up image captions defaults and register supported WordPress features.
 *
 * @since 0.1.0
 * @uses add_action(), $n()
 * @return void
 */
function setup() {
	$n = function( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'wp_enqueue_scripts', $n( 'image_captions_scripts' ) );
	add_action( 'wp_enqueue_scripts', $n( 'image_captions_styles' ) );
	add_action( 'widgets_init', $n( 'widgets' ) );
}

/**
 * Enqueue scripts for front-end.
 *
 * @since 0.1.0
 * @uses wp_enqueue_script()
 * @return void
 */
function image_captions_scripts() {
	/**
	 * Flag whether to enable loading uncompressed/debugging assets. Default false.
	 *
	 * @param bool vincentragosta_script_debug
	 */
	$debug = apply_filters( 'vincentragosta_script_debug', false );
	$min = ( $debug || defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_script(
		'image-captions',
		IMAGE_CAPTIONS_URL . "assets/js/image-captions---twenty-sixteen{$min}.js",
		array(),
		IMAGE_CAPTIONS_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'image_captions_scripts', 99 );

/**
 * Enqueue styles for front-end.
 *
 * @since 0.1.0
 * @uses wp_enqueue_style()
 * @return void
 */
function image_captions_styles() {
	/**
	 * Flag whether to enable loading uncompressed/debugging assets. Default false.
	 *
	 * @param bool vincentragosta_style_debug
	 */
	$debug = apply_filters( 'vincentragosta_style_debug', true );
	$min = ( $debug || defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_style(
		'image-captions',
		IMAGE_CAPTIONS_URL . "assets/css/image-captions---twenty-sixteen{$min}.css",
		array(),
		IMAGE_CAPTIONS_VERSION
	);
}

/**
 * Register custom widgets for back-end.
 *
 * @since 0.1.0
 * @uses register_widget()
 * @return void
 */
function widgets() {
	register_widget( 'News_And_Updates_Widget' );
	register_widget( 'Featured_Page_Widget' );
}
