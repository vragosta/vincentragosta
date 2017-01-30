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
	<section>
		<?php while ( $custom->have_posts() ) : $custom->the_post(); ?>

			<!-- TODO -->
			<?php $author  = get_user_by( 'id', $post->post_author ); ?>
			<?php $image   = vincentragosta_com\Twenty_Sixteen\Helpers\get_featured_image( $post->ID ); ?>
			<?php $date    = vincentragosta_com\Twenty_Sixteen\Helpers\format_date( $post->post_date, 'F jS Y' ); ?>
			<?php $content = vincentragosta_com\Twenty_Sixteen\Helpers\trim_string_by( 60, $post->post_content ); ?>

			<!-- TODO -->
			<article class="post">
				<div class="header">
					<h2><?php echo esc_html( $post->post_title ); ?></h2>
					<div class="sub-header">

						<!-- TODO -->
						<?php if ( $author ) : ?>
							<span class="post-author">
								<?php echo esc_html( $author->display_name ); ?>
							</span>
						<?php endif; ?>

						<!-- TODO -->
						<?php if ( $author && $date ) : ?>
							<span id="separator">
								<i class="ion ion-ios-circle-filled"></i>
							</span>
						<?php endif; ?>

						<!-- TODO -->
						<?php if ( $date ) : ?>
							<span class="post-date">
								<?php echo esc_html( $date ); ?>
							</span>
						<?php endif; ?>

					</div>
				</div>

				<!-- TODO -->
				<?php if ( $image ) : ?>
					<figure itemscope itemtype="http://schema.org/CreativeWork">
						<meta itemprop="logo" content="<?php echo esc_attr( $image ); ?>"></meta>
						<a itemprop="url" href="<?php echo get_the_permalink( $post->ID ); ?>" class="image" style="background-image: url( <?php echo esc_attr( $image ); ?> );"></a>
					</figure>
				<?php endif; ?>

				<!-- TODO -->
				<?php if ( $post->post_excerpt ) : ?>
					<summary class="excerpt">
						<?php echo esc_html( $post->post_excerpt ); ?>
					</summary>
				<?php endif; ?>

				<!-- TODO -->
				<?php if ( $content ) : ?>
					<p class="content">
						<?php echo esc_html( $content ); ?>
					</p>
				<?php endif; ?>

			</article>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>

		<!-- Archive Pagination -->
		<?php include( locate_template( 'partials/aside-archive-pagination.php', false, false ) ); ?>

	</section>

<?php endif; ?>
