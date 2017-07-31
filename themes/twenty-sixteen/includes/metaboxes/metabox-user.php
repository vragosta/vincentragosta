<?php

/**
 * Create user meta fields for each user record.
 *
 * @since  0.1.0
 * @param  array $fields Existing fields array.
 * @return array $fields Existing fields array with new social fields.
 */
function vincentragosta_user_fields( $fields ) {
	$fields['facebook']  = 'Facebook';
	$fields['twitter']   = 'Twitter';
	$fields['instagram'] = 'Instagram';
	$fields['personal']  = 'Personal';
	$fields['github']    = 'Github';
	$fields['phone']     = 'Phone Number';

	return $fields;
}
add_filter( 'user_contactmethods', 'vincentragosta_user_fields' );


/**
 * Save additional profile fields.
 *
 * @since  0.1.0
 * @param  int $user_id Current user ID.
 * @uses   current_user_can(), sanitize_text_field(), update_post_meta()
 * @return void
 */
function vincentragosta_save_user_fields( $user_id ) {

	// Check the user's permissions.
	if ( ! current_user_can( 'edit_user', $user_id ) )
		return false;

	// Sanitize user input.
	$facebook  = sanitize_text_field( $_POST['facebook'] );
	$twitter   = sanitize_text_field( $_POST['twitter'] );
	$instagram = sanitize_text_field( $_POST['instagram'] );
	$personal  = sanitize_text_field( $_POST['personal'] );
	$github    = sanitize_text_field( $_POST['github'] );
	$phone     = sanitize_text_field( $_POST['phone'] );

	update_usermeta( $user_id, 'facebook', $_POST['facebook'] );
	update_usermeta( $user_id, 'twitter', $_POST['twitter'] );
	update_usermeta( $user_id, 'instagram', $_POST['instagram'] );
	update_usermeta( $user_id, 'personal', $_POST['personal'] );
	update_usermeta( $user_id, 'github', $_POST['github'] );
	update_usermeta( $user_id, 'phone', $_POST['phone'] );
}
add_action( 'personal_options_update', 'vincentragosta_save_user_fields' );
add_action( 'edit_user_profile_update', 'vincentragosta_save_user_fields' );

?>
