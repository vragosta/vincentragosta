<?php
/**
 * Plugin Name: Vincent Ragosta
 * Description: Vincent Ragosta shared plugin
 * Version: 0.1.0
 * Author: Vincent Ragosta
 * Author URI: http://vincentragosta.com
 * Text Domain: vincentragosta_com
 * Domain Path: /languages
 */

require_once( __DIR__ . '/config.php' );

/**
 *
 * Loads the Plugin's PHP autoloader.
 */
function vincentragosta_autoload() {
	if ( vincentragosta_can_autoload() ) {
		require_once( vincentragosta_autoloader() );
		return true;
	} else {
		return false;
	}
}

/**
 * In server mode we can autoload if autoloader file exists. For
 * test environments we prevent autoloading of the plugin to prevent
 * global pollution and for better performance.
 */
function vincentragosta_can_autoload() {
	if ( ! defined( 'PHPUNIT_RUNNER' ) ) {
		if ( file_exists( vincentragosta_autoloader() ) ) {
			return true;
		} else {
			error_log(
				"Fatal Error: Composer not setup in " . VINCENTRAGOSTA_PLUGIN_DIR
			);
			return false;
		}
	} else {
		return false;
	}
}

/**
 * Defaults is Composer's autoloader
 */
function vincentragosta_autoloader() {
	return VINCENTRAGOSTA_PLUGIN_DIR . '/vendor/autoload.php';
}

/**
 * Plugin code entry point. Singleton instance is used to maintain single
 * instance of the plugin throughout the current lifecycle.
 */
function vincentragosta_autorun() {
	if ( vincentragosta_autoload() ) {
		$plugin = \VincentRagosta\Plugin::get_instance();
		$plugin->enable();
		// if ( defined( 'WP_CLI' ) && WP_CLI ) {
		// 	$loader = new \VincentRagosta\Archive\Migration\Commands\Loader();
		// 	$loader->load();
		// 	$loader = new \VincentRagosta\Commands\Loader();
		// 	$loader->load();
		// }
	} else {
		add_action( 'admin_notices', 'vincentragosta_autoload_notice' );
	}
}

function vincentragosta_autoload_notice() {
	$class = 'notice notice-error';
	$message = __( 'Autoload is not setup. Remember to run composer install on both the VincentRagosta plugin and theme', 'vincentragosta_com' );
	printf( '<div class="%1$s"><p>%2$s</p></div>', $class, $message );
}

vincentragosta_autorun();
