<?php
/**
 * 'Call To Action A ( Front Page )' sidebar.
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since 0.1.0
 * @uses is_active_sidebar(), dynamic_sidebar()
 */
?>

<?php if ( is_active_sidebar( 'cta-front-page-a' ) ) { ?>
	<aside class="aside cta a col-flex-center">
		<?php dynamic_sidebar( 'cta-front-page-a' ); ?>
	</aside>
<?php } ?>
