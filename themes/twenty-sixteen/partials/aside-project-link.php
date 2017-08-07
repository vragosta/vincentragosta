<?php
/**
 * Template to display the project link.
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since 0.1.0
 */

$link = get_post_meta( $post->ID, '_project_link', true );
$link_text = get_post_meta( $post->ID, '_project_text', true ); ?>

<?php if ( $link && $link_text ) { ?>
	<aside class="aside link">
		<a href="<?php echo esc_url( $link ); ?>" target="_blank">
			<?php echo esc_html( $link_text ); ?>
		</a>
	</aside>
<?php } ?>
