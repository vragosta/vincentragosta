<?php
/**
 * Template to display the image ( normalized ).
 *
 * @package Image Captions - Twenty Sixteen
 * @since 0.1.0
 * @uses esc_attr()
 */
?>

<?php if ( $image_caption->image_source ) { ?>
	<figure itemscope itemtype="http://schema.org/CreativeWork">
		<meta itemprop="project-image" content="<?php echo esc_url( $image_caption->image_source ); ?>" />
		<div class="image normalize-image" style="background-image: url( '<?php echo esc_attr( $image_caption->image_source ); ?>' );"></div>
	</figure>
<?php } ?>
