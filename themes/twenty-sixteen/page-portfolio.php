<?php
/**
 * @package VincentRagosta 2016
 * @since   0.1.0
 */

use vincentragosta_com\Twenty_Sixteen\Helpers;

get_header();

// TODO
$count = 0;

// TODO
$paged = get_query_var( 'paged' );

// TODO
$args = array(
	'post_type' => 'project',
	'paged'     => $paged
);

// TODO
$projects = new WP_Query( $args ); ?>

<main id="portfolio" class="archive project">
	<section class="sidebar cta a flex-center">
		<?php echo $post->post_content; ?>
	</section>

	<?php if ( $projects->have_posts() ) : ?>
		<section class="sidebar" style="padding-bottom: 0;">
			<h2>Wordpress Projects</h2>
			<div class="full-width flex-center grid-container">
				<?php while ( $projects->have_posts() ) : $projects->the_post(); ?>
					<?php if ( ++$count % 4 === 0 ) : ?>
						</div>
						<div class="full-width flex-center grid-container">
					<?php endif; ?>
					<?php get_template_part( 'partials/content', 'archive-project' ); ?>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</section>
	<?php endif; ?>

	<div id="pagination" class="full-width flex-center">
		<?php vincentragosta_com\Twenty_Sixteen\Helpers\pagination( $projects ); ?>
	</div>

</main>

<?php get_footer(); ?>
