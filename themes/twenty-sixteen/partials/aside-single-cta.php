<?php
/**
 * 'Call To Action ( Single )' sidebar.
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since 0.1.0
 * @uses is_active_sidebar(), dynamic_sidebar()
 */
?>

<?php if ( is_active_sidebar( 'cta-single' ) ) { ?>
	<aside class="aside cta">
		<?php dynamic_sidebar( 'Call To Action ( Single )' ); ?>
	</aside>
<?php } ?>
