<?php
/**
 * Template for displaying the portfolio page.
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since   0.1.0
 */

	get_header(); ?>

	<main id="portfolio" class="archive project">

		<!-- TODO -->
		<?php get_template_part( 'partials/aside', 'excerpt' ); ?>

		<!-- TODO -->
		<?php get_template_part( 'partials/content', 'archive-project' ); ?>

	</main>

<?php get_footer(); ?>
