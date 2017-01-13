<?php
/**
 * Template for the featured image with an overlay.
 *
 * @package VincentRagosta 2016
 * @since   0.1.0
 * @uses    get_template_part(), esc_html(), get_the_parmalink()
 */

if ( $post->post_type === 'page' ) :
	$aspect_ratio_class = 'aspect-ratio-10x4';
	$visibility_class   = 'visible';
	$sub_header         = 'sub-header';
elseif ( $post->post_type === 'post' ) :
	$aspect_ratio_class = 'aspect-ratio-1x1';
	$visibility_class   = 'not-visible';
	$sub_header         = 'date';
else :
	$aspect_ratio_class = 'aspect-ratio-1x1';
	$visibility_class   = 'not-visible';
	$sub_header         = 'taxonomy';
endif;

?>

<figure class="featured-image <?php echo $aspect_ratio_class; ?>">

	<!-- Overlay container -->
	<div class="overlay col-flex-center <?php echo $visibility_class; ?>">

		<!-- Sub-header -->
		<?php get_template_part( 'partials/aside', $sub_header ); ?>

		<!-- Header -->
		<?php get_template_part( 'partials/aside', 'header' ); ?>

		<!-- Permalink button -->
		<?php if ( $post->post_type === 'page' ) : ?>
			<?php if ( $button_text ) { echo '<a href="' . get_the_permalink( $post->ID ) . '">' . esc_html( $button_text ) . '</a>'; } ?>
		<?php else : ?>
			<a href="<?php echo get_the_permalink( $post->ID ); ?>">View <?php echo esc_html( $post->post_type ); ?></a>
		<?php endif; ?>

	</div>

	<!-- Post image -->
	<div class="post-type normalize-image" style="background-image: url( '<?php echo esc_attr( $image ); ?>' );"></div>

</figure>
