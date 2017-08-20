<?php
/**
 * Single Template for project custom post type.
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since 0.1.0
 * @uses get_template_part()
 */
?>

<?php if ( have_posts() ) { ?>
	<?php while( have_posts() ) { ?>
		<?php the_post(); ?>
		<main id="single-project" class="col-flex-center">
			<?php get_template_part( 'partials/aside', 'excerpt' ); ?>
			<?php get_template_part( 'partials/aside', 'project-link' ); ?>
			<?php get_template_part( 'partials/aside', 'testimony' ); ?>
			<?php get_template_part( 'partials/aside', 'technology-used' ); ?>
			<?php get_template_part( 'partials/aside', 'content' ); ?>
			<?php get_template_part( 'partials/aside', 'single-pagination' ); ?>
			<?php // get_template_part( 'partials/aside', 'scroll' ); ?>

			<div class="arrow top">
				<a href="#"><i class="ion ion-ios-arrow-up"></i></a>
			</div>

			<?php edit_post_link( 'Edit This Project' ); ?>
		</main>
		<?php wp_reset_postdata(); ?>
	<?php } ?>
<?php } ?>
