<?php
/**
 * Enqueue scripts for front-end.
 *
 * @since  0.1.0
 * @uses   wp_enqueue_script()
 * @return void
 */
function image_captions_scripts() {

}
add_action( 'wp_enqueue_scripts', 'image_captions_scripts', 99 );

/**
 * Enqueue styles for front-end.
 *
 * @since  0.1.0
 * @uses   wp_enqueue_style()
 * @return void
 */
function image_captions_styles() {
	wp_register_style(
		'ic-core-components',
		IMAGE_CAPTIONS_URL . "assets/css/image-captions---core-components.css",
		array(),
		IMAGE_CAPTIONS_VERSION
	);

	wp_register_style(
		'ic-helpers',
		IMAGE_CAPTIONS_URL . "assets/css/image-captions---helpers.css",
		array(),
		IMAGE_CAPTIONS_VERSION
	);

	wp_register_style(
		'ic-sub-header',
		IMAGE_CAPTIONS_URL . "assets/css/image-captions---sub-header.css",
		array(),
		IMAGE_CAPTIONS_VERSION
	);

	wp_register_style(
		'ic-header',
		IMAGE_CAPTIONS_URL . "assets/css/image-captions---header.css",
		array(),
		IMAGE_CAPTIONS_VERSION
	);

	wp_register_style(
		'ic-overlay',
		IMAGE_CAPTIONS_URL . "assets/css/image-captions---overlay.css",
		array(),
		IMAGE_CAPTIONS_VERSION
	);

	wp_register_style(
		'ic-post-type',
		IMAGE_CAPTIONS_URL . "assets/css/image-captions---post-type.css",
		array(),
		IMAGE_CAPTIONS_VERSION
	);

	wp_enqueue_style(
		'image-captions',
		IMAGE_CAPTIONS_URL . "assets/css/image-captions---twenty-sixteen.css",
		array( 'ic-core-components', 'ic-helpers', 'ic-sub-header', 'ic-header', 'ic-overlay', 'ic-post-type' ),
		IMAGE_CAPTIONS_VERSION,
		'all'
	);
}
add_action( 'wp_enqueue_scripts', 'image_captions_styles', 99 );
?>
