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
 * Plugin code entry point. Singleton instance is used to maintain single
 * instance of the plugin throughout the current lifecycle.
 */
function vincentragosta_autorun() {
	$plugin = \StoryCorps\Plugin::get_instance();
	$plugin->enable();
}

vincentragosta_autorun();
