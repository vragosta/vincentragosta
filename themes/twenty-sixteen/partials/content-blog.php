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
	<section class="content">
		<?php while ( $custom->have_posts() ) : $custom->the_post(); ?>
			<?php $author  = get_user_by( 'id', $post->post_author ); ?>
			<?php $image   = vincentragosta_com\Twenty_Sixteen\Helpers\get_featured_image( $post->ID ); ?>
			<?php $content = ( 150 <= str_word_count( $post->post_content ) ) ? wp_trim_words( $post->post_content, 150, '&hellip;' ) : $post->post_content; ?>
			<article class="post">
				<div class="header">
					<h2><?php echo esc_html( $post->post_title ); ?></h2>
					<div class="sub-header">
						<span class="post-author">
							<?php echo esc_html( $author->display_name ); ?>
						</span>
						<span id="separator">
							<i class="ion ion-ios-circle-filled"></i>
						</span>
						<span class="post-date">
							<?php echo esc_html( date_format( date_create( $post->post_date ), 'F jS Y' ) ); ?>
						</span>
					</div>
				</div>
				<figure class="featured-image">
					<meta></meta>
					<a href="<?php echo get_the_permalink( $post->ID ); ?>" style="background-image: url( <?php echo esc_attr( $image ); ?> ); background-size: cover; background-position: center; position: absolute; top: 0; bottom: 0; left: 0; right: 0;"></a>
				</figure>
				<div>
					<summary style="font-size: 1.8rem; margin: 1.5rem 0;">
						<?php echo esc_html( $post->post_excerpt ); ?>
					</summary>
					<p style="font-size: 1.8rem; opacity: 0.7;">
						<?php echo esc_html( $content ); ?>
					</p>
				</div>
			</article>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>

		<!-- Archive Pagination -->
		<?php include( locate_template( 'partials/aside-archive-pagination.php', false, false ) ); ?>

	</section>

<?php endif; ?>
