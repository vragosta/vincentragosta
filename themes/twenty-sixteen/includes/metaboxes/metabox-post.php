<?php

/**
 * Create configuration metabox for 'post' custom post type.
 *
 * @since  0.1.0
 * @uses   add_meta_box()
 * @return void
 */
function vincentragosta_post_metaboxes() {
	add_meta_box(
		'configuration',
		__( 'Configuration', 'vincentragosta' ),
		'vincentragosta_post_callback',
		'post'
	);
}
add_action( 'add_meta_boxes', 'vincentragosta_post_metaboxes' );

/**
 * The callback for add_meta_box(), contains the HTML necessary to create the metaboxes.
 *
 * @since  0.1.0
 * @uses   wp_nonce_field(), get_post_meta(), esc_html()
 * @return void
 */
function vincentragosta_post_callback( $post ) {
	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'vincentragosta_post_save_data', 'vincentragosta_nonce' );

	/**
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$sub_header = get_post_meta( $post->ID, 'sub_header', true ); ?>

	<table style="width: 100%;">
		<tr>
			<td>
				<label for="sub_header"><?php echo esc_html( __( 'Sub Header:', 'vincentragosta' ) ); ?></label>
			</td>
			<td>
				<textarea id="sub_header" name="sub_header" style="width: 100%;"><?php echo esc_textarea( $sub_header ); ?></textarea>
			</td>
		</tr>
	</table><?php
}

/**
 * Saves and sanitizes the POST data.
 *
 * @since  0.1.0
 * @uses   isset(), wp_verify_nonce(), apply_filters(), defined(), current_user_can(), sanitize_text_field(), update_post_meta()
 * @return void
 */
function vincentragosta_post_save_data( $post_id ) {
	/**
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */
	// Check if our nonce is set.
	if ( ! isset( $_POST['vincentragosta_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['vincentragosta_nonce'], 'vincentragosta_post_save_data' ) ) {
		return;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'post' == $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	// Sanitize user input.
	$sub_header = sanitize_text_field( $_POST['sub_header'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, 'sub_header', $sub_header );
}
add_action( 'save_post', 'vincentragosta_post_save_data' );

?>
