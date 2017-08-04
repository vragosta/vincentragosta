<?php
/**
 * Technology Used ( Single )
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since   0.1.0
 * @uses    get_post_meta()
 */

# Get 'technology' from the current post.
$technology = get_post_meta( $post->ID, 'technology', true ); ?>

<?php if ( $technology ) : ?>
	<aside class="aside technology">
		<h2>Technology Used.</h2>
		<pre><?php echo esc_html( $technology ); ?></pre>
	</aside>
<?php endif; ?>
