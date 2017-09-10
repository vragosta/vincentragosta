<?php
/**
 * Main header navigation for both desktop and mobile designs.
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since 0.1.0
 * @uses get_partial(), do_shortcode()
 */

namespace VincentRagosta;

?>

<header id="header">
	<nav class="nav-container full-width">
		<section class="controls-container">

			<figure itemscope itemtype="http://schema.org/Organization" id="logo" class="unloaded">
				<meta itemprop="logo" content="<?php echo esc_url( VINCENTRAGOSTA_COM_TEMPLATE_URL . '/assets/images/white-logo.png' ); ?>" />
				<a itemprop="url" href="<?php echo home_url(); ?>"></a>
			</figure>

			<div class="menu-container">
				<?php get_partial( 'template-parts/content-menu' ); ?>
			</div>
		</section>

		<i class="ion ion-navicon drop-down"></i>
	</nav>

	<?php
		/**
		 * Need a way to associate archive template with projects page for image and settings.
		 * NOTE: This is done so we dont hardcode the image and settings.
		 */
		if ( is_archive( 'project' ) ) {
			$post = get_page_by_title( 'Projects' );
		}
	?>

	<?php do_shortcode( '[image-caption id="' . $post->ID . '" class="static"]' ); ?>
</header>
