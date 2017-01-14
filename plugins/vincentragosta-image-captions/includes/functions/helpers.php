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
function vincentragosta_set_image_default_properties() {
	global $post;

	if ( $post->post_type === 'page' ) :
		$featured_image_classes[] = 'aspect-ratio-10x4';
		$featured_image_classes[] = 'image-min-height';
		$visibility_class         = 'visible';
		$text                     = get_post_meta( $post->ID, 'sub_header', true );
		$text_class               = 'sub-header';
		$button_text              = $atts['button_text'];
	elseif ( $post->post_type === 'post' ) :
		$featured_image_classes[] = 'aspect-ratio-1x1';
		$visibility_class         = 'not-visible';
		$text                     = date_format( date_create( $post->post_date ), 'jS F Y' );
		$text_class               = 'date';
		$button_text              = 'View ' . $post->post_type;
	else :
		$featured_image_classes[] = 'aspect-ratio-1x1';
		$visibility_class         = 'not-visible';
		$text                     = 'Wordpress Site'; // Make this dynamic.
		$text_class               = 'taxonomy';
		$button_text              = 'View ' . $post->post_type;
	endif;

	$default_properties = ( object ) array(
		'title'                  => $post->post_title,
		'image_source'           => vincentragosta_get_featured_image( $post->ID ),
		'featured_image_classes' => $featured_image_classes,
		'visibility_class'       => $visibility_class,
		'text'                   => $text,
		'text_class'             => $text_class,
		'button_text'            => $button_text
	);

	return $default_properties;
}
?>
