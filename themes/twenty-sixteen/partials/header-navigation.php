<?php
/**
 * Main header navigation for both desktop and mobile designs.
 *
 * @package VincentRagosta.com 2016
 * @since   0.1.0
 * @uses    vr_get_featured_image(),esc_html(), get_the_title(), get_post_meta(), is_front_page(), get_template_part()
 */

// Get the featured image of the current post.
$image = vincentragosta_com\Twenty_Sixteen\Helpers\vr_get_featured_image( $post->ID );

// Get the title of the current post.
$title = esc_html( get_the_title() );

// Get the 'sub_header' of the current post.
$sub_header = get_post_meta( $post->ID, 'sub_header', true ); ?>

<header id="header" <?php echo ( is_front_page() ) ? 'class="aspect-ratio-10x4"' : ''; ?>>
  <main class="normalize-image" style="background: linear-gradient( rgba( 0, 0, 0, 0.6 ), rgba( 0, 0, 0, 0.6 ) ) , url( '<?php echo $image ?>' ) no-repeat center / cover;">
    <nav class="nav-container full-width">

      <!-- Menu -->
      <section class="menu-container">
        <?php get_template_part( 'partials/section', 'menu' ); ?>
      </section>

      <!-- Drop down toggle -->
      <i class="ion ion-navicon drop-down"></i>
    </nav>

    <section class="heading-container col-flex-center">

      <!-- Sub Heading -->
      <?php get_template_part( 'partials/aside', 'sub-header' ); ?>

      <!-- Heading -->
      <?php get_template_part( 'partials/aside', 'header' ); ?>

    </section>

  </main>
</header>
