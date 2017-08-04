<?php
/**
 * Builds custom Featured Post Widget.
 *
 * @package Image Captions - Twenty Sixteen
 * @since   0.1.0
 */

# Blocking direct access to this file.
defined( 'ABSPATH' ) || exit;

/**
 * Returns the the project based upon ID passed in,
 * if no ID is entered, most recent post will be returned.
 *
 * @since 0.1.0
 */
class Featured_Page_Widget extends WP_Widget {
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'featured_page',
			__( 'Featured Page', 'vincentragosta' ),
			array( 'description' => __( 'A custom widget for a featured page.', 'vincentragosta' ), )
		);
	}

	/**
	 * Back-end widget form.
	 *
	 * @param  array $instance previously saved values from database.
	 * @uses   empty(), __(), get_field_id(), esc_attr()
	 * @return void
	 */
	public function form( $instance ) {
		$id = ( ! empty( $instance['id'] ) ) ? $instance['id'] : ''; ?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'id' ) ); ?>"><?php echo __( 'ID:', 'vincentragosta' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'id' ) ); ?>" type="text" value="<?php echo esc_attr( $id ); ?>">
		</p><?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @param  array $new_instance values just sent to be saved.
	 * @param  array $old_instance previously saved values from database.
	 * @uses   empty(), do_shortcode(), wp_reset_postdata()
	 * @return array $instance updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['id'] = ( ! empty( $new_instance['id'] ) ) ? $new_instance['id'] : '';

		return $instance;
	}

	/**
	 * Front-end display of widget.
	 *
	 * @param  array $args     widget arguments.
	 * @param  array $instance saved values from database.
	 * @return void
	 */
	public function widget( $args, $instance ) {
		global $post;

		# Get the 'before_widget' value from the sidebar.
		echo $args['before_widget'];

		# Assign the default arguments to the query.
		$args = array(
			'post_type' => 'page',
			'posts_per_page' => 1
		);

		# If the ID is set add it to the query, otherwise it will return the latest project/post.
		( ! empty( $instance['id'] ) ) ? $args['post__in'] = array( $instance['id'] ) : '';

		# Initialize query.
		$query = new WP_Query( $args ); ?>

		<div id="featured-page" class="custom-widget full-width">
			<?php if ( $query->have_posts() ) : ?>
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>
					<div class="col-xs-12">

						<!-- Featured image overlay -->
						<?php do_shortcode( '[image-caption id="' . $post->ID . '" class="static"]' ); ?>

					</div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php endif;?>
		</div>

		<?php echo $args['after_widget'];
	}
}
