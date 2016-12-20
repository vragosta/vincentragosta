<?php
/**
 * Main header navigation for both desktop and mobile designs.
 *
 * @package VincentRagosta.com 2016
 * @since 0.1.0
 */

$image      = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'full' )[0];
$sub_header = esc_html( get_post_meta( $post->ID, 'sub_header', true ) );
$excerpt    = esc_html( get_the_excerpt() ); ?>

<header id="header" class="aspect-ratio-10x4">
  <main class="normalize-image" style="background-image: url( '<?php echo $image ?>' );">
    <nav class="nav-container full-width">

      <!-- Menu -->
      <section class="menu-container visible">
        <div class="menu">
          <a href="">Home</a>
          <a href="">Code Shop</a>
          <a href="">Portfolio</a>
          <a href="">About</a>
          <a href="">Resume</a>
          <a href="">Blog</a>
          <a id="contact" href="">Contact</a>
        </div>
      </section>

      <!-- Drop down toggle -->
      <button type="button" class="drop-down not-visible">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </nav>

    <section class="heading-container flex-center">

      <!-- Sub Heading -->
      <span class="sub-heading">
        <?php echo $sub_header; ?>
      </span>

      <!-- Heading -->
      <h1 class="heading">
        <?php echo $excerpt; ?>
      </h1>
    </section>

  </main>
</header>
