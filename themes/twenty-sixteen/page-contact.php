<?php
/**
 * Template for displaying the contact page.
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since 0.1.0
 */

namespace VincentRagosta;

get_header();

$user = get_user_by( 'email', 'allchenzo@gmail.com' );
$_facebook = get_user_meta( $user->ID, '_facebook', true );
$_twitter = get_user_meta( $user->ID, '_twitter', true );
$_instagram = get_user_meta( $user->ID, '_instagram', true );
$_personal = get_user_meta( $user->ID, '_personal', true );
$_github = get_user_meta( $user->ID, '_github', true ); ?>

<main id="contact-page" class="container">
	<div class="col-xs-12 col-sm-6">
		<?php echo $post->post_content; ?>
		<?php if ( ! empty( $_facebook ) || ! empty( $_twitter ) || ! empty( $_instagram ) || ! empty( $_personal ) || ! empty( $_github ) ) { ?>
			<div class="social">
				<?php if ( ! empty( $_facebook ) ) { ?>
					<a href="<?php echo esc_url( $_facebook ); ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
				<?php } ?>
				<?php if ( ! empty( $_twitter ) ) { ?>
					<a href="<?php echo esc_url( $_twitter ); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
				<?php } ?>
				<?php if ( ! empty( $_instagram ) ) { ?>
					<a href="<?php echo esc_url( $_instagram ); ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
				<?php } ?>
				<?php if ( ! empty( $_personal ) ) { ?>
					<a href="<?php echo esc_url( $_personal ); ?>" target="_blank"><i class="fa fa-link" aria-hidden="true"></i></a>
				<?php } ?>
				<?php if ( ! empty( $_github ) ) { ?>
					<a href="<?php echo esc_url( $_github ); ?>" target="_blank"><i class="fa fa-github" aria-hidden="true"></i></a>
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
