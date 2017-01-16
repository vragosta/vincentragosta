<?php
/**
 * Main header navigation for both desktop and mobile designs.
 *
 * @package VincentRagosta.com 2016
 * @since   0.1.0
 * @uses    vr_get_featured_image(),esc_html(), get_the_title(), get_post_meta(), is_front_page(), get_template_part()
 */
?>

<header id="header">
  <main>
    <nav class="nav-container full-width">

      <!-- Menu -->
      <section class="menu-container">
        <?php get_template_part( 'partials/section', 'menu' ); ?>
      </section>

      <!-- Drop down toggle -->
      <i class="ion ion-navicon drop-down"></i>
    </nav>

    <!-- Featured image overlay -->
    <?php do_shortcode( '[image-caption id="' . $post->ID . '"]' ); ?>

  </main>
</header>
