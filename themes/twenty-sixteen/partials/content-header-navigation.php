<?php
/**
 * Main header navigation for both desktop and mobile designs.
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since   0.1.0
 * @uses    get_template_part(), do_shortcode()
 */
?>

<header id="header">
  <nav class="nav-container full-width">

    <!-- Menu -->
    <section class="menu-container">
      <?php get_template_part( 'partials/content', 'menu' ); ?>
    </section>

    <!-- Drop down toggle -->
    <i class="ion ion-navicon drop-down"></i>
  </nav>

  <!-- Featured image overlay -->
  <?php do_shortcode( '[image-caption id="' . $post->ID . '" class="static"]' ); ?>
</header>
