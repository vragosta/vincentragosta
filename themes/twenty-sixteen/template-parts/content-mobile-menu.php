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
	<i class="fa fa-times fa-2x"></i>
	<?php get_partial( 'template-parts/content-menu' ); ?>
	<hr />
	<?php get_partial( 'template-parts/aside-social' ); ?>
</section>
