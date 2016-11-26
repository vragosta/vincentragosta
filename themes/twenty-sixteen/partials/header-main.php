
<?php
/**
 * Main header navigation for both desktop and mobile designs.
 *
 * @package VincentRagosta.com 2016
 * @since 0.1.0
 */

$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'full' )[0]; ?>

<main class="nav-container">
  <section style="background-image: url( '<?php echo $image ?>' );">

    <!-- Navbar -->
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
            <li><span><a href="" class="<?php echo ( is_front_page() ) ? 'active' : ''; ?>">Home</a></span></li>
            <li><span><a href="">Code Shop</a></span></li>
            <li><span><a href="">Portfolio</a></span></li>
            <li><span><a href="">About</a></span></li>
            <li><span><a href="">Resume</a></span></li>
            <li><span><a href="">Blog</a></span></li>
            <li id="contact"><a href="">Contact</a></li>
          </ul>
        </div>
      </div>
    </nav> <!-- .navbar -->

  </section>
</main>
