<?php
/**
 * Archive template for project custom post type.
 *
 * @package VincentRagosta 2016
 * @since   0.1.0
 * @uses    get_query_var(), get_template_part(), wp_reset_postdata(), pagination()
 */

// Create a count variable.
$count = 0;

// Get the page variable if one is set.
$paged = get_query_var( 'paged' );

// Create the arguements for the query.
$args = array(
	'post_type' => 'project',
	'paged'     => $paged
);

// Initialize the query.
$projects = new WP_Query( $args );

if ( $projects->have_posts() ) : ?>
	<section class="sidebar">
		<h2>Wordpress Projects</h2>
		<div class="full-width row-flex-center grid-container">
			<?php while ( $projects->have_posts() ) : $projects->the_post(); ?>

				<!-- Count mod 4 -->
				<?php if ( ++$count % 4 === 0 ) : ?>
					</div>
					<div class="full-width row-flex-center grid-container">
				<?php endif; ?>

				<!-- Grid Item -->
				<?php get_template_part( 'partials/div', 'archive-grid-item' ); ?>

			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		</div>
	</section>
<?php endif; ?>

<!-- TODO -->
<div id="pagination" class="full-width row-flex-center">
	<?php vincentragosta_com\Twenty_Sixteen\Helpers\pagination( $projects ); ?>
</div>
