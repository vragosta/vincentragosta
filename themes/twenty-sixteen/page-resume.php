<?php
/**
 * Template for displaying the resume page.
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since 0.1.0
 */

namespace VincentRagosta;

get_header(); ?>

<main id="resume">

	<div class="container">

		<?php echo $post->post_content; ?>

	</div>

</main>

<?php get_footer(); ?>
