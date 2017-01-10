<?php
/**
 * Template to display the title.
 *
 * @package VincentRagosta 2016
 * @since   0.1.0
 * @uses    esc_html()
 */
?>

<?php if ( $post->post_title ) : ?>
	<h1 class="<?php echo ( $post->post_type === 'page' ) ? 'heading' : 'title'; ?> padding-left-right">
		<?php echo esc_html( $post->post_title ); ?>
	</h1>
<?php endif; ?>
