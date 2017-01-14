<?php
/**
 * Plugin Name: Image Captions
 * Description: Displays post featured image with text overlay.
 * Version: 0.1.0
 * Author: Vincent Ragosta
 * Author URI: http://vincentragosta.com
 * Text Domain: vincentragosta
 *
 * @package VincentRagosta 2016
 * @since   0.1.0
 */

// ADD DEFINES HERE IF NEC

// Include all functions associated with the player shortcode.
// require_once STORYCORPS_PLAYER_PATH . 'functions/core.php';

/**
 * TODO
 *
 * @since  0.1.0
 * @uses   get_post_meta()
 * @return void
 */
function vincentragosta_set_image_defaults() {
	global $post;

	if ( $post->post_type === 'page' ) :
		$featured_image_classes[] = 'aspect-ratio-10x4';
		$featured_image_classes[] = 'image-min-height';
		$visibility_class         = 'visible';
		$partial                  = 'sub-header';
		$sub_header               = get_post_meta( $post->ID, 'sub_header', true );
	elseif ( $post->post_type === 'post' ) :
		$featured_image_classes[] = 'aspect-ratio-1x1';
		$visibility_class         = 'not-visible';
		$partial                  = 'date';
	else :
		$featured_image_classes[] = 'aspect-ratio-1x1';
		$visibility_class         = 'not-visible';
		$partial                  = 'taxonomy';
		$taxonomy                 = 'Wordpress Site'; // Make this dynamic.
	endif;
}

/**
 * TODO
 *
 * @since  0.1.0
 * @uses
 * @param  array  $atts      Contains redefined attributes set on shortcode.
 * @return string $shortcode Contains the necessary HTML required to build player on front-end.
 */
function vincentragosta_image_captions_shortcode( $atts ) {

	$atts = shortcode_atts( array(
		'id'                => '',
		'class'             => ''
	), $atts );

	global $post;

	// If the attribute 'id' is set on the shortcode, set the post object to the post entered.
	if ( $atts['id'] ) { $post = get_post( $atts['id'] ) }

	// Create a classes array from attribute classes ( explode string ).
	$classes = ( $atts['class'] ) ? explode( ' ', $atts['class'] ) : array();

	// TODO
	vincentragosta_set_image_defaults();

	?>

	<figure class="featured-image <?php echo implode( ' ', $featured_image_classes ); ?>">

		<!-- Overlay container -->
		<div class="overlay col-flex-center <?php echo $visibility_class; ?>">

			<!-- Sub-header -->
			<?php get_template_part( 'partials/aside', $partial ); ?>

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

	return $shortcode;

}
add_shortcode( 'audio', 'storycorps_player_shortcode' );
