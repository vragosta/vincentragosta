<?php
/**
 * Archive template for the blog.
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since 0.1.0
 * @uses get_query_var(), get_template_part(), wp_reset_postdata()
 */

namespace VincentRagosta;

get_header(); ?>

<main id="blog" class="row-flex-between">

	<?php get_template_part( 'partials/content', 'blog' ); ?>

	<?php get_template_part( 'partials/aside', 'sidebar' ); ?>

</main>

<?php get_footer(); ?>
