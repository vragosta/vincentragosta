<?php
/**
 * Main header navigation for both desktop and mobile designs.
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since 0.1.0
 * @uses get_template_part(), do_shortcode()
 */
?>

<header id="header">
  <nav class="nav-container full-width">

    <!-- Menu -->
    <section class="controls-container">

      <!-- Logo -->
      <figure itemscope itemtype="http://schema.org/Organization" id="logo" class="unloaded">
        <meta itemprop="logo" content="<?php echo esc_url( VINCENTRAGOSTA_COM_TEMPLATE_URL . '/assets/images/white-logo.png' ); ?>" />
        <a itemprop="url" href="<?php echo home_url(); ?>"></a>
      </figure>

      <div class="menu-container">
        <?php get_template_part( 'partials/content', 'menu' ); ?>
      </div>
    </section>

    <!-- Drop down toggle -->
    <i class="ion ion-navicon drop-down"></i>
  </nav>

  <!-- Featured image overlay -->
  <?php do_shortcode( '[image-caption id="' . $post->ID . '" class="static"]' ); ?>
</header>
