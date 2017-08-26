<?php

namespace VincentRagosta;

# Create a count variable.
$count = 0;

$projects = get_projects();

get_header(); ?>

<main id="projects" class="archive project">

	<?php get_partial( 'partials/aside-excerpt' ); ?>

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
