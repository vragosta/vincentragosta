<?php
/**
 * Template to display the sub header.
 *
 * @package VincentRagosta 2016
 * @since   0.1.0
 * @uses    get_post_meta(), esc_html()
 */

// Get the 'sub_header' of the current post.
$sub_header = get_post_meta( $post->ID, 'sub_header', true ); ?>

<?php if ( $sub_header ) : ?>
	<span class="sub-header padding-left-right">
		<?php echo esc_html( $sub_header ); ?>
	</span>
<?php endif; ?>
