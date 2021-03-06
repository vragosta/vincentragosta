<?php
/**
 * Template for the menu.
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since 0.1.0
 * @uses home_url()
 */
?>

<section class="menu unloaded">
	<a href="<?php echo home_url(); ?>">Home</a>
	<a href="<?php echo home_url( '/projects/' ); ?>">Projects</a>
	<a href="<?php echo home_url( '/about/' ); ?>">About</a>
	<a href="<?php echo home_url( '/resume/' ) ?>">Resume</a>
	<a id="contact" href="<?php echo home_url( '/contact/' ); ?>">Contact</a>
</section>
