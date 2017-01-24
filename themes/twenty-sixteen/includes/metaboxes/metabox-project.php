<?php

/**
 * Create 'Configuration' metabox for the project custom post type.
 *
 * @since  0.1.0
 * @uses   add_meta_box()
 * @return void
 */
function vincentragosta_project_metaboxes() {
	add_meta_box(
		'configuration',
		__( 'Configuration', 'vincentragosta' ),
		'vincentragosta_project_callback',
		'project'
	);
}
add_action( 'add_meta_boxes', 'vincentragosta_project_metaboxes' );

/**
 * The callback for add_meta_box(), contains the HTML necessary to create the metaboxes.
 *
 * @since  0.1.0
 * @uses   wp_nonce_field(), wp_editor()
 * @return void
 */
function vincentragosta_project_callback( $post ) {
	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'vincentragosta_project_save_data', 'vincentragosta_nonce' );

	/**
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$shorthand_title = get_post_meta( $post->ID, 'shorthand_title', true );
	$technology      = get_post_meta( $post->ID, 'technology', true ); ?>

	<table style="width: 100%;">
		<tr>
			<td>
				<label for="shorthand_title"><?php echo __( 'Shorthand Title:', 'vincentragosta' ); ?></label>
			</td>
			<td>
				<textarea id="shorthand_title" name="shorthand_title" style="width: 100%;"><?php echo esc_textarea( $shorthand_title ); ?></textarea>
			</td>
		</tr>
		<tr>
			<td>
				<label for="technology"><?php echo __( 'Technology Used:', 'vincentragosta' ); ?></label>
			</td>
			<td>
				<textarea id="technology" name="technology" style="width: 100%;"><?php echo esc_textarea( $technology ); ?></textarea>
			</td>
		</tr>
	</table><?php
}

/**
 * Saves and sanitizes the POST data.
 *
 * @since  0.1.0
 * @uses   wp_verify_nonce(), apply_filters()
 * @return void
 */
function vincentragosta_project_save_data( $post_id ) {
	/**
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */
	// Check if our nonce is set.
	if ( ! isset( $_POST['vincentragosta_nonce'] ) )
		return;

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['vincentragosta_nonce'], 'vincentragosta_project_save_data' ) )
		return;

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return;

	// Check the user's permissions.
	if ( ! current_user_can( 'edit_page', $post_id ) )
		return;

	// Sanitize user input.
	$shorthand_title = sanitize_text_field( $_POST['shorthand_title'] );
	$technology      = sanitize_text_field( $_POST['technology'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, 'shorthand_title', $shorthand_title );
	update_post_meta( $post_id, 'technology', $technology );
}
add_action( 'save_post', 'vincentragosta_project_save_data' );

?>
