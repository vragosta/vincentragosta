<?php
/**
 * Plugin Name: Image Captions
 * Description: Displays post featured image with text overlay.
 * Version: 0.1.0
 * Author: Vincent Ragosta
 * Author URI: http://vincentragosta.com
 * Text Domain: vincentragosta
 *
 * @package Image Captions - Twenty Sixteen
 * @since   0.1.0
 */

# Global plugin defines.
define( 'IMAGE_CAPTIONS_VERSION', '0.1.0' );
define( 'IMAGE_CAPTIONS_URL', plugin_dir_url( __FILE__ ) );
define( 'IMAGE_CAPTIONS_PATH', dirname( __FILE__ ) . '/' );
define( 'IMAGE_CAPTIONS_IMAGE_SIZE', 'large' );

# Include all functions associated with the image caption shortcode.
require_once IMAGE_CAPTIONS_PATH . 'includes/functions/core.php';

# Run the setup functions.
ImageCaptions\Functions\Core\setup();

# Include all helper functions associated with the image caption shortcode.
require_once IMAGE_CAPTIONS_PATH . 'includes/functions/helpers.php';

# Include image caption specific metaboxes.
require_once IMAGE_CAPTIONS_PATH . 'includes/metaboxes/metabox-page.php';
require_once IMAGE_CAPTIONS_PATH . 'includes/metaboxes/metabox-post.php';
require_once IMAGE_CAPTIONS_PATH . 'includes/metaboxes/metabox-project.php';

# Include image caption related widgets.
require_once IMAGE_CAPTIONS_PATH . 'includes/widgets/class-featured-page.php';
require_once IMAGE_CAPTIONS_PATH . 'includes/widgets/class-news-and-updates.php';

/**
 * Generate image caption shortcode for use within the theme.
 *
 * @since  0.1.0
 * @param  array $atts contains redefined attributes set on shortcode.
 * @uses   set_default_properties(), implode(), include()
 * @return string $shortcode contains the necessary HTML required to build player on front-end.
 */
function image_captions_shortcode( $atts ) {

	$atts = shortcode_atts( array(
		'id'    => '',
		'class' => ''
	), $atts );

	# Obtain the centralized default properties object.
	$image_caption = ImageCaptions\Functions\Helpers\set_default_properties( $atts ); ?>

	<!-- Image Caption HTML start -->
	<main class="featured-image <?php echo implode( ' ', $image_caption->classes ); ?>">

		<!-- Overlay container -->
		<div class="overlay col-flex-center">

			<!-- Sub-header -->
			<?php include( IMAGE_CAPTIONS_PATH . 'partials/content-sub-header.php' ); ?>

			<!-- Header -->
			<?php include( IMAGE_CAPTIONS_PATH . 'partials/content-header.php' ); ?>

			<!-- Permalink button -->
			<?php include( IMAGE_CAPTIONS_PATH . 'partials/content-button.php' ); ?>

		</div>

		<!-- Post image -->
		<?php include( IMAGE_CAPTIONS_PATH . 'partials/content-image.php' ); ?>

	</main><?php

	return $shortcode;

}
add_shortcode( 'image-caption', 'image_captions_shortcode' );
