<?php
/**
 * Vincent Ragosta - Twenty Sixteen essential functions.
 * This file contains functions that do not require an action hook.
 *
 * @package VincentRagosta - Twenty Sixteen
 * @since   0.1.0
 */

namespace vincentragosta_com\Twenty_Sixteen\Helpers;

/**
 * Returns featured image of a post or custom post type.
 *
 * @since  0.1.0
 * @param  int    $id ID of the WP_Post Object.
 * @return string     URL of attached image.
 */
function vr_get_featured_image( $id ) {
	return wp_get_attachment_image_src( get_post_thumbnail_id( $id ), VINCENTRAGOSTA_COM_IMAGE_SIZE )[0];
}
?>
