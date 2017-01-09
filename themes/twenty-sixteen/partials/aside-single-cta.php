<?php
/**
 * Call To Action ( Single )
 *
 * @package VincentRagosta.com 2016
 * @since   0.1.0
 */

if ( is_active_sidebar( 'cta-single' ) ) : ?>
	<section class="sidebar cta">
		<?php dynamic_sidebar( 'Call To Action ( Single )' ); ?>
	</section>
<?php endif; ?>
