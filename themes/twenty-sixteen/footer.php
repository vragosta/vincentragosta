<?php
/**
 * Template for displaying the footer.
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since 0.1.0
 * @uses get_template_part()
 */

	get_template_part( 'partials/content', 'mobile-menu' ); ?>

	<footer id="footer" class="col-flex-center">

		<?php get_template_part( 'partials/aside-pre', 'footer' ); ?>

		<?php get_template_part( 'partials/content', 'menu' ); ?>

		<section>

			<!-- Contact Information -->
			<?php // get_template_part( 'partials/aside', 'footer-contact-info' ); ?>

			<!-- Copyright -->
			<?php get_template_part( 'partials/aside', 'footer-copyright' ); ?>

			<!-- Important Documents -->
			<?php // get_template_part( 'partials/aside', 'footer-docs' ); ?>

			<!-- Social Icons -->
			<?php get_template_part( 'partials/aside', 'social' ); ?>

		</section>

	</footer>

	</body>
</html>
<?php wp_footer(); ?>
