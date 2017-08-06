<?php
/**
 * Technology Used ( Single )
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since 0.1.0
 * @uses get_post_meta()
 */

# Get 'testimony' from the current post.
$testimony = get_post_meta( $post->ID, 'testimony', true ); ?>

<?php if ( $testimony ) { ?>
	<aside class="aside testimony">
		<p><?php echo $testimony; ?></p>
	</aside>
<?php } ?>
