<?php
/**
 * Template to display the post content.
 *
 * @package VincentRagosta 2016
 * @since   0.1.0
 */

if ( $post->post_content ) : ?>
	<aside class="sidebar content">
		<?php echo $post->post_content; ?>
	</aside>
<?php endif; ?>
