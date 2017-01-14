<?php
/**
 * Template to each image.
 *
 * @package VincentRagosta 2016
 * @since   0.1.0
 * @uses    get_post_meta(), vr_get_featured_image(), esc_html(), get_the_parmalink()
 */

// Get the featured-image from the current post.
$image = vincentragosta_com\Twenty_Sixteen\Helpers\vr_get_featured_image( $post->ID ); ?>

<div class="grid-item col-xs-12 col-sm-4">

	<!-- Featured image overlay -->
	<?php // include( locate_template( 'partials/content-featured-image-overlay.php', false, false ) ); ?>
	<?php do_shortcode( '[image-caption id="' . $post->ID . '"]' ); ?>

</div>
