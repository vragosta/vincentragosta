<?php
/**
 * Call To Action E ( Front Page )
 *
 * @package VincentRagosta.com 2016
 * @since   0.1.0
 */

if ( is_active_sidebar( 'cta-front-page-e' ) ) : ?>
	<aside class="sidebar cta e col-flex-center">
		<?php dynamic_sidebar( 'cta-front-page-e' ); ?>
	</aside>
<?php endif; ?>
