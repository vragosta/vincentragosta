<?php
/**
 * Template Name: Portfolio
 *
 * @package VincentRagosta 2016
 * @since   0.1.0
 */

get_header();

$args = array(
	'post_type' => 'project'
);

$projects = new WP_Query( $args ); ?>

<main id="portfolio">
	<section class="sidebar cta a flex-center">
		<?php echo $post->post_content; ?>
	</section>

	<section>
		<?php if ( $projects->have_posts() ) : ?>
			<?php while ( $projects->have_posts() ) : $projects->the_post(); ?>
				<?php $image = vincentragosta_com\Twenty_Sixteen\Helpers\vr_get_featured_image( $post->ID ); ?>
				<div class="col-xs-12 col-sm-4">
					<div class="featured-image aspect-ratio-1x1">
						<div class="overlay flex-center not-visible">
							<span class="sub-title padding-left-right">Wordpress Site</span>
							<span class="title padding-left-right"><?php echo esc_html( $post->post_title ); ?></span>
						</div>
						<div class="post-type normalize-image" style="background-image: url( '<?php echo esc_attr( $image ); ?>' );"></div>
					</div>
				</div>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		<?php endif; ?>
	</section>
</main>

<?php get_footer(); ?>
