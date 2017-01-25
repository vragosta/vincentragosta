<?php
/**
 * Template to display the sub-header above the header.
 *
 * @package Image Captions - Twenty Sixteen
 * @since   0.1.0
 * @uses    esc_html()
 */
?>

<?php if ( $defaults->sub_header_text ) : ?>
	<aside class="sub-header unloaded padding-left-right">
		<?php echo esc_html( $defaults->sub_header_text ); ?>
	</aside>
<?php endif; ?>
