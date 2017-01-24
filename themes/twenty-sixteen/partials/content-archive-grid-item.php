<?php
/**
 * Template to each image.
 *
 * @package VincentRagosta 2016
 * @since   0.1.0
 * @uses    do_shortcode()
 */
?>

<div class="grid-item col-xs-12 col-sm-4">
	<!-- Featured image overlay -->
	<?php do_shortcode( '[image-caption id="' . $post->ID . '"]' ); ?>
</div>
