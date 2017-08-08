<?php
/**
 * Vincent Ragosta - Twenty Sixteen essential functions.
 * This file contains functions that requires an action hook.
 *
 * @package VincentRagosta - Twenty Sixteen
 * @since   0.1.0
 */

namespace VincentRagosta\Functions\Essentials;

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

	# Action Hooks
	add_action( 'pre_get_posts', $n( 'update_blog_posts_per_page' ) );
	add_action( 'wp_footer', $n( 'analytics_tracking' ) );
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

/**
 * Enables google analytics tracking, enqueues in footer on every page.
 *
 * @since 0.1.0
 * @return script
 */
function analytics_tracking() { ?>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-104262164-1', 'auto');
		ga('send', 'pageview');
	</script><?php
}
