<?php
/**
 * Call To Action G ( Front Page )
 *
 * @package VincentRagosta.com 2016
 * @since   0.1.0
 */

if ( is_active_sidebar( 'pre-footer' ) ) : ?>
	<section class="sidebar pre-footer">
		<?php dynamic_sidebar( 'pre-footer' ); ?>
	</section>
<?php endif; ?>
