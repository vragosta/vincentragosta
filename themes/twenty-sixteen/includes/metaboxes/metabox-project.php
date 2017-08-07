<?php

namespace VincentRagosta\MetaBoxes;

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

		# Add a nonce field so we can check for it later.
		wp_nonce_field( 'vincentragosta_project_save_data', 'vincentragosta_nonce' );

		/**
		 * Use get_post_meta() to retrieve an existing value
		 * from the database and use the value for the form.
		 */
		$_technology = get_post_meta( $post->ID, '_technology', true );
		$_testimony = get_post_meta( $post->ID, '_testimony', true );
		$_project_link = get_post_meta( $post->ID, '_project_link', true );
		$_project_text = get_post_meta( $post->ID, '_project_text', true ); ?>

		<table style="width: 100%;">
			<tr>
				<td class="label">
					<label for="_technology"><?php echo __( 'Technology Used:', 'vincentragosta' ); ?></label>
				</td>
				<td>
					<textarea id="_technology" name="_technology" style="width: 100%;"><?php echo esc_textarea( $_technology ); ?></textarea>
				</td>
			</tr>
			<tr>
				<td class="label">
					<label for="_testimony"><?php echo __( 'Testimony:', 'vincentragosta' ); ?></label>
				</td>
				<td>
					<textarea id="_testimony" name="_testimony" style="width: 100%;"><?php echo esc_textarea( $_testimony ); ?></textarea>
				</td>
			</tr>
			<tr>
				<td class="label">
					<label for="_project_link"><?php echo __( 'Project Link:', 'vincentragosta' ); ?></label>
				</td>
				<td>
					<textarea id="_project_link" name="_project_link" style="width: 100%;"><?php echo esc_textarea( $_project_link ); ?></textarea>
				</td>
			</tr>
			<tr>
				<td class="label">
					<label for="_project_text"><?php echo __( 'Project Text:', 'vincentragosta' ); ?></label>
				</td>
				<td>
					<textarea id="_project_text" name="_project_text" style="width: 100%;"><?php echo esc_textarea( $_project_text ); ?></textarea>
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
		# Check if our nonce is set.
		if ( ! isset( $_POST['vincentragosta_nonce'] ) ) {
			return;
		}

		# Verify that the nonce is valid.
		if ( ! wp_verify_nonce( $_POST['vincentragosta_nonce'], 'vincentragosta_project_save_data' ) ) {
			return;
		}

		# If this is an autosave, our form has not been submitted, so we don't want to do anything.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		# Check the user's permissions.
		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

		# Update the meta field in the database.
		update_post_meta( $post_id, '_technology', sanitize_text_field( $_POST['_technology'] ) );
		update_post_meta( $post_id, '_testimony', $_POST['_testimony'] );
		update_post_meta( $post_id, '_project_link', sanitize_text_field( $_POST['_project_link'] ) );
		update_post_meta( $post_id, '_project_text', sanitize_text_field( $_POST['_project_text'] ) );
	}
}

$project_metabox = new ProjectMetabox();
$project_metabox->register();

?>
