<?php
/**
 * Template Name: Portfolio
 *
 * @package VincentRagosta 2016
 * @since   0.1.0
 */

get_header();

$content = $post->post_content;

?>

<main class="portfolio">
	<section class="sidebar cta a flex-center">
		<?php echo $content; ?>
	</section>
</main>

<?php get_footer(); ?>
