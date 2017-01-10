<?php
/**
 * Technology Used ( Single )
 *
 * @package VincentRagosta.com 2016
 * @since   0.1.0
 */

// Get 'technology' from the current post.
$technology = get_post_meta( $post->ID, 'technology', true );

if ( $technology ) : ?>
	<aside class="sidebar technology" style="width: 100%;">
		<h2>Technology Used.</h2>
		<pre style="border: none; margin: 0; text-align: center;"><?php echo esc_html( $technology ); ?></pre>
	</aside>
<?php endif; ?>
