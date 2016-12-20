<?php
/**
 * Builds custom Featured Post Widget.
 *
 * @package Vincent Raogsta - Twenty Sixteen
 * @since   0.1.0
 */

// Blocking direct access to this file.
defined( 'ABSPATH' ) || exit;

/**
 * Returns the the project based upon ID passed in,
 * if no ID is entered, most recent post will be returned.
 *
 * @package Vincent Raogsta - Twenty Sixteen
 * @since   0.1.0
 */
class Featured_Post_Widget extends WP_Widget {
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'featured_post',
			__( 'Featured Post', 'vincentragosta' ),
			array( 'description' => __( 'A custom widget for a featured post.', 'vincentragosta' ), )
		);
	}

	/**
	 * Back-end widget form.
	 *
	 * @param  array $instance Previously saved values from database.
	 * @return void
	 */
	public function form( $instance ) {
		$id          = ( ! empty( $instance['id'] ) ) ? $instance['id'] : '';
		$button_text = ( ! empty( $instance['button_text'] ) ) ? $instance['button_text'] : ''; ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'id' ) ); ?>"><?php echo __( 'ID:', 'vincentragosta' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'id' ) ); ?>" type="text" value="<?php echo esc_attr( $id ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'button_text' ) ); ?>"><?php echo __( 'Button Text:', 'vincentragosta' ); ?></label>
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
		$instance['id']          = ( ! empty( $new_instance['id'] ) ) ? $new_instance['id'] : '';
		$instance['button_text'] = ( ! empty( $new_instance['button_text'] ) ) ? strip_tags( $new_instance['button_text'] ) : '';

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
		echo $args['before_widget'];

		// If the 'button_text' field is set, obtain its value.
		$button_text = ( ! empty( $instance['button_text'] ) ) ? $instance['button_text'] : 'Find Out How';

		// Assign the default arguments to the query.
		$args = array(
			'post_type'      => array( 'post' ),
			'posts_per_page' => 1
		);

		// If the ID is set add it to the query, otherwise it will return the latest project/post.
		( ! empty( $instance['id'] ) ) ? $args['post__in'] = array( $instance['id'] ) : '';

		// Initialize query.
		$query = new WP_Query( $args ); ?>

		<div id="featured-post-widget" class="custom-widget full-width">
			<?php if ( $query->have_posts() ) : ?>
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>
					<?php $image = vincentragosta_com\Twenty_Sixteen\Helpers\vr_get_featured_image( $post->ID ); ?>
					<div class="col-xs-12">
						<div class="featured-image aspect-ratio-10x4">
							<div class="overlay flex-center">
								<span class="sub-heading"><?php echo esc_html( get_the_excerpt() ); ?></span>
								<h1 class="heading"><?php echo esc_html( get_the_title() ); ?></h1>
								<a href=""><?php echo esc_html( $button_text ); ?></a>
							</div>
							<div class="post normalize-image" style="background-image: url( '<?php echo esc_attr( $image ); ?>' );"></div>
						</div>
					</div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php endif;?>
		</div>

		<?php echo $args['after_widget'];
	}
}
