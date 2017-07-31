<?php
/**
 * 'Call To Action D ( About Page )' sidebar.
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since   0.1.0
 * @uses    is_active_sidebar(), dynamic_sidebar()
 */
?>

<?php if ( is_active_sidebar( 'cta-about-page-d' ) ) : ?>
	<aside class="aside cta d about col-flex-center">
		<?php dynamic_sidebar( 'cta-about-page-d' ); ?>
	</aside>
<?php endif; ?>
