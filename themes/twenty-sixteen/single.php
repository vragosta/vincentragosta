<?php
/**
 * Template for displaying the single page.
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since   0.1.0
 * @uses    get_template_part()
 */

	get_header();
	
	get_template_part( 'partials/content', 'single-' . get_post_type() );

	get_footer();

?>
