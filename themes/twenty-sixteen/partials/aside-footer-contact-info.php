<?php
/**
 * Template for displaying the contact information in the footer.
 *
 * @package VincentRagosta 2016
 * @since   0.1.0
 */

// Get the 'phone' number.
$phone = get_user_meta( VINCENTRAGOSTA_SITE_ADMIN, 'phone', true ); ?>

<?php if ( $phone ) : ?>
	<div id="contact-info" class="padding-left-right">
		<h3><span>For more information, call today at </span><a href="tel:<?php echo esc_attr( $phone ); ?>"><?php echo esc_html( $phone ); ?></a></h3>
	</div>
<?php endif; ?>
