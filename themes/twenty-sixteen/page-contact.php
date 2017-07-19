<?php
/**
 * Template for displaying the contact page.
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since   0.1.0
 */

	get_header();

	global $post; ?>

	<main id="contact" class="row">
		<div class="col-xs-12 col-sm-6" style="padding: 6rem 4rem;">
			<?php echo $post->post_content; ?>
		</div>
		<div class="col-xs-12 col-sm-6">
			Hello
		</div>
	</main>

<?php get_footer(); ?>
