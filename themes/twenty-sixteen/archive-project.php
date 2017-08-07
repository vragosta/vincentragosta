<?php
/**
 * Template for displaying the featured projects page.
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since 0.1.0
 */

namespace VincentRagosta;

get_header(); ?>

<main id="projects" class="archive project">

	<?php get_template_part( 'partials/aside', 'excerpt' ); ?>
	<?php get_template_part( 'partials/content', 'archive-project' ); ?>

</main>

<?php get_footer(); ?>
