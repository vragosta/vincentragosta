<?php

namespace VincentRagosta;

/**
 * If the query permits pagination, display pagination controls.
 *
 * @since 0.1.0
 * @param WP_Query $query Custom query.
 * @uses get_query_var(), paginate_links(), get_pagenum_link()
 * @return void
 */
function pagination( $query ) {

	# Get the current page.
	if ( ! $current_page = get_query_var( 'paged' ) ) {
		$current_page = 1;
	}

	echo paginate_links( array(
		'base'     => get_pagenum_link( 1 ) . '%_%',
		'format'   => 'page/%#%/',
		'current'  => $current_page,
		'total'    => $total,
		'mid_size' => 4,
		'type'     => 'plain'
	) );
}

/**
 * Returns featured image of a post or custom post type.
 *
 * @since 0.1.0
 * @param int $id id of the wp_post object.
 * @uses wp_get_attachment_image_src(), get_post_thumbnail_id()
 * @return string void url of attached image.
 */
function get_featured_image( $id ) {
	return wp_get_attachment_image_src( get_post_thumbnail_id( $id ), IMAGE_CAPTIONS_IMAGE_SIZE )[0];
}

/**
 * Truncates the string entered by the count entered.
 * Returns &hellip ( ellipsis ) at the end of the string if count is exceeded.
 *
 * @since 0.1.0
 * @param int $count     character count at which to truncate by.
 * @param string $string string to truncate.
 * @uses str_word_count(), wp_trim_words()
 * @return string void truncated string.
 */
function trim_string_by( $count, $string ) {
	return ( absint( $count ) <= str_word_count( $string ) ) ?
		wp_trim_words( $string, absint( $count ), '&hellip;' ) :
			$string;
}

/**
 * Returns formatted date.
 *
 * @since 0.1.0
 * @param string $date   date value of current post.
 * @param string $format format that the date is going to be converted too.
 * @uses date_format(), date_create()
 * @return string void formatted date.
 */
function format_date( $date, $format ) {
	return date_format( date_create( $date ), $format );
}

?>
