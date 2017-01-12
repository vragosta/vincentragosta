<?php
/**
 * Template to display the post content.
 *
 * @package VincentRagosta 2016
 * @since   0.1.0
 */
?>

<?php if ( $post->post_content ) : ?>
	<aside class="aside content">
		<?php echo $post->post_content; ?>
	</aside>
<?php endif; ?>
