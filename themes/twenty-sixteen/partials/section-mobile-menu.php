<?php
/**
 * Template for the mobile menu.
 * NOTE: Calls section-menu.
 *
 * @package VincentRagosta 2016
 * @since   0.1.0
 * @uses    get_template_part()
 */
?>

<section id="mobile-menu" class="not-visible">
	<div class="close-container">
		<button type="button" class="close-menu">
			<i class="fa fa-times fa-2x"></i>
		</button>
	</div>
	<div>

		<!-- Menu -->
		<?php get_template_part( 'partials/section', 'menu' ); ?>
		
	</div>
</section>
