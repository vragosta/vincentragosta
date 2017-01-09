<main class="single-project col-flex-center" style="max-width: 1000px; margin: 0 auto; padding: 0 4rem;">

	<?php get_template_part( 'partials/aside', 'single-cta' ); ?>

	<?php get_template_part( 'partials/aside', 'single-technology-used' ); ?>

	<section>
		<?php echo $post->post_content; ?>
	</section>
</main>
