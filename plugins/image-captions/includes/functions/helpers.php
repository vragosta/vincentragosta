<?php
/**
 * Generate a centralized defaults object for easy obtainability from main plugin template.
 *
 * @since  0.1.0
 * @param  Array $atts     Array of attributes assigned to the shortcode.
 * @uses   get_post(), in_array(), get_featured_image(), set_featured_image_classes(),
 *         set_visibility_class, set_sub_header_text(), set_font_size(),
 *         set_button_text()
 * @return Array $defaults Array of default values.
 */

namespace image_captions\Twenty_Sixteen\Helpers;

function set_default_properties( $atts ) {
	global $post;

	// If the attribute 'id' is set on the shortcode, set the post object to the post entered.
	if ( $atts['id'] ) { $post = get_post( $atts['id'] ); }

	// Set up variable to check if static exists as a class.
	$is_static = in_array( 'static', explode( ' ', $atts['class'] ), true );

	$defaults = ( object ) array(
		'header_text'            => $post->post_title,
		'image_source'           => get_featured_image( $post->ID ),
		'featured_image_classes' => set_featured_image_classes( $is_static, $atts['class'] ),
		'visibility_class'       => set_visibility_class( $is_static ),
		'sub_header_text'        => set_sub_header_text( $post ),
		'button_text'            => set_button_text( $is_static, $post, $atts['data-button-text'] )
	);

	return $defaults;
}

/**
 * Returns featured image of a post or custom post type.
 *
 * @since  0.1.0
 * @param  int    $id ID of the WP_Post Object.
 * @return string     URL of attached image.
 */
function get_featured_image( $id ) {
	return wp_get_attachment_image_src( get_post_thumbnail_id( $id ), IMAGE_CAPTIONS_IMAGE_SIZE )[0];
}

/**
 * Sets the featured image classes, based on if the 'static' class is put on the shortcode.
 *
 * @since  0.1.0
 * @uses   explode(), array_push()
 * @param  boolean $is_static              boolean for if the class 'static' is in the featured image classes.
 * @param  array   $atts                   array of attributes assigned to the shortcode.
 * @return array   $featured_image_classes array of default class values for the featured image element.
 */
function set_featured_image_classes( $is_static, $classes ) {
	// Define local variables.
	$featured_image_classes = array();

	// If classes are passed in from the shortcode itself, explode into array.
	if ( $classes ) :
		$featured_image_classes = explode( ' ', $classes );
	endif;

	if ( $is_static ) :
		array_push( $featured_image_classes, 'aspect-ratio-10x4', 'image-min-height' );
	else :
		array_push( $featured_image_classes, 'aspect-ratio-1x1' );
	endif;

	return $featured_image_classes;
}

/**
 * Sets whether or not the overlay will display its hover display on page load or not.
 *
 * @since  0.1.0
 * @param  boolean $is_static boolean for if the class 'static' is in the featured image classes.
 * @return string             visibility class for overlay.
 */
function set_visibility_class( $is_static ) {
	return ( $is_static ) ? 'visible' : 'not-visible';
}

/**
 * Sets up the button text on static and non-static image caption shortcodes.
 *
 * @since  0.1.0
 * @uses   get_post_meta()
 * @param  boolean $is_static boolean for if the class 'static' is in the featured image classes.
 * @return string             text for button.
 */
function set_button_text( $is_static, $post ) {
	return ( $is_static ) ? get_post_meta( $post->ID, 'button_text', true ) : 'View ' . $post->post_type;
}

/**
 * Sets the sub-header text for the shortcode.
 *
 * @since  0.1.0
 * @param  wp_post $post current post object
 * @return string        text for sub header.
 */
function set_sub_header_text( $post ) {
	if ( $post->post_type === 'page' ) :
		$sub_header = get_post_meta( $post->ID, 'sub_header', true );
	elseif ( $post->post_type === 'post' ) :
		$sub_header = date_format( date_create( $post->post_date ), 'jS F Y' );
	else:
		$sub_header = 'Wordpress Site'; // TODO Make this dynamic or have some other treatment.
	endif;

	return $sub_header;
}

?>
