<?php
/**
 * @package VincentRagosta 2016
 * @since   0.1.0
 */

get_header(); ?>

<main id="portfolio" class="archive project">
	<!-- <section class="sidebar cta a col-flex-center">
		<?php echo $post->post_content; ?>
	</section> -->

	<!-- TODO -->
	<?php get_template_part( 'partials/aside', 'excerpt' ); ?>

	<!-- TODO -->
	<?php get_template_part( 'partials/content', 'archive-project' ); ?>

</main>

<?php get_footer(); ?>
