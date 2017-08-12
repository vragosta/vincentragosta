<?php

namespace ImageCaptions\Functions\Helpers;
use \MultiPostThumbnails;

/**
 * Generate a centralized defaults object for easy obtainability from main plugin template.
 *
 * @since 0.1.0
 * @param array $atts array of attributes assigned to the shortcode.
 * @uses get_post(), in_array(), explode(), get_featured_image(), set_featured_image_classes(),
 *       set_visibility_class, set_sub_header_text(), set_font_size(),
 *       set_button_text()
 * @return array $defaults array of default values.
 */
function set_default_properties( $atts ) {
	global $post;

	# If the attribute 'id' is set on the shortcode, set the post object to the post entered.
	if ( $atts['id'] ) {
		$post = get_post( $atts['id'] );
	}

	# If we are on the blog template, get the blog template ID.
	if ( is_home() ) {
		$post = get_post( get_option( 'page_for_posts' ) );
	}

	# Set up variable to check if static exists as a class.
	$is_static = in_array( 'static', explode( ' ', $atts['class'] ), true );

	$defaults = ( object ) array(
		'ID' => $post->ID,
		'slug' => $post->post_name,
		'header' => set_header_text( $post ),
		'image_source' => is_single() ? set_cover_image( $post->ID ) : set_featured_image( $post->ID, $is_static ),
		'classes' => set_featured_image_classes( $is_static, $atts['class'] ),
		'sub_header' => set_sub_header_text( $post ),
		'button_text' => set_button_text( $is_static, $post ),
		'button_link' => set_button_link( $post ),
		'button_downloadable' => set_button_downloadable( $post ),
	);

	return $defaults;
}

/**
 * Returns featured image of a post or custom post type.
 *
 * @since 0.1.0
 * @param int $id id of the wp_post object.
 * @param bool $is_static determines if image is being used for header
 * @uses wp_get_attachment_image_src(), get_post_thumbnail_id()
 * @return string void url of attached image.
 */
function set_featured_image( $id, $is_static ) {
	$size = $is_static ? IMAGE_CAPTIONS_HERO_SIZE : IMAGE_CAPTIONS_IMAGE_SIZE;
	return wp_get_attachment_image_src( get_post_thumbnail_id( $id ), $size )[0];
}

/**
 * If the square featured image exists, return the attached image url with the appropriate size dimensions.
 *
 * @since 0.1.0
 * @uses class_exists(), MultiPostThumbnails::has_post_thumbnail(), MultiPostThumbnails::get_post_thumbnail_url()
 * @return string void image url
 */
function set_cover_image( $id ) {
	return class_exists( 'MultiPostThumbnails' ) && MultiPostThumbnails::has_post_thumbnail( 'project', 'cover-image', $id ) ?
		MultiPostThumbnails::get_post_thumbnail_url( 'project', 'cover-image', $id, 'large' ) :
			set_featured_image( $id );
}

/**
 * Sets the featured image classes, based on if the 'static' class is put on the shortcode.
 *
 * @since 0.1.0
 * @param boolean $is_static boolean for if the class 'static' is in the featured image classes.
 * @param array $atts array of attributes assigned to the shortcode.
 * @uses explode(), array_push()
 * @return array $featured_image_classes array of default class values for the featured image element.
 */
function set_featured_image_classes( $is_static, $classes ) {
	# Define local variables.
	$featured_image_classes = array();

	# If classes are passed in from the shortcode itself, explode into array.
	if ( $classes ) {
		$featured_image_classes = explode( ' ', $classes );
	}

	# If the shortcode contains the class 'static', add different classes to the classes array.
	if ( $is_static ) {
		array_push( $featured_image_classes, 'aspect-ratio-10x4', 'image-min-height' );
	} else {
		array_push( $featured_image_classes, 'aspect-ratio-1x1' );
	}

	return $featured_image_classes;
}

/**
 * Sets up the button text on static and non-static image caption shortcodes.
 *
 * @since 0.1.0
 * @param boolean $is_static boolean for if the class 'static' is in the featured image classes.
 * @param wp_post $post current post object.
 * @uses get_post_meta()
 * @return string void text for button.
 */
function set_button_text( $is_static, $post ) {
	return $is_static ? get_post_meta( $post->ID, 'button_text', true ) : 'View ' . $post->post_type;
}

/**
 * Sets up the button link on static and non-static image caption shortcodes.
 *
 * @since 0.1.0
 * @param wp_post $post current post object.
 * @uses get_post_meta()
 * @return string void text for button.
 */
function set_button_link( $post ) {
	return get_post_meta( $post->ID, 'button_link', true );
}

/**
 * Sets up the button downloadable on static and non-static image caption shortcodes.
 *
 * @since 0.1.0
 * @param wp_post $post current post object.
 * @uses get_post_meta()
 * @return string void text for button.
 */
function set_button_downloadable( $post ) {
	return get_post_meta( $post->ID, 'button_downloadable', true ) == 'on' ? true : false;
}

/**
 * Sets the header text for the shortcode.
 *
 * @since 0.1.0
 * @param wp_post $post current post object
 * @uses get_post_meta()
 * @return string void text for header.
 */
function set_header_text( $post ) {
	if ( $post->post_type === 'page' ) {
		$header_text = get_post_meta( $post->ID, 'alt_title', true ) ? get_post_meta( $post->ID, 'alt_title', true ) : $post->post_title;
	} else if ( $post->post_type === 'project' ) {
		$header_text = get_post_meta( $post->ID, 'shorthand_header', true ) ? get_post_meta( $post->ID, 'shorthand_header', true ) : $post->post_title;
	}

	return $header_text;
}

/**
 * Sets the sub-header text for the shortcode depending on the post type of the post.
 *
 * @since 0.1.0
 * @param wp_post $post current post object
 * @uses get_post_meta(), date_format(), date_create()
 * @return string $sub_header text for sub header.
 */
function set_sub_header_text( $post ) {
	if ( $post->post_type === 'page' ) {
		$sub_header = get_post_meta( $post->ID, 'sub_header', true );
	} else if ( $post->post_type === 'post' ) {
		$sub_header = date_format( date_create( $post->post_date ), 'F jS, Y' );
	} else {

		# For 'projects' get the category name.
		$category = reset( get_the_category( $post->ID ) );
		$sub_header = $category->name;
	}

	return $sub_header;
}
