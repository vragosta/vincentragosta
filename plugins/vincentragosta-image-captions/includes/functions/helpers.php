<?php
/**
 * Generate a centralized defaults object for easy obtainability from main plugin template.
 *
 * @since  0.1.0
 * @param  Array $atts     Array of attributes assigned to the shortcode.
 * @uses   get_post(), in_array(), vincentragosta_get_featured_image(), vincentragosta_set_featured_image_classes(),
 *         vincentragosta_set_visibility_class, vincentragosta_set_sub_header_text(), vincentragosta_set_font_size(),
 *         vincentragosta_set_button_text()
 * @return Array $defaults Array of default values.
 */
function vincentragosta_set_default_properties( $atts ) {
	global $post;

	// If the attribute 'id' is set on the shortcode, set the post object to the post entered.
	if ( $atts['id'] ) { $post = get_post( $atts['id'] ); }

	// Set up variable to check if static exists as a class.
	$is_static = in_array( 'static', explode( ' ', $atts['class'] ), true );

	$defaults = ( object ) array(
		'header_text'            => $post->post_title,
		'image_source'           => vincentragosta_get_featured_image( $post->ID ),
		'featured_image_classes' => vincentragosta_set_featured_image_classes( $is_static, $atts['class'] ),
		'visibility_class'       => vincentragosta_set_visibility_class( $is_static ),
		'sub_header_text'        => vincentragosta_set_sub_header_text( $post ),
		'sub_header_class'       => vincentragosta_set_font_size( $is_static ),
		'header_class'           => vincentragosta_set_font_size( $is_static ),
		'button_text'            => vincentragosta_set_button_text( $is_static, $post, $atts['data-button-text'] )
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
function vincentragosta_get_featured_image( $id ) {
	return wp_get_attachment_image_src( get_post_thumbnail_id( $id ), VINCENTRAGOSTA_COM_IMAGE_SIZE )[0];
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
function vincentragosta_set_featured_image_classes( $is_static, $classes ) {
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
function vincentragosta_set_visibility_class( $is_static ) {
	return ( $is_static ) ? 'visible' : 'not-visible';
}

/**
 * Sets up whether the font size on sub-header and header elements will be 'big' or 'small'.
 *
 * @since  0.1.0
 * @param  boolean $is_static boolean for if the class 'static' is in the featured image classes.
 * @return string             font-size class for sub-header/header.
 */
function vincentragosta_set_font_size( $is_static ) {
	return ( $is_static ) ? 'big' : 'small';
}

/**
 * Sets up the button text on static and non-static image caption shortcodes.
 *
 * @since  0.1.0
 * @uses   get_post_meta()
 * @param  boolean $is_static boolean for if the class 'static' is in the featured image classes.
 * @return string             text for button.
 */
function vincentragosta_set_button_text( $is_static, $post ) {
	return ( $is_static ) ? get_post_meta( $post->ID, 'button_text', true ) : 'View ' . $post->post_type;
}

/**
 * Sets the sub-header text for the shortcode.
 *
 * @since  0.1.0
 * @param  wp_post $post current post object
 * @return string        text for sub header.
 */
function vincentragosta_set_sub_header_text( $post ) {
	if ( $post->post_type === 'page' ) :
		$sub_header = get_post_meta( $post->ID, 'sub_header', true );
	elseif ( $post->post_type === 'post' ) :
		$sub_header = date_format( date_create( $post->post_date ), 'jS F Y' );
	else:
		$sub_header = 'Wordpress Site'; // Make this dynamic.
	endif;

	return $sub_header;
}

?>
