<?php
/**
 * Template for displaying the footer.
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since 0.1.0
 * @uses get_partial()
 */

namespace VincentRagosta;

	get_partial( 'template-parts/content-mobile-menu' ); ?>

	<footer id="footer">

		<?php if ( is_active_sidebar( 'pre-footer' ) ) { ?>
			<aside class="aside pre-footer">
				<?php dynamic_sidebar( 'pre-footer' ); ?>
			</aside>
		<?php } ?>

		<?php get_partial( 'template-parts/content-menu' ); ?>

		<section>

			<div id="copyright">
				<p>&copy <?php echo date( 'Y' ); ?> Vincent Ragosta. All rights reserved. Brooklyn Web Design and Wordpress Expert</p>
			</div>

			<?php get_partial( 'template-parts/aside-social' ); ?>

		</section>

	</footer>

	<?php wp_footer(); ?>

	</body>
</html>
