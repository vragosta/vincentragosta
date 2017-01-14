<?php
/**
 * Template to display the title.
 *
 * @package VincentRagosta 2016
 * @since   0.1.0
 * @uses    esc_html()
 */

// Get 'shorthand_title' from the current post, otherwise get the title of the current post.
// $title = ( get_post_meta( $post->ID, 'shorthand_title', true ) ) ? get_post_meta( $post->ID, 'shorthand_title', true ) : $post->post_title ?>

<?php if ( $defaults->title ) : ?>
	<h1 class="<?php echo ( $post->post_type === 'page' || is_single() ) ? 'header' : 'title'; ?> padding-left-right">
		<?php echo esc_html( $defaults->title ); ?>
	</h1>
<?php endif; ?>
