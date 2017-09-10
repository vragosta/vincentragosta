<?php
/**
 * Template for displaying the front page.
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since 0.1.0
 * @uses get_partial()
 */

namespace VincentRagosta;

get_header();

?>

<?php if ( is_active_sidebar( 'cta-front-page-a' ) ) { ?>
	<aside class="aside cta a col-flex-center">
		<?php dynamic_sidebar( 'cta-front-page-a' ); ?>
	</aside>
<?php } ?>

<?php if ( is_active_sidebar( 'cta-front-page-b' ) ) { ?>
	<aside class="aside cta b col-flex-center">
		<?php dynamic_sidebar( 'cta-front-page-b' ); ?>
	</aside>
<?php } ?>

<?php if ( is_active_sidebar( 'cta-front-page-c' ) ) { ?>
	<aside class="aside cta c col-flex-center">
		<?php dynamic_sidebar( 'cta-front-page-c' ); ?>
	</aside>
<?php } ?>

<?php if ( is_active_sidebar( 'cta-front-page-d' ) ) { ?>
	<aside class="aside cta d col-flex-center">
		<?php dynamic_sidebar( 'cta-front-page-d' ); ?>
	</aside>
<?php } ?>

<?php if ( is_active_sidebar( 'cta-front-page-e' ) ) { ?>
	<aside class="aside cta e col-flex-center">
		<?php dynamic_sidebar( 'cta-front-page-e' ); ?>
	</aside>
<?php } ?>

<?php if ( is_active_sidebar( 'cta-front-page-f' ) ) { ?>
	<aside class="aside cta f col-flex-center">
		<?php dynamic_sidebar( 'cta-front-page-f' ); ?>
	</aside>
<?php } ?>

<?php get_footer(); ?>
