<?php

namespace VincentRagosta;

# Create a count variable.
$count = 0;

$opts = get_partial_opts();
$projects = $opts['projects'];

get_header(); ?>

<main id="projects" class="archive project">

	<?php if ( $post->post_excerpt ) { ?>
		<aside class="aside excerpt col-flex-center">
			<?php echo $post->post_excerpt; ?>
		</aside>
	<?php } ?>

	<?php if ( $projects->have_posts() ) { ?>
		<section class="aside archive">
			<h2>Wordpress Featured Projects</h2>
			<div class="row grid-container">
				<?php while ( $projects->have_posts() ) { ?>
					<?php $projects->the_post(); ?>

					<?php
						# Start a new row every 4 projects.
						if ( ++$count % 4 === 0 ) { ?>
						</div>
						<div class="full-width grid-container">
					<?php } ?>

					<div class="grid-item col-xs-12 col-sm-4">
						<?php do_shortcode( '[image-caption id="' . $post->ID . '"]' ); ?>
					</div>

				<?php } ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</section>
	<?php } ?>

</main>

<?php get_footer(); ?>
