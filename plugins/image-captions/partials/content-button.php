<?php
/**
 * Template to display the button.
 *
 * @package Image Captions - Twenty Sixteen
 * @since 0.1.0
 * @uses get_the_parmalink(), esc_html()
 */
?>

<?php if ( $image_caption->button ) { ?>
	<a href="<?php echo get_the_permalink( $image_caption->ID ); ?>">
		<?php echo esc_html( $image_caption->button ); ?>
	</a>
<?php } ?>
