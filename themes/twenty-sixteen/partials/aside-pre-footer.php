<?php
/**
 * 'Pre Footer' sidebar.
 *
 * @package VincentRagosta.com 2016
 * @since   0.1.0
 * @uses    is_active_sidebar(), dynamic_sidebar()
 */
?>

<?php if ( is_active_sidebar( 'pre-footer' ) ) : ?>
	<aside class="aside pre-footer">
		<?php dynamic_sidebar( 'pre-footer' ); ?>
	</aside>
<?php endif; ?>
