<?php
/**
 * Template to display the sub-header above the header.
 *
 * @package Image Captions - Twenty Sixteen
 * @since 0.1.0
 * @uses esc_html()
 */
?>

<?php if ( $image_caption->sub_header ) { ?>
	<h4 class="sub-header unloaded padding-left-right">
		<?php echo esc_html( $image_caption->sub_header ); ?>
	</h4>
<?php } ?>
