<?php
/**
 * Template for displaying the contact page.
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since 0.1.0
 */

namespace VincentRagosta;

get_header();

?>

<?php if ( is_active_sidebar( 'cta-about-page-a' ) ) { ?>
	<aside class="aside cta a about col-flex-center">
		<?php dynamic_sidebar( 'cta-about-page-a' ); ?>
	</aside>
<?php }; ?>

<?php if ( is_active_sidebar( 'cta-about-page-b' ) ) { ?>
	<aside class="aside cta b about col-flex-center">
		<?php dynamic_sidebar( 'cta-about-page-b' ); ?>
	</aside>
<?php }; ?>

<?php if ( is_active_sidebar( 'cta-about-page-c' ) ) { ?>
	<aside class="aside cta c about col-flex-center">
		<?php dynamic_sidebar( 'cta-about-page-c' ); ?>
	</aside>
<?php } ?>

<?php if ( is_active_sidebar( 'cta-about-page-d' ) ) { ?>
	<aside class="aside cta d about col-flex-center">
		<?php dynamic_sidebar( 'cta-about-page-d' ); ?>
	</aside>
<?php } ?>

<?php if ( is_active_sidebar( 'cta-about-page-f' ) ) { ?>
	<aside class="aside cta f about col-flex-center">
		<?php dynamic_sidebar( 'cta-about-page-f' ); ?>
	</aside>
<?php } ?>

<?php get_footer(); ?>
