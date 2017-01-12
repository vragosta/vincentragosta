<?php
/**
 * Single Template for project custom post type.
 *
 * @package VincentRagosta 2016
 * @since   0.1.0
 * @uses    get_template_part()
 */
?>

<main id="single-project" class="col-flex-center">

	<hr />

	<!-- Optional Widget Area -->
	<?php get_template_part( 'partials/aside', 'single-cta' ); ?>

	<!-- Optional Excerpt Area -->
	<?php get_template_part( 'partials/aside', 'excerpt' ); ?>

	<!-- Optional Technology Used Area -->
	<?php get_template_part( 'partials/aside', 'single-technology-used' ); ?>

	<hr />

	<!-- Optional Content Area -->
	<?php get_template_part( 'partials/aside', 'content' ); ?>

	<hr />

</main>
