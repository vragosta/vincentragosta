<?php
/**
 * Template to display the button.
 *
 * @package Image Captions - Twenty Sixteen
 * @since 0.1.0
 * @uses get_the_parmalink(), esc_html()
 */
?>

<?php if ( $image_caption->button_text ) { ?>
	<?php $button_link = $image_caption->button_link ? esc_url( $image_caption->button_link ) : get_the_permalink( $image_caption->ID ); ?>
	<a href="<?php echo $button_link; ?>" <?php echo $image_caption->button_downloadable ? 'download' : ''; ?>>
		<?php echo esc_html( $image_caption->button_text ); ?>
	</a>
<?php } ?>
