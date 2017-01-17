<?php
/**
 * Template to display the button.
 *
 * @package VincentRagosta 2016
 * @since   0.1.0
 * @uses    get_the_parmalink(), esc_html()
 */
?>

<?php if ( $defaults->button_text && ! is_single() ) : ?>
	<a href="<?php echo get_the_permalink( $post->ID ); ?>"><?php echo esc_html( $defaults->button_text ); ?></a>
<?php endif; ?>
