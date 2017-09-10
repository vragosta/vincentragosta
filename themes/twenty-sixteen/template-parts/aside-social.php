<?php
/**
 * Template part social icons.
 * These icon links lead to VincentRagosta social media pages.
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since 0.1.0
 * @uses esc_url(), site_url()
 */

# Get 'facebook', 'twitter', 'instagram' from the Site admin/owner.
$_facebook = get_user_meta( VINCENTRAGOSTA_SITE_ADMIN, '_facebook', true );
$_twitter = get_user_meta( VINCENTRAGOSTA_SITE_ADMIN, '_twitter', true );
$_instagram = get_user_meta( VINCENTRAGOSTA_SITE_ADMIN, '_instagram', true );
$_github = get_user_meta( VINCENTRAGOSTA_SITE_ADMIN, '_github', true ); ?>

<aside class="social row-flex-center">
	<?php if ( $_facebook ) { ?>
		<a href="<?php echo esc_url( $_facebook ); ?>" target="_blank">
			<i class="fa fa-facebook" aria-hidden="true"></i>
		</a>
	<?php } ?>

	<?php if ( $_twitter ) { ?>
		<a href="<?php echo esc_url( $_twitter ); ?>" target="_blank">
			<i class="fa fa-twitter" aria-hidden="true"></i>
		</a>
	<?php } ?>

	<?php if ( $_instagram ) { ?>
		<a href="<?php echo esc_url( $_instagram ); ?>" target="_blank">
			<i class="fa fa-instagram" aria-hidden="true"></i>
		</a>
	<?php } ?>

	<?php if ( $_github ) { ?>
		<a href="<?php echo esc_url( $_github ); ?>" target="_blank">
			<i class="fa fa-github" aria-hidden="true"></i>
		</a>
	<?php } ?>

	<a href="<?php echo esc_url( site_url( '/contact' ) ); ?>">
		<i class="fa fa-envelope-o" aria-hidden="true"></i>
	</a>
</aside>
