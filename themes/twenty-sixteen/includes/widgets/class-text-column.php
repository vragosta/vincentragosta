<?php
/**
 * Builds 'Text Column' Widget.
 *
 * @package Vincent Raogsta - Twenty Sixteen
 * @since   0.1.0
 */

// Blocking direct access to this file.
defined( 'ABSPATH' ) || exit;

/**
 * TODO
 *
 * @package Vincent Raogsta - Twenty Sixteen
 * @since   0.1.0
 */
class Text_Column_Widget extends WP_Widget {
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'text_column',
			__( 'Text Column', 'vincentragosta' ),
			array( 'description' => __( '', 'vincentragosta' ), )
		);
	}

	/**
	 * Back-end widget form.
	 *
	 * @param  array $instance Previously saved values from database.
	 * @return void
	 */
	public function form( $instance ) {
		$title                = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
		$button_text          = ( ! empty( $instance['button_text'] ) ) ? $instance['button_text'] : '';
		$button_link          = ( ! empty( $instance['button_link'] ) ) ? $instance['button_link'] : '';
		$number_columns       = ( ! empty( $instance['number_columns'] ) ) ? $instance['number_columns'] : '';
		$column_one_title     = ( ! empty( $instance['column_one_title'] ) ) ? $instance['column_one_title'] : '';
		$column_one_icon      = ( ! empty( $instance['column_one_icon'] ) ) ? $instance['column_one_icon'] : '';
		$column_one_content   = ( ! empty( $instance['column_one_content'] ) ) ? $instance['column_one_content'] : '';
		$column_two_title     = ( ! empty( $instance['column_two_title'] ) ) ? $instance['column_two_title'] : '';
		$column_two_icon      = ( ! empty( $instance['column_two_icon'] ) ) ? $instance['column_two_icon'] : '';
		$column_two_content   = ( ! empty( $instance['column_two_content'] ) ) ? $instance['column_two_content'] : '';
		$column_three_title   = ( ! empty( $instance['column_three_title'] ) ) ? $instance['column_three_title'] : '';
		$column_three_icon    = ( ! empty( $instance['column_three_icon'] ) ) ? $instance['column_three_icon'] : '';
		$column_three_content = ( ! empty( $instance['column_three_content'] ) ) ? $instance['column_three_content'] : ''; ?>
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
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'number_columns' ) ); ?>"><?php echo __( 'Columns to display:', 'vincentragosta' ); ?></label><br />
			<label class="vr-widget-description" for="<?php echo esc_attr( $this->get_field_id( 'number_columns' ) ); ?>"><?php echo __( 'Selecting `--` will clear all entries.', 'vincentragosta' ); ?></label>
			<select class="widefat number-columns" id="<?php echo esc_attr( $this->get_field_id( 'number_columns' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number_columns' ) ); ?>">
				<option value="0">--</option>
				<option value="1" <?php echo ( $number_columns === '1' ) ? 'selected' : ''; ?>>One</option>
				<option value="2" <?php echo ( $number_columns === '2' ) ? 'selected' : ''; ?>>Two</option>
				<option value="3" <?php echo ( $number_columns === '3' ) ? 'selected' : ''; ?>>Three</option>
			</select>
		</p>
		<div class="vr-column one <?php echo ( $number_columns > 0 ) ? 'show' : ''; ?>">
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'column_one_title' ) ); ?>"><?php echo __( 'Column One Title:', 'vincentragosta' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'column_one_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'column_one_title' ) ); ?>" type="text" value="<?php echo esc_attr( $column_one_title ); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'column_one_icon' ) ); ?>"><?php echo __( 'Column One Icon:', 'vincentragosta' ); ?></label>
				<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'column_one_icon' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'column_one_icon' ) ); ?>">
					<option value="0">--</option>
					<option value="terminal" <?php echo ( $column_one_icon === 'terminal' ) ? 'selected' : ''; ?>>Terminal</option>
					<option value="codepen" <?php echo ( $column_one_icon === 'codepen' ) ? 'selected' : ''; ?>>CodePen</option>
					<option value="code" <?php echo ( $column_one_icon === 'code' ) ? 'selected' : ''; ?>>Code</option>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'column_one_content' ) ); ?>"><?php echo __( 'Column One Content:', 'vincentragosta' ); ?></label>
				<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'column_one_content' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'column_one_content' ) ); ?>" type="text"><?php echo esc_textarea( $column_one_content ); ?></textarea>
			</p>
		</div>
		<div class="vr-column two <?php echo ( $number_columns > 1 ) ? 'show' : ''; ?>">
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'column_two_title' ) ); ?>"><?php echo __( 'Column Two Title:', 'vincentragosta' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'column_two_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'column_two_title' ) ); ?>" type="text" value="<?php echo esc_attr( $column_two_title ); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'column_two_icon' ) ); ?>"><?php echo __( 'Column Two Icon:', 'vincentragosta' ); ?></label>
				<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'column_two_icon' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'column_two_icon' ) ); ?>">
					<option value="0">--</option>
					<option value="terminal" <?php echo ( $column_two_icon === 'terminal' ) ? 'selected' : ''; ?>>Terminal</option>
					<option value="codepen" <?php echo ( $column_two_icon === 'codepen' ) ? 'selected' : ''; ?>>CodePen</option>
					<option value="code" <?php echo ( $column_two_icon === 'code' ) ? 'selected' : ''; ?>>Code</option>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'column_two_content' ) ); ?>"><?php echo __( 'Column Two Content:', 'vincentragosta' ); ?></label>
				<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'column_two_content' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'column_two_content' ) ); ?>" type="text"><?php echo esc_textarea( $column_two_content ); ?></textarea>
			</p>
		</div>
		<div class="vr-column three <?php echo ( $number_columns > 2 ) ? 'show' : ''; ?>">
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'column_three_title' ) ); ?>"><?php echo __( 'Column Three Title:', 'vincentragosta' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'column_three_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'column_three_title' ) ); ?>" type="text" value="<?php echo esc_attr( $column_three_title ); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'column_three_icon' ) ); ?>"><?php echo __( 'Column Three Icon:', 'vincentragosta' ); ?></label>
				<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'column_three_icon' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'column_three_icon' ) ); ?>">
					<option value="0">--</option>
					<option value="terminal" <?php echo ( $column_three_icon === 'terminal' ) ? 'selected' : ''; ?>>Terminal</option>
					<option value="codepen" <?php echo ( $column_three_icon === 'codepen' ) ? 'selected' : ''; ?>>CodePen</option>
					<option value="code" <?php echo ( $column_three_icon === 'code' ) ? 'selected' : ''; ?>>Code</option>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'column_three_content' ) ); ?>"><?php echo __( 'Column Three Content:', 'vincentragosta' ); ?></label>
				<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'column_three_content' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'column_three_content' ) ); ?>" type="text"><?php echo esc_textarea( $column_three_content ); ?></textarea>
			</p>
		</div>
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
		$instance                         = array();
		$instance['title']                = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['button_text']          = ( ! empty( $new_instance['button_text'] ) ) ? strip_tags( $new_instance['button_text'] ) : '';
		$instance['button_link']          = ( ! empty( $new_instance['button_link'] ) ) ? strip_tags( $new_instance['button_link'] ) : '';
		$instance['number_columns']       = ( ! empty( $new_instance['number_columns'] ) ) ? $new_instance['number_columns'] : '';
		$instance['column_one_title']     = ( ! empty( $new_instance['column_one_title'] ) ) ? strip_tags( $new_instance['column_one_title'] ) : '';
		$instance['column_one_icon']      = ( ! empty( $new_instance['column_one_icon'] ) ) ? $new_instance['column_one_icon'] : '';
		$instance['column_one_content']   = ( ! empty( $new_instance['column_one_content'] ) ) ? strip_tags( $new_instance['column_one_content'] ) : '';
		$instance['column_two_title']     = ( ! empty( $new_instance['column_two_title'] ) ) ? strip_tags( $new_instance['column_two_title'] ) : '';
		$instance['column_two_icon']      = ( ! empty( $new_instance['column_two_icon'] ) ) ? $new_instance['column_two_icon'] : '';
		$instance['column_two_content']   = ( ! empty( $new_instance['column_two_content'] ) ) ? strip_tags( $new_instance['column_two_content'] ) : '';
		$instance['column_three_title']   = ( ! empty( $new_instance['column_three_title'] ) ) ? strip_tags( $new_instance['column_three_title'] ) : '';
		$instance['column_three_icon']    = ( ! empty( $new_instance['column_three_icon'] ) ) ? $new_instance['column_three_icon'] : '';
		$instance['column_three_content'] = ( ! empty( $new_instance['column_three_content'] ) ) ? strip_tags( $new_instance['column_three_content'] ) : '';

		return $instance;
	}

	/**
	 * Front-end display of widget.
	 * NOTE: Styles associated with this function go in vincentragosta---twenty-sixteen.css.
	 *
	 * @param  array $args     Widget arguments.
	 * @param  array $instance Saved values from database.
	 * @return void
	 */
	public function widget( $args, $instance ) {

		// Define global variables.
		global $post;

		// If the 'before_widget' field is set, display it.
		echo $args['before_widget'];

		// If the 'title' field of the widget is not empty, display it.
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		} ?>

		<div id="text-column" class="custom-widget full-width">
			<div class="column-container">
				<div class="column one">
					<div class="full-width flex-center">
						<?php echo ( $instance['column_one_icon'] ) ? '<i class="fa fa-' . esc_attr( $instance['column_one_icon'] ) . ' fa-4x"></i>' : ''; ?>
						<h4><?php echo esc_html( $instance['column_one_title'] ); ?></h4>
						<p><?php echo esc_html( $instance['column_one_content'] ); ?></p>
					</div>
				</div>
				<div class="column two">
					<div class="full-width flex-center">
						<?php echo ( $instance['column_two_icon'] ) ? '<i class="fa fa-' . esc_attr( $instance['column_two_icon'] ) . ' fa-4x"></i>' : ''; ?>
						<h4><?php echo esc_html( $instance['column_two_title'] ); ?></h4>
						<p><?php echo esc_html( $instance['column_two_content'] ); ?></p>
					</div>
				</div>
				<div class="column three">
					<div class="full-width flex-center">
						<?php echo ( $instance['column_three_icon'] ) ? '<i class="fa fa-' . esc_attr( $instance['column_three_icon'] ) . ' fa-4x"></i>' : ''; ?>
						<h4><?php echo esc_html( $instance['column_three_title'] ); ?></h4>
						<p><?php echo esc_html( $instance['column_three_content'] ); ?></p>
					</div>
				</div>
			</div>
			<div class="full-width flex-center">
				<a href="<?php echo esc_url( $instance['button_link'] ); ?>"><?php echo esc_html( $instance['button_text'] ); ?></a>
			</div>
		</div>

		<!-- If the 'after_widget' field is set, display it. -->
		<?php echo $args['after_widget'];
	}
}
