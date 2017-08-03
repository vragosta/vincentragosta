<?php
/**
 * Template to display pagination controls.
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since   0.1.0
 * @uses    previous_post_link(), next_post_link()
 */

$prev = get_previous_post_link( '%link' );
?>

<?php // if ( $prev ) { ?>
<?php if ( get_previous_post_link( '%link' ) ) { ?>
	<aside id="pagination-single" class="aside">
			<p>
				<span>Next Project:</span>
				<?php previous_post_link( '%link' ); ?>
			</p>
	</aside>
<?php } ?>
