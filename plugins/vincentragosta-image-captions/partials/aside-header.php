<?php
/**
 * Template to display the title.
 *
 * @package VincentRagosta 2016
 * @since   0.1.0
 * @uses    esc_html(), esc_attr()
 */
?>

<?php if ( $defaults->header_text ) : ?>
	<h1 class="header <?php echo esc_attr( $defaults->header_class ); ?> padding-left-right">
		<?php echo esc_html( $defaults->header_text ); ?>
	</h1>
<?php endif; ?>
