<?php
/**
 * Template for displaying the single page.
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since   0.1.0
 * @uses    get_template_part()
 */

	get_header();

	// TODO
	get_template_part( 'partials/aside', 'single-pagination' );

	// TODO
	get_template_part( 'partials/content', 'single-' . get_post_type() );

	// TODO
	get_template_part( 'partials/aside', 'single-pagination' );

	get_footer();

?>
