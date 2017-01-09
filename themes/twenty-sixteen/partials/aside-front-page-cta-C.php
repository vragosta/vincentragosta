<?php
/**
 * Call To Action C ( Front Page )
 *
 * @package VincentRagosta.com 2016
 * @since   0.1.0
 */

if ( is_active_sidebar( 'cta-front-page-c' ) ) : ?>
	<aside class="sidebar cta c col-flex-center">
		<?php dynamic_sidebar( 'cta-front-page-c' ); ?>
	</aside>
<?php endif; ?>
