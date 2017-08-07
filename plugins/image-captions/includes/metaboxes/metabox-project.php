<?php

namespace ImageCaptions\MetaBoxes;

class ProjectMetabox {

	/**
	 * Registers metabox with WordPress.
	 *
	 * @since 0.1.0
	 * @uses add_action()
	 * @return void
	 */
	function register() {
		add_action( 'add_meta_boxes', array( $this, 'image_captions_project_metaboxes' ) );
		add_action( 'save_post', array( $this, 'image_captions_project_save_data' ) );
	}

	/**
	 * Create configuration metabox for 'project' custom post type.
	 *
	 * @since  0.1.0
	 * @uses   add_meta_box()
	 * @return void
	 */
	function image_captions_project_metaboxes() {
		add_meta_box(
			'image-captions-settings',
			__( 'Image Caption Settings', 'vincentragosta' ),
			array( $this, 'image_captions_project_callback' ),
			'project'
		);
	}

	/**
	 * The callback for add_meta_box(), contains the HTML necessary to create the metaboxes.
	 *
	 * @since 0.1.0
	 * @uses wp_nonce_field(), get_post_meta(), __(), esc_textarea()
	 * @return void
	 */
	function image_captions_project_callback( $post ) {
		# Add a nonce field so we can check for it later.
		wp_nonce_field( 'image_captions_project_save_data', 'image_captions_nonce' );

		/**
		 * Use get_post_meta() to retrieve an existing value
		 * from the database and use the value for the form.
		 */
		$_shorthand_header = get_post_meta( $post->ID, '_shorthand_header', true );
		$_sub_header = get_post_meta( $post->ID, '_sub_header', true ); ?>

		<table style="width: 100%;">
			<tr>
				<td class="label">
					<label for="_shorthand_header"><?php echo __( 'Shorthand Header:', 'vincentragosta' ); ?></label>
				</td>
				<td>
					<textarea id="_shorthand_header" name="_shorthand_header" style="width: 100%;"><?php echo esc_textarea( $_shorthand_header ); ?></textarea>
				</td>
			</tr>
			<tr>
				<td class="label">
					<label for="_sub_header"><?php echo __( 'Sub Header:', 'vincentragosta' ); ?></label>
				</td>
				<td>
					<textarea id="_sub_header" name="_sub_header" style="width: 100%;"><?php echo esc_textarea( $_sub_header ); ?></textarea>
				</td>
			</tr>
		</table><?php
	}

	/**
	 * Saves and sanitizes the POST data.
	 *
	 * @since 0.1.0
	 * @uses isset(), wp_verify_nonce(), defined(), current_user_can(),
	 *       sanitize_text_field(), update_post_meta()
	 * @return void
	 */
	function image_captions_project_save_data( $post_id ) {
		/**
		 * We need to verify this came from our screen and with proper authorization,
		 * because the save_post action can be triggered at other times.
		 */
		# Check if our nonce is set.
		if ( ! isset( $_POST['image_captions_nonce'] ) ) {
			return;
		}

		# Verify that the nonce is valid.
		if ( ! wp_verify_nonce( $_POST['image_captions_nonce'], 'image_captions_project_save_data' ) ) {
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
		update_post_meta( $post_id, '_shorthand_header', sanitize_text_field( $_POST['_shorthand_header'] ) );
		update_post_meta( $post_id, '_sub_header', sanitize_text_field( $_POST['_sub_header'] ) );
	}
}

$project_metabox = new ProjectMetabox();
$project_metabox->register();
