<?php
/**
 * 'Call To Action F ( Front Page )' sidebar.
 *
 * @package VincentRagosta.com 2016
 * @since   0.1.0
 * @uses    is_active_sidebar(), dynamic_sidebar()
 */

if ( is_active_sidebar( 'cta-front-page-f' ) ) : ?>
	<aside class="sidebar cta f col-flex-center">
		<?php dynamic_sidebar( 'cta-front-page-f' ); ?>
	</aside>
<?php endif; ?>
