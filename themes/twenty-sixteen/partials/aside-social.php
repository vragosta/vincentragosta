<?php
/**
 * Template part social icons.
 * These icon links lead to VincentRagosta social media pages.
 *
 * @package VincentRagosta.com 2016
 * @since   0.1.0
 * @uses    esc_url(), site_url()
 */
?>

<aside class="social row-flex-center">
	<a href="http://facebook.com/vinny.ragosta"><i class="fa fa-facebook" aria-hidden="true"></i></a>
	<a href="https://twitter.com/VincentRagosta"><i class="fa fa-twitter" aria-hidden="true"></i></a>
	<a href="https://instagram.com/vincentragosta/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
	<a href="<?php echo esc_url( site_url( '/contact' ) ); ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
</aside>
