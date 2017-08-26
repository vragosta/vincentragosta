<?php
/**
 * Template for displaying the footer.
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since 0.1.0
 * @uses get_partial()
 */

namespace VincentRagosta;

	get_partial( 'partials/content-mobile-menu' ); ?>

	<footer id="footer" class="col-flex-center">

		<?php if ( is_active_sidebar( 'pre-footer' ) ) { ?>
			<aside class="aside pre-footer">
				<?php dynamic_sidebar( 'pre-footer' ); ?>
			</aside>
		<?php } ?>

		<?php get_partial( 'partials/content-menu' ); ?>

		<section>

			<div id="copyright" class="padding-left-right">
				<p>&copy <?php echo date( 'Y' ); ?> Vincent Ragosta. All rights reserved. Brooklyn Web Design and Wordpress Expert</p>
			</div>

			<?php get_partial( 'partials/aside-social' ); ?>

		</section>

	</footer>

	</body>
</html>
<?php wp_footer(); ?>
