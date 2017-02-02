<?php
/**
 * Builds custom notification widget.
 *
 * @package Vincent Raogsta - Twenty Sixteen
 * @since   0.1.0
 */

// Blocking direct access to this file.
defined( 'ABSPATH' ) || exit;

/**
 * Return a banner shaped content block with optional button.
 *
 * @since 0.1.0
 */
class Notification_Widget extends WP_Widget {
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'notification',
			__( 'Notification', 'vincentragosta' ),
			array( 'description' => __( 'A custom widget for a displaying content blocks.', 'vincentragosta' ), )
		);
	}

	/**
	 * Back-end widget form.
	 *
	 * @param  array $instance Previously saved values from database.
	 * @uses   empty(), get_field_id(), __(), esc_attr()
	 * @return void
	 */
	public function form( $instance ) {
		$content          = ( ! empty( $instance['content'] ) ) ? $instance['content'] : '';
		$button_text      = ( ! empty( $instance['button_text'] ) ) ? $instance['button_text'] : '';
		$button_link      = ( ! empty( $instance['button_link'] ) ) ? $instance['button_link'] : ''; ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'content' ) ); ?>"><?php echo __( 'Content:', 'vincentragosta' ); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'content' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'content' ) ); ?>" type="text"><?php echo esc_textarea( $content ); ?></textarea>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'button_text' ) ); ?>"><?php echo __( 'Button Text:', 'vincentragosta' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'button_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_text' ) ); ?>" type="text" value="<?php echo esc_attr( $button_text ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'button_link' ) ); ?>"><?php echo __( 'Button Link:', 'vincentragosta' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'button_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_link' ) ); ?>" type="text" value="<?php echo esc_attr( $button_link ); ?>">
		</p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @param  array $new_instance Values just sent to be saved.
	 * @param  array $old_instance Previously saved values from database.
	 * @uses   empty(), strip_tags()
	 * @return array $instance     Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance                     = array();
		$instance['content']          = ( ! empty( $new_instance['content'] ) ) ? strip_tags( $new_instance['content'] ) : '';
		$instance['button_text']      = ( ! empty( $new_instance['button_text'] ) ) ? $new_instance['button_text'] : '';
		$instance['button_link']      = ( ! empty( $new_instance['button_link'] ) ) ? $new_instance['button_link'] : '';

		return $instance;
	}

	/**
	 * Front-end display of widget.
	 *
	 * @param  array $args     Widget arguments.
	 * @param  array $instance Saved values from database.
	 * @uses   esc_html(), esc_url()
	 * @return void
	 */
	public function widget( $args, $instance ) {
		global $post;

		// If the 'before_widget' field is set, display it.
		echo $args['before_widget']; ?>

		<div id="notification-widget" class="custom-widget full-width row-flex-center">
			<p>
				<span><?php echo esc_html( $instance['content'] ); ?></span>
				<a href="<?php echo esc_url( $instance['button_link'] ); ?>"><?php echo esc_html( $instance['button_text'] ); ?></a>
			</p>
		</div>

		<?php echo $args['after_widget'];
	}
}
