<?php
/**
 * Template for the menu.
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since   0.1.0
 * @uses    home_url()
 */
?>

<section class="menu row-flex-center unloaded">
	<a href="<?php echo home_url(); ?>">Home</a>
	<a href="">Code Shop</a>
	<a href="<?php echo home_url( '/portfolio/' ); ?>">Portfolio</a>
	<a href="">About</a>
	<a href="">Resume</a>
	<a href="<?php echo home_url( '/blog/' ); ?>">Blog</a>
	<a id="contact" href="">Contact</a>
</section>
