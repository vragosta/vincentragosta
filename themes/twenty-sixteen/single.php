<?php get_header(); ?>

<?php get_template_part( 'partials/content', 'pagination' ); ?>

<?php get_template_part( 'partials/content', 'single-' . get_post_type() ); ?>

<?php get_footer(); ?>
