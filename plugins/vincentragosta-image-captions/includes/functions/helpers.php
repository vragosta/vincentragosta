<?php
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
 * TODO
 *
 * @since  0.1.0
 * @param  Array $atts     Array of attributes assigned to the shortcode.
 * @uses   get_post_meta()
 * @return Array $defaults Array of default values.
 */
function vincentragosta_set_image_default_properties( $atts ) {
	global $post;

	// TODO
	if ( $atts['class'] ) :
		$featured_image_classes = explode( ' ', $atts['class'] );
	endif;

	// TODO
	if ( $post->post_type === 'page' ) :
		$featured_image_classes[] = 'aspect-ratio-10x4';
		$featured_image_classes[] = 'image-min-height';
		$visibility_class         = 'visible';
		$sub_header               = get_post_meta( $post->ID, 'sub_header', true );
		$sub_header_class         = 'big';
		$header_class             = 'big';
		$button_text              = $atts['data-button-text'];
	elseif ( $post->post_type === 'post' ) :
		$featured_image_classes[] = ( in_array( 'static', $featured_image_classes, true ) ) ? 'aspect-ratio-10x4' : 'aspect-ratio-1x1';
		$featured_image_classes[] = ( in_array( 'static', $featured_image_classes, true ) ) ? 'image-min-height' : '';
		$visibility_class         = 'not-visible';
		$sub_header               = date_format( date_create( $post->post_date ), 'jS F Y' );
		$sub_header_class         = ( in_array( 'static', $featured_image_classes, true ) ) ? 'big' : 'small';
		$header_class             = ( in_array( 'static', $featured_image_classes, true ) ) ? 'big' : 'small';
		$button_text              = 'View ' . $post->post_type;
	else :
		$featured_image_classes[] = ( in_array( 'static', $featured_image_classes, true ) ) ? 'aspect-ratio-10x4' : 'aspect-ratio-1x1';
		$featured_image_classes[] = ( in_array( 'static', $featured_image_classes, true ) ) ? 'image-min-height' : '';
		$visibility_class         = 'not-visible';
		$sub_header               = 'Wordpress Site'; // Make this dynamic.
		$sub_header_class         = ( in_array( 'static', $featured_image_classes, true ) ) ? 'big' : 'small';
		$header_class             = ( in_array( 'static', $featured_image_classes, true ) ) ? 'big' : 'small';
		$button_text              = 'View ' . $post->post_type;
	endif;

	$defaults = ( object ) array(
		'header'                 => $post->post_title,
		'image_source'           => vincentragosta_get_featured_image( $post->ID ),
		'featured_image_classes' => $featured_image_classes,
		'visibility_class'       => $visibility_class,
		'sub_header'             => $sub_header,
		'sub_header_class'       => $sub_header_class,
		'header_class'           => $header_class,
		'button_text'            => $button_text
	);

	return $defaults ;
}
?>
