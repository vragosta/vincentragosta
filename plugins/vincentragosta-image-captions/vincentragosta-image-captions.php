<?php
/**
 * Plugin Name: Image Captions
 * Description: Displays post featured image with text overlay.
 * Version: 0.1.0
 * Author: Vincent Ragosta
 * Author URI: http://vincentragosta.com
 * Text Domain: vincentragosta
 *
 * @package VincentRagosta 2016
 * @since   0.1.0
 */

// TODO
define( 'VINCENTRAGOSTA_IMAGE_CAPTION_VERSION', '0.1.0' );
define( 'VINCENTRAGOSTA_IMAGE_CAPTION_URL', plugin_dir_url( __FILE__ ) );
define( 'VINCENTRAGOSTA_IMAGE_CAPTION_PATH', dirname( __FILE__ ) . '/' );
define( 'VINCENTRAGOSTA_IMAGE_CAPTION_IMAGE_SIZE', 'large' );

// Include all functions associated with the image caption shortcode.
require_once VINCENTRAGOSTA_IMAGE_CAPTION_PATH . 'includes/functions/core.php';

// Include all helper functions associated with the image caption shortcode.
require_once VINCENTRAGOSTA_IMAGE_CAPTION_PATH . 'includes/functions/helpers.php';

/**
 * TODO
 *
 * @since  0.1.0
 * @uses
 * @param  array  $atts      Contains redefined attributes set on shortcode.
 * @return string $shortcode Contains the necessary HTML required to build player on front-end.
 */
function vincentragosta_image_captions_shortcode( $atts ) {

	$atts = shortcode_atts( array(
		'id'               => '',
		'class'            => '',
		'data-button-text' => ''
	), $atts );

	global $post;

	// If the attribute 'id' is set on the shortcode, set the post object to the post entered.
	if ( $atts['id'] ) { $post = get_post( $atts['id'] ); }

	// Create a classes array from attribute classes ( explode string ).
	$classes = ( $atts['class'] ) ? explode( ' ', $atts['class'] ) : array();

	// TODO
	$defaults = vincentragosta_set_image_default_properties( $atts );

	// var_dump( $defaults->button_text ); ?>

	<!-- TODO -->
	<figure class="featured-image <?php echo implode( ' ', $defaults->featured_image_classes ); ?>">

		<!-- Overlay container -->
		<div class="overlay col-flex-center <?php echo $defaults->visibility_class; ?>">

			<!-- Sub-header -->
			<!-- TODO Create function for this -->
			<?php include( VINCENTRAGOSTA_IMAGE_CAPTION_PATH . 'partials/aside-text.php' ); ?>

			<!-- Header -->
			<!-- TODO Create function for this -->
			<?php include( VINCENTRAGOSTA_IMAGE_CAPTION_PATH . 'partials/aside-header.php' ); ?>

			<!-- Permalink button -->
			<!-- TODO Create function for this -->
			<?php include( VINCENTRAGOSTA_IMAGE_CAPTION_PATH . 'partials/aside-button.php' ); ?>

		</div>

		<!-- Post image -->
		<div class="post-type normalize-image" style="background-image: url( '<?php echo esc_attr( $defaults->image_source ); ?>' );"></div>

	</figure><?php

	return $shortcode;

}
add_shortcode( 'image-caption', 'vincentragosta_image_captions_shortcode' );
