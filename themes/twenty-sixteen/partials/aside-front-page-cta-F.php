<?php
/**
 * 'Call To Action F ( Front Page )' sidebar.
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since   0.1.0
 * @uses    is_active_sidebar(), dynamic_sidebar()
 */
?>

<?php if ( is_active_sidebar( 'cta-front-page-f' ) ) : ?>
	<aside class="aside cta f col-flex-center">
		<?php dynamic_sidebar( 'cta-front-page-f' ); ?>
	</aside>
<?php endif; ?>
