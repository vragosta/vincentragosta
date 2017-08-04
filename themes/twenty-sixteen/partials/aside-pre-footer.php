<?php
/**
 * 'Pre Footer' sidebar.
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since 0.1.0
 * @uses is_active_sidebar(), dynamic_sidebar()
 */
?>

<?php if ( is_active_sidebar( 'pre-footer' ) ) { ?>
	<aside class="aside pre-footer">
		<?php dynamic_sidebar( 'pre-footer' ); ?>
	</aside>
<?php } ?>
