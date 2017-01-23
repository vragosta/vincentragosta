<?php

/**
 * Create social media meta fields for each user record.
 *
 * @since  0.1.0
 * @param  array $fields Existing fields array.
 * @return array $fields Existing fields array with new social fields.
 */
function vincentragosta_social_fields( $fields ) {
	$fields['facebook']  = 'Facebook';
	$fields['twitter']   = 'Twitter';
	$fields['instagram'] = 'Instagram';
	$fields['phone']     = 'Phone Number';

	return $fields;
}
add_filter( 'user_contactmethods', 'vincentragosta_social_fields' );


/**
 * Save additional profile fields.
 *
 * @since  0.1.0
 * @param  int $user_id Current user ID.
 * @uses   current_user_can(), sanitize_text_field(), update_post_meta()
 * @return void
 */
function vincentragosta_save_social_fields( $user_id ) {

	// Check the user's permissions.
	if ( ! current_user_can( 'edit_user', $user_id ) ) {
		return false;
	}

	// Sanitize user input.
	$facebook  = sanitize_text_field( $_POST['facebook'] );
	$twitter   = sanitize_text_field( $_POST['twitter'] );
	$instagram = sanitize_text_field( $_POST['instagram'] );
	$phone     = sanitize_text_field( $_POST['phone'] );

	update_usermeta( $user_id, 'facebook', $_POST['facebook'] );
	update_usermeta( $user_id, 'twitter', $_POST['twitter'] );
	update_usermeta( $user_id, 'instagram', $_POST['instagram'] );
	update_usermeta( $user_id, 'phone', $_POST['phone'] );
}
add_action( 'personal_options_update', 'vincentragosta_save_social_fields' );
add_action( 'edit_user_profile_update', 'vincentragosta_save_social_fields' );

?>
