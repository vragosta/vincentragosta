<?php
/**
 * Plugin Name: Clean Metadata
 * Description: This cron job will clean up all metadata that is not prefaced with an underscore.
 * Author: Vincent Ragosta
 * Version: 1.1.0
 * Author URI: http://www.vincentragosta.com
 */

/**
 * Schedules the cron job.
 *
 * @since  1.0.0
 * @param  array $schedules
 * @return array $schedules
 */
function clean_metadata_schedules( $schedules ) {
	$schedules['fifteen_minutes'] = array(
		'interval' => 900,
		'display'  => 'Once Every 15 Minutes',
	);

	return $schedules;
}
add_filter( 'cron_schedules', 'clean_metadata_schedules', 10, 1 );

/**
 * Activate the cron job.
 *
 * @since  1.0.0
 * @uses   wp_next_scheduled(), wp_schedule_event()
 * @return void
 */
function clean_metadata_activate() {
	if ( ! wp_next_scheduled( 'clean_metadata' ) ) {
		wp_schedule_event( time(), 'fifteen_minutes', 'clean_metadata' );
	}
}
register_activation_hook( __FILE__, 'clean_metadata_activate' );

/**
 * Deactivate the cron job.
 *
 * @since  1.0.0
 * @uses   wp_unschedule_event(), wp_next_scheduled()
 * @return void
 */
function clean_metadata_deactivate() {
	wp_unschedule_event( wp_next_scheduled( 'clean_metadata' ), 'clean_metadata' );
}
register_deactivation_hook( __FILE__, 'clean_metadata_deactivate' );

/**
 * Delete all meta that is not prefaced by an underscore.
 *
 * @since  1.0.0
 * @uses   include()
 * @return void
 */
function clean_metadata() {

	# Project meta
	delete_post_meta_by_key( 'project_link' );
	delete_post_meta_by_key( 'project_text' );
	delete_post_meta_by_key( 'shorthand_header' );
	delete_post_meta_by_key( 'sub_header' );
	delete_post_meta_by_key( 'technology' );
	delete_post_meta_by_key( 'testimony' );

	# Page meta
	delete_post_meta_by_key( 'alt_title' );
	delete_post_meta_by_key( 'button_downloadable' );
	delete_post_meta_by_key( 'button_link' );
	delete_post_meta_by_key( 'button_text' );

}
add_action( 'clean_metadata', 'clean_metadata' );
