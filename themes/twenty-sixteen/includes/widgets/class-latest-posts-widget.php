<?php
/**
 * Builds custom Latest Posts Widget.
 *
 * @package Vincent Raogsta - Twenty Sixteen
 * @since   0.1.0
 */

// Blocking direct access to this file.
defined( 'ABSPATH' ) || exit;

/**
 * Widget to return the 4 latest posts.
 *
 * @package Vincent Raogsta - Twenty Sixteen
 * @since   0.1.0
 */
class Latest_Posts_Widget extends WP_Widget {
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'latest_posts',
			__( 'Latest Posts', 'vincentragosta' ),
			array( 'description' => __( 'A custom widget for Vincent Ragosta latest posts.', 'vincentragosta' ), )
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

		// Arguements to return latest 4 projects.
		$args = array(
			'post_type'      => array( 'post' ),
			'posts_per_page' => 4
		);

		// Initialize query.
		$query = new WP_Query( $args ); ?>

		<div id="latest-posts-widget" class="custom-widget full-width">
			<?php if ( $query->have_posts() ) : ?>
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'full' )[0]; ?>
					<div class="col-xs-3" style="box-shadow: -10px 10px 0 0 rgba(0,0,0,.05);">
						<div class="full-width">
							<div class="col-xs-12">
								<div class="featured-image aspect-ratio-1x1">
									<div class="projects normalize-image" style="background-image: url( '<?php echo esc_attr( $image ); ?>' );"></div>
								</div>
							</div>
							<div class="col-xs-12" style="background: #fff; box-shadow: -10px 10px 0 0 rgba(0,0,0,.05);">
								<div class="full-width">
									<p style="font-size: 2.2rem; margin: 2rem 0 0; text-align: center;"><?php echo esc_html( $post->post_title ); ?></p>
								</div>
								<div class="full-width" style="display: flex; justify-content: space-around; align-items: center;">
									<p style="opacity: 0.4; font-size: 1.5rem;">VincentRagosta.com</p>
									<!-- .cta p + p -->
									<p style="margin: 0; opacity: 0.4; font-size: 1.5rem;"><?php the_date(); ?></p>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php endif;?>
			<div class="full-width flex-center" style="padding: 4rem 0 0;">
				<a href="">View more projects</a>
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
		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : ''; ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html( __( 'Title:', 'vincentragosta' ) ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
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
		$instance          = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
}
