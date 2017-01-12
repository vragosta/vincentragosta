<?php
/**
 * Template part social icons.
 * These icon links lead to VincentRagosta social media pages.
 *
 * @package VincentRagosta.com 2016
 * @since   0.1.0
 * @uses    esc_url(), site_url()
 */

// Get the site admin/owner ID.
$user_id  = 1;

// Get 'facebook', 'twitter', 'instagram' from the Site admin/owner.
$facebook = get_user_meta( $user_id, 'facebook', true );
$twitter  = get_user_meta( $user_id, 'twitter', true );
$instagram = get_user_meta( $user_id, 'instagram', true ); ?>

<aside class="social row-flex-center">
	<a href="<?php echo esc_url( $facebook ); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
	<a href="<?php echo esc_url( $twitter ); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
	<a href="<?php echo esc_url( $instagram ); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
	<a href="<?php echo esc_url( site_url( '/contact' ) ); ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
</aside>
