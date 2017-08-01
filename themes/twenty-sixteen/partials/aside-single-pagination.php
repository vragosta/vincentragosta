<?php
/**
 * Template to display pagination controls.
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since   0.1.0
 * @uses    previous_post_link(), next_post_link()
 */
?>

<?php // if ( get_previous_posts_link() ) { ?>
	<aside id="pagination-single" class="aside">
			<p>
				<span>Next Project:</span>
				<?php previous_post_link( '%link' ); ?>
			</p>
	</aside>
<?php // } ?>
