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
		$facebook = get_user_meta( $user->ID, 'facebook', true );
		$twitter = get_user_meta( $user->ID, 'twitter', true );
		$instagram = get_user_meta( $user->ID, 'instagram', true );
		$github = get_user_meta( $user->ID, 'github', true );
		$phone = get_user_meta( $user->ID, 'phone', true ); ?>

		<h2><?php _e( 'Social' ); ?></h2>
		<table class="form-table">
			<tr>
				<th>
					<label for="facebook"><?php _e( 'Facebook URL' ); ?></label>
				</th>
				<td>
					<input name="facebook" value="<?php echo esc_attr( $facebook ); ?>" style="width: 25em" />
				</td>
			</tr>

			<tr>
				<th>
					<label for="twitter"><?php _e( 'Twitter URL' ); ?></label>
				</th>
				<td>
					<input name="twitter" value="<?php echo esc_attr( $twitter ); ?>" style="width: 25em" />
				</td>
			</tr>

			<tr>
				<th>
					<label for="instagram"><?php _e( 'Instagram URL' ); ?></label>
				</th>
				<td>
					<input name="instagram" value="<?php echo esc_attr( $instagram ); ?>" style="width: 25em" />
				</td>
			</tr>

			<tr>
				<th>
					<label for="github"><?php _e( 'Github URL' ); ?></label>
				</th>
				<td>
					<input name="github" value="<?php echo esc_attr( $github ); ?>" style="width: 25em" />
				</td>
			</tr>
		</table>

		<h2><?php _e( 'Miscellaneous' ); ?></h2>
		<table class="form-table">
			<tr>
				<th>
					<label for="phone"><?php _e( 'Phone Number' ); ?></label>
				</th>
				<td>
					<input name="phone" value="<?php echo esc_attr( $phone ); ?>" style="width: 25em" />
				</td>
			</tr>
		</table><?php
	}

	function save_fields( $user_id ) {

		# Check the user's permissions.
		if ( ! current_user_can( 'edit_user', $user_id ) )
			return false;

		update_usermeta( $user_id, 'facebook', sanitize_text_field( $_POST['facebook'] ) );
		update_usermeta( $user_id, 'twitter', sanitize_text_field( $_POST['twitter'] ) );
		update_usermeta( $user_id, 'instagram', sanitize_text_field( $_POST['instagram'] ) );
		update_usermeta( $user_id, 'github', sanitize_text_field( $_POST['github'] ) );
		update_usermeta( $user_id, 'phone', sanitize_text_field( $_POST['phone'] ) );
	}
}

$user_metabox = new UserMetabox();
$user_metabox->register();
