<?php
/**
 * @package VincentRagosta 2016
 * @since   0.1.0
 */

$title = ( get_post_meta( $post->ID, 'shorthand_title', true ) ) ? get_post_meta( $post->ID, 'shorthand_title', true ) : $post->post_title;
$image = vincentragosta_com\Twenty_Sixteen\Helpers\vr_get_featured_image( $post->ID ); ?>

<div class="grid-item col-xs-12 col-sm-4">
	<div class="featured-image aspect-ratio-1x1">
		<div class="overlay flex-center not-visible">
			<span class="sub-title padding-left-right">Wordpress Site</span>
			<span class="title padding-left-right"><?php echo esc_html( $title ); ?></span>
			<a href="<?php echo get_the_permalink( $post->ID ); ?>">View <?php echo esc_html( $post->post_type ); ?></a>
		</div>
		<div class="post-type normalize-image" style="background-image: url( '<?php echo esc_attr( $image ); ?>' );"></div>
	</div>
</div>
