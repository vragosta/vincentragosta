<?php
/**
 * Builds custom Instagram widget.
 *
 * @package Vincent Raogsta - Twenty Sixteen
 * @since   0.1.0
 */

# Blocking direct access to this file.
defined( 'ABSPATH' ) || exit;

/**
 * Return a banner shaped content block with optional button.
 *
 * @since 0.1.0
 */
class Instagram_Widget extends WP_Widget {
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'instagram',
			__( 'Instagram', 'vincentragosta' ),
			array( 'description' => __( 'A custom widget for a displaying instagram images.', 'vincentragosta' ), )
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
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$button_text = ! empty( $instance['button_text'] ) ? $instance['button_text'] : '';
		$button_link = ! empty( $instance['button_link'] ) ? $instance['button_link'] : ''; ?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo __( 'Title:', 'vincentragosta' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'button_text' ) ); ?>"><?php echo __( 'Button Text:', 'vincentragosta' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'button_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_text' ) ); ?>" type="text" value="<?php echo esc_attr( $button_text ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'button_link' ) ); ?>"><?php echo __( 'Button Link:', 'vincentragosta' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'button_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_link' ) ); ?>" type="text" value="<?php echo esc_attr( $button_link ); ?>">
		</p><?php
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
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['button_text'] = ( ! empty( $new_instance['button_text'] ) ) ? $new_instance['button_text'] : '';
		$instance['button_link'] = ( ! empty( $new_instance['button_link'] ) ) ? $new_instance['button_link'] : '';

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

		# If the 'before_widget' field is set, display it.
		echo $args['before_widget'];

		# If the 'title' field of the widget is not empty, display it.
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		} ?>

		<div id="instagram-feed"></div>

		<?php if ( $instance['button_text'] ) { ?>
			<a class="instagram-about" href="<?php echo esc_url( $instance['button_link'] ); ?>"><?php echo esc_html( $instance['button_text'] ); ?></a>
		<?php } ?>

		<?php echo $args['after_widget'];
	}
}
