<?php
/**
 * 'Pre Footer' sidebar.
 *
 * @package VincentRagosta.com 2016
 * @since   0.1.0
 * @uses    is_active_sidebar(), dynamic_sidebar()
 */

if ( is_active_sidebar( 'pre-footer' ) ) : ?>
	<section class="sidebar pre-footer">
		<?php dynamic_sidebar( 'pre-footer' ); ?>
	</section>
<?php endif; ?>
