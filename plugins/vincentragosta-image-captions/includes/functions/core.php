<?php
/**
 * Enqueue scripts for front-end.
 *
 * @since  0.1.0
 * @uses   wp_enqueue_script()
 * @return void
 */
function vincentragosta_image_caption_scripts() {
	// wp_enqueue_script(
	// 	'sc-player',
	// 	STORYCORPS_PLAYER_URL . "assets/js/sc-player.js",
	// 	array( 'jquery' ),
	// 	STORYCORPS_PLAYER_VERSION,
	// 	true
	// );
}
add_action( 'wp_enqueue_scripts', 'vincentragosta_image_caption_scripts', 99 );

/**
 * Enqueue styles for front-end.
 *
 * @since  0.1.0
 * @uses   wp_enqueue_style()
 * @return void
 */
function vincentragosta_image_caption_styles() {
	wp_enqueue_style(
		'vincentragosta-image-caption',
		VINCENTRAGOSTA_IMAGE_CAPTION_URL . "assets/css/vincentragosta---image-captions-twenty-sixteen.css",
		array(),
		VINCENTRAGOSTA_IMAGE_CAPTION_VERSION,
		'all'
	);
}
add_action( 'wp_enqueue_scripts', 'vincentragosta_image_caption_styles', 99 );
?>
