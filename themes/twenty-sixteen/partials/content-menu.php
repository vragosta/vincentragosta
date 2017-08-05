<?php
/**
 * Template for the menu.
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since 0.1.0
 * @uses home_url()
 */
?>

<section class="menu row-flex-center unloaded">
	<a href="<?php echo home_url(); ?>">Home</a>
	<a href="<?php echo home_url( '/projects/' ); ?>">Projects</a>
	<a href="<?php echo home_url( '/about/' ); ?>">About</a>
	<a href="<?php echo VINCENTRAGOSTA_COM_TEMPLATE_URL . '/assets/Resume.pdf'; ?>" download>Resume</a>
	<a id="contact" href="<?php echo home_url( '/contact/' ); ?>">Contact</a>
</section>
