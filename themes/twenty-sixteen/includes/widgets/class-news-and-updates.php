<?php
/**
 * Builds 'News & Updates' Widget.
 *
 * @package Vincent Raogsta - Twenty Sixteen
 * @since   0.1.0
 */

// Blocking direct access to this file.
defined( 'ABSPATH' ) || exit;

/**
 * Returns the latest three posts of the custom post type entered.
 *
 * @package Vincent Raogsta - Twenty Sixteen
 * @since   0.1.0
 */
class News_And_Updates_Widget extends WP_Widget {
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'news_and_updates',
			__( 'News &amp; Updates', 'vincentragosta' ),
			array( 'description' => __( 'A custom widget for the latest news and updates.', 'vincentragosta' ), )
		);
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
		echo ( isset( $args['before_widget'] ) ) ? $args['before_widget'] : '';

		// If the 'title' field of the widget is not empty, display it.
		if ( ! empty( $instance['title'] ) ) {
			echo ( ( isset( $args['before_title'] ) ) ? $args['before_title'] : '' ) .
				apply_filters( 'widget_title', $instance['title'] ) .
					( ( isset( $args['after_title'] ) ) ? $args['after_title'] : '' );
		}

		// Arguements to return latest 3 posts of the custom post type.
		$args = array(
			'post_type'      => array( $instance['post_type'] ),
			'posts_per_page' => 3
		);

		// Initialize query.
		$query = new WP_Query( $args ); ?>

		<div id="news-and-updates" class="custom-widget full-width">
			<?php if ( $query->have_posts() ) : ?>
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'full' )[0]; ?>
					<div class="col-xs-4">
						<div class="featured-image aspect-ratio-1x1">
							<div class="overlay flex-center">
								<!-- Make dynamic using taxonomies -->
								<span class="sub-title"><?php echo ( $instance['post_type'] === 'project' ) ? 'Wordpress Site' : get_the_date(); ?></span>
								<span class="title"><?php echo esc_html( $post->post_title ); ?></span>
								<a href="">View <?php echo esc_html( $instance['post_type'] ); ?></a>
							</div>
							<div class="post-type normalize-image" style="background-image: url( '<?php echo esc_attr( $image ); ?>' );"></div>
						</div>
					</div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php endif;?>
			<div class="full-width flex-center">
				<a href="">View more <?php echo esc_html( $instance['post_type'] ); ?>s</a>
			</div>
		</div>
		<?php echo ( isset( $args['after_widget'] ) ) ? $args['after_widget'] : '';
	}

	/**
	 * Back-end widget form.
	 *
	 * @param  array $instance Previously saved values from database.
	 * @return void
	 */
	public function form( $instance ) {
		$title     = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
		$post_type = ( ! empty( $instance['post_type'] ) ) ? $instance['post_type'] : ''; ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html( __( 'Title:', 'vincentragosta' ) ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'post_type' ) ); ?>"><?php echo esc_html( __( 'Post Type:', 'vincentragosta' ) ); ?></label>
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_type' ) ); ?>">
				<option>--</option>
				<option value="post" <?php echo ( $post_type === 'post' ) ? 'selected' : ''; ?>>Post</option>
				<option value="project" <?php echo ( $post_type === 'project' ) ? 'selected' : ''; ?>>Project</option>
			</select>
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
		$instance              = array();
		$instance['title']     = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['post_type'] = ( ! empty( $new_instance['post_type'] ) ) ? strip_tags( $new_instance['post_type'] ) : '';
		return $instance;
	}
}
