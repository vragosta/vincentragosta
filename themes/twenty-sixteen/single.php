<?php get_header(); ?>

<?php get_template_part( 'partials/aside', 'pagination' ); ?>

<?php get_template_part( 'partials/main', 'single-' . get_post_type() ); ?>

<?php get_template_part( 'partials/aside', 'pagination' ); ?>

<?php get_footer(); ?>
