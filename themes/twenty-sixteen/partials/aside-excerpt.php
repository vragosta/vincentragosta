<?php
/**
 * Template to display the post excerpt.
 *
 * @package VincentRagosta 2016
 * @since   0.1.0
 */
?>

<?php if ( $post->post_excerpt ) : ?>
	<aside class="aside excerpt col-flex-center">
		<?php echo $post->post_excerpt; ?>
	</aside>
<?php endif; ?>
