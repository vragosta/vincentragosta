<?php
/**
 * 'Call To Action A ( About Page )' sidebar.
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since   0.1.0
 * @uses    is_active_sidebar(), dynamic_sidebar()
 */
?>

<?php if ( is_active_sidebar( 'cta-about-page-a' ) ) : ?>
	<aside class="aside cta a about col-flex-center">
		<?php dynamic_sidebar( 'cta-about-page-a' ); ?>
	</aside>
<?php endif; ?>
