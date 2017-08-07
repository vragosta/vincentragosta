<?php

namespace ImageCaptions\MetaBoxes;

class PageMetabox {

	/**
	 * Registers metabox with WordPress.
	 *
	 * @since 0.1.0
	 * @uses add_action()
	 * @return void
	 */
	function register() {
		add_action( 'add_meta_boxes', array( $this, 'image_captions_page_metaboxes' ) );
		add_action( 'save_post', array( $this, 'image_captions_page_save_data' ) );
	}

	/**
	 * Create configuration metabox for 'page' custom post type.
	 *
	 * @since 0.1.0
	 * @param void
	 * @uses add_meta_box(), __()
	 * @return void
	 */
	function image_captions_page_metaboxes() {
		add_meta_box(
			'image-captions-settings',
			__( 'Image Caption Settings', 'vincentragosta' ),
			array( $this, 'image_captions_page_callback' ),
			'page'
		);
	}

	/**
	 * The callback for add_meta_box(), contains the HTML necessary to create the metaboxes.
	 *
	 * @since 0.1.0
	 * @param wp_post $post current post object.
	 * @uses wp_nonce_field(), get_post_meta(), __(), esc_textarea()
	 * @return void
	 */
	function image_captions_page_callback( $post ) {
		# Add a nonce field so we can check for it later.
		wp_nonce_field( 'image_captions_page_save_data', 'image_captions_nonce' );

		/**
		 * Use get_post_meta() to retrieve an existing value
		 * from the database and use the value for the form.
		 */
		$_alt_title = get_post_meta( $post->ID, '_alt_title', true );
		$_sub_header = get_post_meta( $post->ID, '_sub_header', true );
		$_button_text = get_post_meta( $post->ID, '_button_text', true );
		$_button_link = get_post_meta( $post->ID, '_button_link', true );
		$_button_downloadable = get_post_meta( $post->ID, '_button_downloadable', true ); ?>

		<table style="width: 100%;">
			<tr>
				<td class="label">
					<label for="_alt_title"><?php echo __( 'Alternate Title:', 'vincentragosta' ); ?></label>
				</td>
				<td>
					<textarea id="_alt_title" name="_alt_title" style="width: 100%;"><?php echo esc_textarea( $_alt_title ); ?></textarea>
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
			<tr>
				<td class="label">
					<label for="_button_text"><?php echo __( 'Button Text:', 'vincentragosta' ); ?></label>
				</td>
				<td>
					<textarea id="_button_text" name="_button_text" style="width: 100%;"><?php echo esc_textarea( $_button_text ); ?></textarea>
					<label class="description" for="_button_text"><?php echo __( 'Will only display if the image caption plugin is activated.', 'vincentragosta' ); ?></label>
				</td>
			</tr>
			<tr>
				<td class="label">
					<label for="_button_link"><?php echo __( 'Button Link:', 'vincentragosta' ); ?></label>
				</td>
				<td>
					<textarea id="_button_link" name="_button_link" style="width: 100%;"><?php echo esc_textarea( $_button_link ); ?></textarea>
					<label class="description" for="_button_link"><?php echo __( 'Will only display if the image caption plugin is activated.', 'vincentragosta' ); ?></label>
				</td>
			</tr>
			<tr>
			<td>
				<label for="_button_downloadable"><?php echo esc_html( __( 'Downloadable', 'listen' ) ); ?></label>
			</td>
			<td>
				<input name="_button_downloadable" type="checkbox" <?php echo ( $_button_downloadable == true ) ? 'checked': ''; ?> />
			</td>
		</tr>
		</table><?php
	}

	/**
	 * Saves and sanitizes the POST data.
	 *
	 * @since 0.1.0
	 * @param int $post_id id of the current post object.
	 * @uses isset(), wp_verify_nonce(), defined(), current_user_can(),
	 *       sanitize_text_field(), update_post_meta()
	 * @return void
	 */
	function image_captions_page_save_data( $post_id ) {

		/**
		 * We need to verify this came from our screen and with proper authorization,
		 * because the save_post action can be triggered at other times.
		 */
		# Check if our nonce is set.
		if ( ! isset( $_POST['image_captions_nonce'] ) ) {
			return;
		}

		# Verify that the nonce is valid.
		if ( ! wp_verify_nonce( $_POST['image_captions_nonce'], 'image_captions_page_save_data' ) ) {
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
		update_post_meta( $post_id, '_alt_title', sanitize_text_field( $_POST['_alt_title'] ) );
		update_post_meta( $post_id, '_sub_header', sanitize_text_field( $_POST['_sub_header'] ) );
		update_post_meta( $post_id, '_button_text', sanitize_text_field( $_POST['_button_text'] ) );
		update_post_meta( $post_id, '_button_link', sanitize_text_field( $_POST['_button_link'] ) );
		update_post_meta( $post_id, '_button_downloadable', sanitize_text_field( $_POST['_button_downloadable'] ) );
	}
}

$page_metabox = new PageMetabox();
$page_metabox->register();
