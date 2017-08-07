<?php

namespace VincentRagosta\MetaBoxes;

class UserMetaBox {

	function register() {

		# Add fields and properly save meta if current user
		add_action( 'show_user_profile', array( $this, 'add_fields' ) );
		add_action( 'personal_options_update', array( $this, 'save_fields' ) );

		# Add fields and properly save meta if not current user
		add_action( 'edit_user_profile', array( $this, 'add_fields' ) );
		add_action( 'edit_user_profile_update', array( $this, 'save_fields' ) );

	}

	function add_fields( $user ) {

		# Obtain social meta.
		$_facebook = get_user_meta( $user->ID, '_facebook', true );
		$_twitter = get_user_meta( $user->ID, '_twitter', true );
		$_instagram = get_user_meta( $user->ID, '_instagram', true );
		$_github = get_user_meta( $user->ID, '_github', true );
		$_phone = get_user_meta( $user->ID, '_phone', true ); ?>

		<h2><?php _e( 'Social' ); ?></h2>
		<table class="form-table">
			<tr>
				<th>
					<label for="_facebook"><?php _e( 'Facebook URL' ); ?></label>
				</th>
				<td>
					<input name="_facebook" value="<?php echo esc_attr( $_facebook ); ?>" style="width: 25em" />
				</td>
			</tr>

			<tr>
				<th>
					<label for="_twitter"><?php _e( 'Twitter URL' ); ?></label>
				</th>
				<td>
					<input name="_twitter" value="<?php echo esc_attr( $_twitter ); ?>" style="width: 25em" />
				</td>
			</tr>

			<tr>
				<th>
					<label for="_instagram"><?php _e( 'Instagram URL' ); ?></label>
				</th>
				<td>
					<input name="_instagram" value="<?php echo esc_attr( $_instagram ); ?>" style="width: 25em" />
				</td>
			</tr>

			<tr>
				<th>
					<label for="_github"><?php _e( 'Github URL' ); ?></label>
				</th>
				<td>
					<input name="_github" value="<?php echo esc_attr( $_github ); ?>" style="width: 25em" />
				</td>
			</tr>
		</table>

		<h2><?php _e( 'Miscellaneous' ); ?></h2>
		<table class="form-table">
			<tr>
				<th>
					<label for="_phone"><?php _e( 'Phone Number' ); ?></label>
				</th>
				<td>
					<input name="_phone" value="<?php echo esc_attr( $_phone ); ?>" style="width: 25em" />
				</td>
			</tr>
		</table><?php
	}

	function save_fields( $user_id ) {

		# Check the user's permissions.
		if ( ! current_user_can( 'edit_user', $user_id ) ) {
			return false;
		}

		update_usermeta( $user_id, '_facebook', sanitize_text_field( $_POST['_facebook'] ) );
		update_usermeta( $user_id, '_twitter', sanitize_text_field( $_POST['_twitter'] ) );
		update_usermeta( $user_id, '_instagram', sanitize_text_field( $_POST['_instagram'] ) );
		update_usermeta( $user_id, '_github', sanitize_text_field( $_POST['_github'] ) );
		update_usermeta( $user_id, '_phone', sanitize_text_field( $_POST['_phone'] ) );
	}
}

$user_metabox = new UserMetabox();
$user_metabox->register();
