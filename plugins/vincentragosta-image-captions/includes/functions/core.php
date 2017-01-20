<?php
/**
 * Enqueue scripts for front-end.
 *
 * @since  0.1.0
 * @uses   wp_enqueue_script()
 * @return void
 */
// function vincentragosta_image_caption_scripts() {
//
// }
// add_action( 'wp_enqueue_scripts', 'vincentragosta_image_caption_scripts', 99 );

/**
 * Enqueue styles for front-end.
 *
 * @since  0.1.0
 * @uses   wp_enqueue_style()
 * @return void
 */
function vincentragosta_image_caption_styles() {
	wp_register_style(
		'vincentragosta-image-captions-core-components',
		VINCENTRAGOSTA_IMAGE_CAPTION_URL . "assets/css/vincentragosta---image-captions-core-components.css",
		array(),
		VINCENTRAGOSTA_IMAGE_CAPTION_VERSION
	);

	wp_register_style(
		'vincentragosta-image-captions-helpers',
		VINCENTRAGOSTA_IMAGE_CAPTION_URL . "assets/css/vincentragosta---image-captions-helpers.css",
		array(),
		VINCENTRAGOSTA_IMAGE_CAPTION_VERSION
	);

	wp_register_style(
		'vincentragosta-image-captions-sub-header',
		VINCENTRAGOSTA_IMAGE_CAPTION_URL . "assets/css/vincentragosta---image-captions-sub-header.css",
		array(),
		VINCENTRAGOSTA_IMAGE_CAPTION_VERSION
	);

	wp_register_style(
		'vincentragosta-image-captions-header',
		VINCENTRAGOSTA_IMAGE_CAPTION_URL . "assets/css/vincentragosta---image-captions-header.css",
		array(),
		VINCENTRAGOSTA_IMAGE_CAPTION_VERSION
	);

	wp_register_style(
		'vincentragosta-image-captions-overlay',
		VINCENTRAGOSTA_IMAGE_CAPTION_URL . "assets/css/vincentragosta---image-captions-overlay.css",
		array(),
		VINCENTRAGOSTA_IMAGE_CAPTION_VERSION
	);

	wp_register_style(
		'vincentragosta-image-captions-post-type',
		VINCENTRAGOSTA_IMAGE_CAPTION_URL . "assets/css/vincentragosta---image-captions-post-type.css",
		array(),
		VINCENTRAGOSTA_IMAGE_CAPTION_VERSION
	);

	wp_enqueue_style(
		'vincentragosta-image-captions',
		VINCENTRAGOSTA_IMAGE_CAPTION_URL . "assets/css/vincentragosta---image-captions-twenty-sixteen.css",
		array( 'vincentragosta-image-captions-core-components', 'vincentragosta-image-captions-helpers', 'vincentragosta-image-captions-sub-header', 'vincentragosta-image-captions-header', 'vincentragosta-image-captions-overlay', 'vincentragosta-image-captions-post-type' ),
		VINCENTRAGOSTA_IMAGE_CAPTION_VERSION,
		'all'
	);
}
add_action( 'wp_enqueue_scripts', 'vincentragosta_image_caption_styles', 99 );
?>
