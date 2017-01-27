<?php
/**
 * Archive template for project custom post type.
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since   0.1.0
 * @uses    get_query_var(), get_template_part(), wp_reset_postdata()
 */

// Get the page variable if one is set.
$paged = get_query_var( 'paged' );

// Create the arguements for the query.
$args = array(
	'post_type' => 'post',
	'paged'     => $paged
);

// Initialize the query.
$custom = new WP_Query( $args ); ?>

<?php if ( $custom->have_posts() ) : ?>
	<section class="aside">
		<div class="blog full-width">
			<?php while ( $custom->have_posts() ) : $custom->the_post(); ?>
				<h1><?php echo esc_html( $post->post_title ); ?></h1>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		</div>
	</section>
<?php endif; ?>

<!-- Archive Pagination -->
<?php include( locate_template( 'partials/aside-archive-pagination.php', false, false ) ); ?>
