<?php
/**
 * Call To Action A ( Front Page )
 *
 * @package VincentRagosta.com 2016
 * @since   0.1.0
 */

if ( is_active_sidebar( 'cta-front-page-a' ) ) : ?>
	<aside class="sidebar cta a col-flex-center">
		<?php dynamic_sidebar( 'cta-front-page-a' ); ?>
	</aside>
<?php endif; ?>
