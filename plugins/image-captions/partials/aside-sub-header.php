<?php
/**
 * Template to display the sub-header above the header.
 *
 * @package ImageCaptions 2016
 * @since   0.1.0
 */
?>

<?php if ( $defaults->sub_header_text ) : ?>
	<aside class="sub-header <?php echo esc_attr( $defaults->sub_header_class ); ?> padding-left-right">
		<?php echo esc_html( $defaults->sub_header_text ); ?>
	</aside>
<?php endif; ?>
