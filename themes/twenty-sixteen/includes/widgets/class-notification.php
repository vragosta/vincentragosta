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
 * @package Vincent Raogsta - Twenty Sixteen
 * @since   0.1.0
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
	 * @return void
	 */
	public function form( $instance ) {
		$content     = ( ! empty( $instance['content'] ) ) ? $instance['content'] : '';
		$button_text = ( ! empty( $instance['button_text'] ) ) ? $instance['button_text'] : '';
		// background_color ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'content' ) ); ?>"><?php echo esc_html( __( 'Content:', 'vincentragosta' ) ); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'content' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'content' ) ); ?>" type="text"><?php echo esc_textarea( $content ); ?></textarea>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'button_text' ) ); ?>"><?php echo esc_html( __( 'Button Text:', 'vincentragosta' ) ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'button_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_text' ) ); ?>" type="text" value="<?php echo esc_attr( $button_text ); ?>">
		</p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @param  array $new_instance Values just sent to be saved.
	 * @param  array $old_instance Previously saved values from database.
	 * @return array $instance     Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance                = array();
		$instance['content']     = ( ! empty( $new_instance['content'] ) ) ? $new_instance['content'] : '';
		$instance['button_text'] = ( ! empty( $new_instance['button_text'] ) ) ? $new_instance['button_text'] : '';
		return $instance;
	}

	/**
	 * Front-end display of widget.
	 *
	 * @param  array $args     Widget arguments.
	 * @param  array $instance Saved values from database.
	 * @return void
	 */
	public function widget( $args, $instance ) {
		global $post;

		// If the 'before_widget' field is set, display it.
		echo ( isset( $args['before_widget'] ) ) ? $args['before_widget'] : ''; ?>

		<div id="notification-widget" class="custom-widget full-width">
			
		</div>

		<?php echo ( isset( $args['after_widget'] ) ) ? $args['after_widget'] : '';
	}
}
