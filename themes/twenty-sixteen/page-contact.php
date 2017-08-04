<?php
/**
 * Template for displaying the contact page.
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since 0.1.0
 */

	get_header();

	$user = get_user_by( 'email', 'allchenzo@gmail.com' );
	$facebook = get_user_meta( $user->ID, 'facebook', true );
	$twitter = get_user_meta( $user->ID, 'twitter', true );
	$instagram = get_user_meta( $user->ID, 'instagram', true );
	$personal = get_user_meta( $user->ID, 'personal', true );
	$github = get_user_meta( $user->ID, 'github', true );

	global $post; ?>

	<main id="contact-page" class="container">
		<div class="col-xs-12 col-sm-6">
			<?php echo $post->post_content; ?>
			<?php if ( ! empty( $facebook ) || ! empty( $twitter ) || ! empty( $instagram ) || ! empty( $personal ) || ! empty( $github ) ) { ?>
				<div class="social">
					<?php if ( ! empty( $facebook ) ) { ?>
						<a href="<?php echo esc_url( $facebook ); ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
					<?php } ?>
					<?php if ( ! empty( $twitter ) ) { ?>
						<a href="<?php echo esc_url( $twitter ); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
					<?php } ?>
					<?php if ( ! empty( $instagram ) ) { ?>
						<a href="<?php echo esc_url( $instagram ); ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
					<?php } ?>
					<?php if ( ! empty( $personal ) ) { ?>
						<a href="<?php echo esc_url( $personal ); ?>" target="_blank"><i class="fa fa-link" aria-hidden="true"></i></a>
					<?php } ?>
					<?php if ( ! empty( $github ) ) { ?>
						<a href="<?php echo esc_url( $github ); ?>" target="_blank"><i class="fa fa-github" aria-hidden="true"></i></a>
					<?php } ?>
				</div>
			<?php } ?>
		</div>

		<div class="col-xs-12 col-sm-6 form">
			<div class="field-container row">
				<p class="full-label">Full Name *</p>
				<p class="descriptive-label">I always like to know who I am speaking with.</p>
				<div class="form-group col-md-6">
					<input type="text" class="form-control" name="firstname">
					<label for="firstname">First Name</label>
				</div>
				<div class="form-group col-md-6">
					<input type="text" class="form-control" name="lastname">
					<label for="lastname">Last Name</label>
				</div>
			</div>

			<div class="field-container row">
				<p class="full-label">Email Address *</p>
				<div class="form-group col-md-12">
					<input type="email" class="form-control" name="email">
				</div>
			</div>

			<div class="field-container row">
				<p class="full-label">Message *</label>
				<p class="descriptive-label">Send an awesome message to my inbox.</p>
				<div class="form-group col-md-12">
					<textarea class="form-control" name="message"></textarea>
				</div>
			</div>

			<button class="btn btn-info contact-btn">Send Message</button>
		</div>
	</main>

	<img class="map" src="<?php echo VINCENTRAGOSTA_COM_TEMPLATE_URL . '/assets/images/map.png'; ?>" />

<?php get_footer(); ?>
