<?php
/**
 * Template to display the title.
 *
 * @package Image Captions - Twenty Sixteen
 * @since 0.1.0
 * @uses esc_html()
 */
?>

<?php if ( $image_caption->header ) { ?>
	<h1 class="header unloaded">
		<?php echo esc_html( $image_caption->header ); ?>
	</h1>
<?php } ?>
