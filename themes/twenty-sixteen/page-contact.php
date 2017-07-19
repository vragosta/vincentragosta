<?php
/**
 * Template for displaying the contact page.
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since   0.1.0
 */

	get_header();

	$user = get_user_by( 'email', 'allchenzo@gmail.com' );
	$facebook = get_user_meta( $user->ID, 'facebook', true );
	$twitter = get_user_meta( $user->ID, 'twitter', true );
	$instagram = get_user_meta( $user->ID, 'instagram', true );
	$personal = get_user_meta( $user->ID, 'personal', true );
	$github = get_user_meta( $user->ID, 'github', true );

	global $post; ?>

	<main id="contact" class="container">
		<div class="col-xs-12 col-sm-6" style="padding: 6rem 4rem;">
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
		<div class="col-xs-12 col-sm-6">
			Hello
		</div>
	</main>

<?php get_footer(); ?>
