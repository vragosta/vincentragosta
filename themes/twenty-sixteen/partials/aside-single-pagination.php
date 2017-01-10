<?php
/**
 * Template to display pagination controls.
 *
 * @package VincentRagosta 2016
 * @since   0.1.0
 * @uses    previous_post_link(), next_post_link()
 */
?>

<aside id="pagination-controls">
	<div class="col-xs-4 col-flex-start">
		<?php previous_post_link( '%link', '<i class="icon ion-ios-arrow-left"></i>' ); ?>
	</div>
	<div class="col-xs-4 col-flex-center">
		<a href="<?php echo home_url( '/portfolio/' ); ?>"><i class="icon ion-ios-keypad"></i></a>
	</div>
	<div class="col-xs-4 col-flex-end">
		<?php next_post_link( '%link', '<i class="icon ion-ios-arrow-right"></i>' ); ?>
	</div>
</aside>
