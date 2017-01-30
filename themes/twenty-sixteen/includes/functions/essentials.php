<?php
/**
 * Vincent Ragosta - Twenty Sixteen essential functions.
 * This file contains functions that requires an action hook.
 *
 * @package VincentRagosta - Twenty Sixteen
 * @since   0.1.0
 */

namespace vincentragosta_com\Twenty_Sixteen\Essentials;

/**
 * Register supported WordPress features.
 *
 * @since  0.1.0
 * @uses   add_action()
 * @return void
 */
function setup() {
	$n = function( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	// Action Hooks
	add_action( 'pre_get_posts', $n( 'update_blog_posts_per_page' ) );
}

/**
 * Change the blog query 'posts_per_page' to 5.
 *
 * @since  0.1.0
 * @param  wp_query $query current blog query.
 * @uses   is_admin(), is_home()
 * @return void
 */
function update_blog_posts_per_page( $query ) {
	if ( ! is_admin() && is_home() ) {
		$query->set( 'posts_per_page', 5 );
	}
}

?>
