<?php
/**
 * Plugin Name: Image Captions
 * Description: Displays post featured image with text overlay.
 * Version: 0.1.0
 * Author: Vincent Ragosta
 * Author URI: http://vincentragosta.com
 * Text Domain: vincentragosta
 *
 * @package Image Captions 2016
 * @since   0.1.0
 */

// Global defines.
define( 'IMAGE_CAPTIONS_VERSION', '0.1.0' );
define( 'IMAGE_CAPTIONS_URL', plugin_dir_url( __FILE__ ) );
define( 'IMAGE_CAPTIONS_PATH', dirname( __FILE__ ) . '/' );
define( 'IMAGE_CAPTIONS_IMAGE_SIZE', 'large' );

// Include all functions associated with the image caption shortcode.
require_once IMAGE_CAPTIONS_PATH . 'includes/functions/core.php';

// Include all helper functions associated with the image caption shortcode.
require_once IMAGE_CAPTIONS_PATH . 'includes/functions/helpers.php';

// Include image caption specific metaboxes.
require_once IMAGE_CAPTIONS_PATH . 'includes/metaboxes/metabox-page.php';
require_once IMAGE_CAPTIONS_PATH . 'includes/metaboxes/metabox-post.php';
require_once IMAGE_CAPTIONS_PATH . 'includes/metaboxes/metabox-project.php';

/**
 * Generate image caption shortcode for use within the theme.
 *
 * @since  0.1.0
 * @uses
 * @param  array  $atts      Contains redefined attributes set on shortcode.
 * @return string $shortcode Contains the necessary HTML required to build player on front-end.
 */
function image_captions_shortcode( $atts ) {

	$atts = shortcode_atts( array(
		'id'    => '',
		'class' => ''
	), $atts );

	global $post;

	// Obtain the centralized default properties object.
	$defaults = set_default_properties( $atts ); ?>

	<!-- Image Caption HTML start -->
	<figure class="featured-image <?php echo implode( ' ', $defaults->featured_image_classes ); ?>">

		<!-- Overlay container -->
		<div class="overlay col-flex-center <?php echo $defaults->visibility_class; ?>">

			<!-- Sub-header -->
			<?php include( IMAGE_CAPTIONS_PATH . 'partials/aside-sub-header.php' ); ?>

			<!-- Header -->
			<?php include( IMAGE_CAPTIONS_PATH . 'partials/aside-header.php' ); ?>

			<!-- Permalink button -->
			<?php include( IMAGE_CAPTIONS_PATH . 'partials/aside-button.php' ); ?>

		</div>

		<!-- Post image -->
		<?php include( IMAGE_CAPTIONS_PATH . 'partials/content-image.php' ); ?>

	</figure><?php

	return $shortcode;

}
add_shortcode( 'image-caption', 'image_captions_shortcode' );
