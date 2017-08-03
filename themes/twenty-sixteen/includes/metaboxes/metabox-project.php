<?php

namespace VincentRagosta\Admin\MetaBoxes;

class ProjectMetabox {

	/**
	 * Registers metabox with WordPress.
	 *
	 * @since  0.1.0
	 * @uses   add_action()
	 * @return void
	 */
	function register() {
		add_action( 'add_meta_boxes', array( $this, 'vincentragosta_project_metaboxes' ) );
		add_action( 'save_post', array( $this, 'vincentragosta_project_save_data' ) );
	}

	/**
	 * Create 'Configuration' metabox for the 'project' custom post type.
	 *
	 * @since  0.1.0
	 * @uses   add_meta_box()
	 * @return void
	 */
	function vincentragosta_project_metaboxes() {
		add_meta_box(
			'configuration',
			__( 'Project Configuration', 'vincentragosta' ),
			array( $this, 'vincentragosta_project_callback' ),
			'project'
		);
	}

	/**
	 * The callback for add_meta_box(), contains the HTML necessary to create the metaboxes.
	 *
	 * @since  0.1.0
	 * @uses   wp_nonce_field(), get_post_meta(), __(), esc_textarea()
	 * @return void
	 */
	function vincentragosta_project_callback( $post ) {

		// Add a nonce field so we can check for it later.
		wp_nonce_field( 'vincentragosta_project_save_data', 'vincentragosta_nonce' );

		/**
		 * Use get_post_meta() to retrieve an existing value
		 * from the database and use the value for the form.
		 */
		$technology = get_post_meta( $post->ID, 'technology', true );
		$testimony = get_post_meta( $post->ID, 'testimony', true );
		$project_link = get_post_meta( $post->ID, 'project_link', true );
		$project_text = get_post_meta( $post->ID, 'project_text', true ); ?>

		<table style="width: 100%;">
			<tr>
				<td class="label">
					<label for="technology"><?php echo __( 'Technology Used:', 'vincentragosta' ); ?></label>
				</td>
				<td>
					<textarea id="technology" name="technology" style="width: 100%;"><?php echo esc_textarea( $technology ); ?></textarea>
				</td>
			</tr>
			<tr>
				<td class="label">
					<label for="testimony"><?php echo __( 'Testimony:', 'vincentragosta' ); ?></label>
				</td>
				<td>
					<textarea id="testimony" name="testimony" style="width: 100%;"><?php echo esc_textarea( $testimony ); ?></textarea>
				</td>
			</tr>
			<tr>
				<td class="label">
					<label for="project_link"><?php echo __( 'Project Link:', 'vincentragosta' ); ?></label>
				</td>
				<td>
					<textarea id="project_link" name="project_link" style="width: 100%;"><?php echo esc_textarea( $project_link ); ?></textarea>
				</td>
			</tr>
			<tr>
				<td class="label">
					<label for="project_text"><?php echo __( 'Project Text:', 'vincentragosta' ); ?></label>
				</td>
				<td>
					<textarea id="project_text" name="project_text" style="width: 100%;"><?php echo esc_textarea( $project_text ); ?></textarea>
				</td>
			</tr>
		</table><?php
	}

	/**
	 * Saves and sanitizes the POST data.
	 *
	 * @since  0.1.0
	 * @uses   isset(), wp_verify_nonce(), defined(), current_user_can(), sanitize_text_field(), update_post_meta()
	 * @return void
	 */
	function vincentragosta_project_save_data( $post_id ) {
		/**
		 * We need to verify this came from our screen and with proper authorization,
		 * because the save_post action can be triggered at other times.
		 */
		// Check if our nonce is set.
		if ( ! isset( $_POST['vincentragosta_nonce'] ) ) {
			return;
		}

		// Verify that the nonce is valid.
		if ( ! wp_verify_nonce( $_POST['vincentragosta_nonce'], 'vincentragosta_project_save_data' ) ) {
			return;
		}

		// If this is an autosave, our form has not been submitted, so we don't want to do anything.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		// Check the user's permissions.
		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

		// Sanitize user input.
		$technology = sanitize_text_field( $_POST['technology'] );
		$testimony = sanitize_text_field( $_POST['testimony'] );
		$project_link = sanitize_text_field( $_POST['project_link'] );
		$project_text = sanitize_text_field( $_POST['project_text'] );

		// Update the meta field in the database.
		update_post_meta( $post_id, 'technology', $technology );
		update_post_meta( $post_id, 'testimony', $testimony );
		update_post_meta( $post_id, 'project_link', $project_link );
		update_post_meta( $post_id, 'project_text', $project_text );
	}
}

$project_metabox = new ProjectMetabox();
$project_metabox->register();

?>
