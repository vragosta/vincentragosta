<?php
/**
 * 'Call To Action E ( Front Page )' sidebar.
 *
 * @package VincentRagosta.com 2016
 * @since   0.1.0
 * @uses    is_active_sidebar(), dynamic_sidebar()
 */
?>

<?php if ( is_active_sidebar( 'cta-front-page-e' ) ) : ?>
	<aside class="aside cta e col-flex-center">
		<?php dynamic_sidebar( 'cta-front-page-e' ); ?>
	</aside>
<?php endif; ?>
