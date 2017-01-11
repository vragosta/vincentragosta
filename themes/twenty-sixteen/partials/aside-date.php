<?php
/**
 * Template to display the date.
 *
 * @package VincentRagosta 2016
 * @since   0.1.0
 * @uses    esc_html()
 */
?>

<?php if ( $post->post_date ) : ?>
	<span class="sub-header date padding-left-right">
		<?php echo esc_html( date_format( date_create( $post->post_date ), 'jS F Y' ) ); ?>
	</span>
<?php endif; ?>
