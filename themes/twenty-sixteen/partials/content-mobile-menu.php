<?php
/**
 * Template for the mobile menu.
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since   0.1.0
 * @uses    get_template_part()
 */
?>

<section id="mobile-menu">
	<div class="close-container">
		<button type="button" class="close-menu">
			<i class="fa fa-times fa-2x"></i>
		</button>
	</div>
	<div>

		<!-- Menu -->
		<?php get_template_part( 'partials/content', 'menu' ); ?>

	</div>
</section>
