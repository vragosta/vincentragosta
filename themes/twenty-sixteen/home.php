<?php
/**
 * Archive template for the blog.
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since   0.1.0
 * @uses    get_query_var(), get_template_part(), wp_reset_postdata()
 */

	get_header(); ?>

	<main id="blog" class="row-flex-center">

		<!-- TODO -->
		<?php get_template_part( 'partials/content', 'blog' ); ?>

		<!-- TODO -->
		<?php get_template_part( 'partials/aside', 'sidebar' ); ?>

	</main>

<?php get_footer(); ?>
