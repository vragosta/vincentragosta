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
	<!-- <section class="col-xs-12 col-sm-8"> -->
	<section class="" style="width: 80%;">
		<?php while ( $custom->have_posts() ) : $custom->the_post(); ?>
			<?php $author = get_user_by( 'id', $post->post_author ); ?>
			<?php $image  = vincentragosta_com\Twenty_Sixteen\Helpers\get_featured_image( $post->ID ); ?>
			<article>
				<div class="post-header">
					<h2><?php echo esc_html( $post->post_title ); ?></h2>
					<div class="post-sub-header">
						<span class="post-author"><?php echo esc_html( $author->display_name ); ?></span>
						<span class="post-date"><?php echo esc_html( $post->post_date ); ?></span>
					</div>
				</div>
				<figure>
					<meta></meta>
					<a class="" href="<?php echo get_the_permalink( $post->ID ); ?>" style="background-image: url( <?php echo $image; ?> );"></a>
				</figure>
				<summary>
					<?php echo esc_html( $post->post_excerpt ); ?>
				</summary>
				<p>
					<?php echo esc_html( $post->post_content ); ?>
				</p>
			</article>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>

		<!-- Archive Pagination -->
		<?php include( locate_template( 'partials/aside-archive-pagination.php', false, false ) ); ?>

	</section>

<?php endif; ?>
