<?php
/**
 * Template to display the text above the header.
 *
 * @package VincentRagosta 2016
 * @since   0.1.0
 */
?>

<?php if ( $defaults->text ) : ?>
	<aside class="sub-header <?php echo esc_attr( $defaults->text_class ); ?> padding-left-right">
		<?php echo esc_html( $defaults->text ); ?>
	</aside>
<?php endif; ?>
