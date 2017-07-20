<?php
/**
 * Plugin Name: Vincent Ragosta Recent Post Plugin
 * Description: Displays the most recent post at the bottom of every article.
 * Version: 0.1.0
 * Author: Vincent Ragosta
 * Author URI: http://www.vincentragosta.com
 * Text Domain: vincentragosta
 *
 * @package Adweek - Twenty Seventeen
 * @since   0.1.0
 */

// Global plugin defines.
define( 'RECENT_POST_VERSION', '0.1.0' );
define( 'RECENT_POST_URL', plugin_dir_url( __FILE__ ) );
define( 'RECENT_POST_PATH', dirname( __FILE__ ) . '/' );
define( 'RECENT_POST_IMAGE_SIZE', 'large' );

/**
 * Generate recent post for use within theme.
 *
 * @since  0.1.0
 * @param  array $atts contains redefined attributes set on shortcode.
 * @uses
 * @return string $shortcode contains the necessary HTML required to build recent post.
 */
function vincentragosta_recent_post_shortcode( $atts ) {

	$atts = shortcode_atts( array(
		'id'    => '',
		'class' => ''
	), $atts ); ?>

	<main class="row">
		<section class="col-xs-12 col-sm-3">
			Hello
		</section>
		<section class="col-xs-12 col-sm-9">
			Hello
		</section>
	</main>

	<?php
	return $shortcode;

}
add_shortcode( 'vincentragosta-recent-post', 'vincentragosta_recent_post_shortcode' );
