<?php
/**
 * Template part social icons.
 * These icon links lead to VincentRagosta social media pages.
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since   0.1.0
 * @uses    esc_url(), site_url()
 */

# Get 'facebook', 'twitter', 'instagram' from the Site admin/owner.
$facebook = get_user_meta( VINCENTRAGOSTA_SITE_ADMIN, 'facebook', true );
$twitter = get_user_meta( VINCENTRAGOSTA_SITE_ADMIN, 'twitter', true );
$instagram = get_user_meta( VINCENTRAGOSTA_SITE_ADMIN, 'instagram', true );
$github = get_user_meta( VINCENTRAGOSTA_SITE_ADMIN, 'github', true ); ?>

<aside class="social row-flex-center">
	<?php if ( $facebook ) : ?>
		<a href="<?php echo esc_url( $facebook ); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
	<?php endif; ?>

	<?php if ( $twitter ) : ?>
		<a href="<?php echo esc_url( $twitter ); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
	<?php endif; ?>

	<?php if ( $instagram ) : ?>
		<a href="<?php echo esc_url( $instagram ); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
	<?php endif; ?>

	<?php if ( $github ) : ?>
		<a href="<?php echo esc_url( $github ); ?>"><i class="fa fa-github" aria-hidden="true"></i></a>
	<?php endif; ?>

	<a href="<?php echo esc_url( site_url( '/contact' ) ); ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
</aside>
