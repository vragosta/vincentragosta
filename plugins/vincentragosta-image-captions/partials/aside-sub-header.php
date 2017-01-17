<?php
/**
 * Template to display the sub-header above the header.
 *
 * @package VincentRagosta 2016
 * @since   0.1.0
 */
?>

<?php if ( $defaults->sub_header ) : ?>
	<aside class="sub-header <?php echo esc_attr( $defaults->sub_header_class ); ?> padding-left-right">
		<?php echo esc_html( $defaults->sub_header ); ?>
	</aside>
<?php endif; ?>
