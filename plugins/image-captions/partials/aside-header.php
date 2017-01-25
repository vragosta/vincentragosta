<?php
/**
 * Template to display the title.
 *
 * @package Image Captions - Twenty Sixteen
 * @since   0.1.0
 * @uses    esc_html()
 */
?>

<?php if ( $defaults->header_text ) : ?>
	<h1 class="header unloaded padding-left-right">
		<?php echo esc_html( $defaults->header_text ); ?>
	</h1>
<?php endif; ?>
