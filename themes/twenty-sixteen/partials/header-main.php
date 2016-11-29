
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

<header class="header">
  <main style="background-image: url( '<?php echo $image ?>' );">

    <nav class="nav-container">
      <!-- Menu -->
      <section class="col-xs-offset-4 col-xs-8 col-sm-offset-4 col-sm-8 col-md-offset-5 col-md-7 col-lg-offset-6 col-lg-6">
        <div id="menu">
          <span><a href="" class="<?php echo ( is_front_page() ) ? 'active' : ''; ?>">Home</a></span>
          <span><a href="">Code Shop</a></span>
          <span><a href="">Portfolio</a></span>
          <span><a href="">About</a></span>
          <span><a href="">Resume</a></span>
          <span><a href="">Blog</a></span>
          <span id="contact"><a href="">Contact</a></span>
        </div>
      </section>

      <!-- Mobile Menu -->
      <section id="mobile-menu">
        <div>
          <button type="button" class="drop-down" data-toggle="true">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <button type="button" class="close">
            <i class="fa fa-times" data-toggle="false"></i>
          </button>
        </div>
      </section>
    </nav>

    <section class="heading-container">
      <!-- Sub Heading -->
      <p class="sub-heading">
        <?php echo $sub_header; ?>
      </p>

      <!-- Heading -->
      <p class="heading">
        <?php echo $excerpt; ?>
      </p>
    </section>

  </main>
</header>
