<?php
/**
 * Template for the featured image with an overlay.
 *
 * @package VincentRagosta 2016
 * @since   0.1.0
 * @uses    get_template_part(), esc_html(), get_the_parmalink()
 */

if ( $post->post_type === 'page' ) :
	$class      = 'aspect-ratio-10x4';
	$sub_header = 'sub-header';
elseif ( $post->post_type === 'post' ) :
	$class      = 'aspect-ratio-1x1';
	$sub_header = 'date';
else :
	$class      = 'aspect-ratio-1x1';
	$sub_header = 'taxonomy';
endif;

?>

<figure class="featured-image <?php echo $class; ?>">

	<!-- Overlay container -->
	<div class="overlay col-flex-center not-visible">

		<!-- Sub-header -->
		<?php get_template_part( 'partials/aside', $sub_header ); ?>

		<!-- Header -->
		<?php get_template_part( 'partials/aside', 'header' ); ?>

		<!-- Permalink button -->
		<a href="<?php echo get_the_permalink( $post->ID ); ?>">View <?php echo esc_html( $post->post_type ); ?></a>

	</div>

	<!-- Post image -->
	<div class="post-type normalize-image" style="background-image: url( '<?php echo esc_attr( $image ); ?>' );"></div>

</figure>
