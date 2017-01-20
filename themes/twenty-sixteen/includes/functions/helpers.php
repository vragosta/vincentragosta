<?php
/**
 * Vincent Ragosta - Twenty Sixteen essential functions.
 * This file contains functions that do not require an action hook.
 *
 * @package VincentRagosta - Twenty Sixteen
 * @since   0.1.0
 */

namespace vincentragosta_com\Twenty_Sixteen\Helpers;

// /**
//  * Returns featured image of a post or custom post type.
//  *
//  * @since  0.1.0
//  * @param  int    $id ID of the WP_Post Object.
//  * @return string     URL of attached image.
//  */
// function vr_get_featured_image( $id ) {
// 	return wp_get_attachment_image_src( get_post_thumbnail_id( $id ), VINCENTRAGOSTA_COM_IMAGE_SIZE )[0];
// }

/**
 * If the query permits pagination, display pagination controls.
 *
 * @since  0.1.0
 * @param  WP_Query $query Custom query.
 * @return void
 */
function pagination( $query ) {
	$total = $query->max_num_pages;

	// Only bother with the rest if we have more than 1 page.
	if ( $total > 1 )  {

		// Get the current page.
		if ( !$current_page = get_query_var( 'paged' ) ) $current_page = 1;

		echo paginate_links( array(
			'base'     => get_pagenum_link( 1 ) . '%_%',
			'format'   => 'page/%#%/',
			'current'  => $current_page,
			'total'    => $total,
			'mid_size' => 4,
			'type'     => 'plain'
		) );
	}
}

?>
