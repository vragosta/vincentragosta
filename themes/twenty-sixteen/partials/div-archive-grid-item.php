<?php
/**
 * Template to each image.
 *
 * @package VincentRagosta 2016
 * @since   0.1.0
 * @uses    get_post_meta(), vr_get_featured_image(), esc_html(), get_the_parmalink()
 */

// Get 'shorthand_title' from the current post, otherwise get the title of the current post.
$title = ( get_post_meta( $post->ID, 'shorthand_title', true ) ) ? get_post_meta( $post->ID, 'shorthand_title', true ) : $post->post_title;

// Get the featured-image from the current post.
$image = vincentragosta_com\Twenty_Sixteen\Helpers\vr_get_featured_image( $post->ID ); ?>

<div class="grid-item col-xs-12 col-sm-4">
	<div class="featured-image aspect-ratio-1x1">
		<div class="overlay col-flex-center not-visible">

			<!-- Sub Heading -->
			<?php get_template_part( 'partials/aside', 'taxonomy' ); ?>

			<!-- Header -->
			<?php get_template_part( 'partials/aside', 'title' ); ?>

			<a href="<?php echo get_the_permalink( $post->ID ); ?>">View <?php echo esc_html( $post->post_type ); ?></a>
		</div>
		<div class="post-type normalize-image" style="background-image: url( '<?php echo esc_attr( $image ); ?>' );"></div>
	</div>
</div>
