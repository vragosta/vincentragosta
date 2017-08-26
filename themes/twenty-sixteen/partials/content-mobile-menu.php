<?php
/**
 * Template for the mobile menu.
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since 0.1.0
 * @uses get_partial()
 */

namespace VincentRagosta;

?>

<section id="mobile-menu">
	<div class="close-container">
		<button type="button" class="close-menu">
			<i class="fa fa-times fa-2x"></i>
		</button>
	</div>
	<div>
		<?php get_partial( 'partials/content-menu' ); ?>
	</div>
</section>
