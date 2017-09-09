<?php
/**
 * The Project template is responsible for rending a single
 * Project.
 *
 * @package Vincent Ragosta - Twenty Sixteen
 */

namespace VincentRagosta;

$opts = get_partial_opts();
$testimony = $opts['testimony'];
$technology =  $opts['technology'];
$link = $opts['link'];
$text = $opts['text'];

get_header();

if ( have_posts() ) {
	while( have_posts() ) {
		the_post(); ?>

		<main id="single-project" class="col-flex-center">

			<?php get_partial( 'partials/aside-excerpt' ); ?>

			<?php if ( $link && $text ) { ?>
				<aside class="aside link">
					<a href="<?php echo esc_url( $link ); ?>" target="_blank">
						<?php echo esc_html( $text ); ?>
					</a>
				</aside>
			<?php } ?>

			<?php if ( $testimony ) { ?>
				<aside class="aside testimony">
					<p><?php echo $testimony; ?></p>
				</aside>
			<?php } ?>

			<?php if ( $technology ) { ?>
				<aside class="aside technology">
					<h2>Technology Used.</h2>
					<pre><?php echo esc_html( $technology ); ?></pre>
				</aside>
			<?php } ?>

			<?php get_partial( 'partials/aside-content' ); ?>

			<?php if ( get_next_post_link( '%link' ) ) { ?>
				<aside id="pagination-single" class="aside">
					<p>
						<span>Previous Project:</span>
						<?php next_post_link( '%link' ); ?>
					</p>
				</aside>
			<?php } ?>

			<?php if ( get_previous_post_link( '%link' ) ) { ?>
				<aside id="pagination-single" class="aside">
					<p>
						<span>Next Project:</span>
						<?php previous_post_link( '%link' ); ?>
					</p>
				</aside>
			<?php } ?>

			<?php edit_post_link( 'Edit This Project' ); ?>

			<div class="arrow top">
				<a href="#"><i class="ion ion-ios-arrow-up"></i></a>
			</div>

		</main>

		<?php wp_reset_postdata(); ?>
	<?php } ?>
<?php } ?>

<?php get_footer(); ?>
