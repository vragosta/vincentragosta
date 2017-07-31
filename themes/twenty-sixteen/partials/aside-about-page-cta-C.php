<?php
/**
 * 'Call To Action C ( About Page )' sidebar.
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since   0.1.0
 * @uses    is_active_sidebar(), dynamic_sidebar()
 */
?>

<?php if ( is_active_sidebar( 'cta-about-page-c' ) ) : ?>
	<aside class="aside cta c about col-flex-center">
		<?php dynamic_sidebar( 'cta-about-page-c' ); ?>
	</aside>
<?php endif; ?>
