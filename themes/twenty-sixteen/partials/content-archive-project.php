<?php
/**
 * Archive template for project custom post type.
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since 0.1.0
 * @uses get_query_var(), do_shortcode(), wp_reset_postdata()
 */

# Create a count variable.
$count = 0;

# Get the page variable if one is set.
$paged = get_query_var( 'paged' );

# Create the arguements for the query.
$args = array(
	'post_type' => 'project',
	'paged'     => $paged
);

# Initialize the query.
$custom = new WP_Query( $args ); ?>

<?php if ( $custom->have_posts() ) { ?>
	<section class="aside">
		<h2>Wordpress Featured Projects</h2>
		<div class="full-width row-flex-center grid-container">
			<?php while ( $custom->have_posts() ) { ?>
				<?php $custom->the_post(); ?>

				<!-- Count mod 4 -->
				<?php if ( ++$count % 4 === 0 ) { ?>
					</div>
					<div class="full-width row-flex-center grid-container">
				<?php } ?>

				<!-- Grid Item -->
				<div class="grid-item col-xs-12 col-sm-4">

					<!-- Featured image overlay -->
					<?php do_shortcode( '[image-caption id="' . $post->ID . '"]' ); ?>

				</div>

			<?php } ?>
			<?php wp_reset_postdata(); ?>
		</div>
	</section>
<?php } ?>

<!-- Archive Pagination -->
<?php include( locate_template( 'partials/aside-archive-pagination.php', false, false ) ); ?>
