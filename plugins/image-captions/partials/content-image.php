<?php
/**
 * Template to display the image ( normalized ).
 *
 * @package ImageCaptions 2016
 * @since   0.1.0
 * @uses    esc_attr()
 */
?>

<?php if ( $defaults->image_source ) : ?>
	<div class="post-type normalize-image" style="background-image: url( '<?php echo esc_attr( $defaults->image_source ); ?>' );"></div>
<?php endif; ?>
