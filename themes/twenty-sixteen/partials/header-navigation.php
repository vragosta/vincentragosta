<?php
/**
 * Main header navigation for both desktop and mobile designs.
 *
 * @package VincentRagosta.com 2016
 * @since 0.1.0
 */

$image      = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'full' )[0];
$title      = esc_html( get_the_title() );
$sub_header = get_post_meta( $post->ID, 'sub_header', true ); ?>

<header id="header" class="aspect-ratio-10x4">
  <main class="normalize-image" style="background: linear-gradient( rgba( 0, 0, 0, 0.6 ), rgba( 0, 0, 0, 0.6 ) ) , url( '<?php echo $image ?>' ) no-repeat center / cover;">
    <nav class="nav-container full-width">

      <!-- Menu -->
      <section class="menu-container">
        <div class="menu">
          <a href="<?php echo home_url(); ?>">Home</a>
          <a href="">Code Shop</a>
          <a href="<?php echo home_url( 'portfolio' ); ?>">Portfolio</a>
          <a href="">About</a>
          <a href="">Resume</a>
          <a href="">Blog</a>
          <a id="contact" href="">Contact</a>
        </div>
      </section>

      <!-- Drop down toggle -->
      <button type="button" class="drop-down">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </nav>

    <section class="heading-container flex-center">

      <!-- Sub Heading -->
      <span class="sub-heading padding-left-right">
        <?php echo $sub_header; ?>
      </span>

      <!-- Heading -->
      <h1 class="heading padding-left-right">
        <?php echo $title; ?>
      </h1>
    </section>

  </main>
</header>
