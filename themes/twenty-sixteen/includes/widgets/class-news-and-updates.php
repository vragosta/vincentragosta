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
	 * Back-end widget form.
	 *
	 * @param  array $instance Previously saved values from database.
	 * @return void
	 */
	public function form( $instance ) {
		$title     = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
		$post_type = ( ! empty( $instance['post_type'] ) ) ? $instance['post_type'] : '';
		$ids       = ( ! empty( $instance['ids'] ) ) ? $instance['ids'] : ''; ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo __( 'Title:', 'vincentragosta' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'post_type' ) ); ?>"><?php echo __( 'Post Type:', 'vincentragosta' ); ?></label>
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'post_type' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_type' ) ); ?>">
				<option value="0">--</option>
				<option value="post" <?php echo ( $post_type === 'post' ) ? 'selected' : ''; ?>>Post</option>
				<option value="project" <?php echo ( $post_type === 'project' ) ? 'selected' : ''; ?>>Project</option>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'ids' ) ); ?>"><?php echo __( 'Enter ID\'s:', 'vincentragosta' ); ?></label><br />
			<label class="vr-widget-description" for="<?php echo esc_attr( $this->get_field_id( 'ids' ) ); ?>">Please separate with a comma.</label><br />
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'ids' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'ids' ) ); ?>" type="text" value="<?php echo esc_attr( $ids ); ?>">
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
		$instance['post_type'] = ( ! empty( $new_instance['post_type'] ) ) ? $new_instance['post_type'] : '';
		$instance['ids']       = ( ! empty( $new_instance['ids'] ) ) ? $new_instance['ids'] : '';

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
		}

		// If 'ids' exists, remove all spaces from the string, and explode the string by the delimeter ','.
		$post__in = ( $instance['ids'] ) ? explode( ',', str_replace( ' ', '', $instance['ids'] ) ) : '';

		// If $post__in exists, create the $post__in_count based off the size of the exploded 'ids' array.
		( $post__in ) ? $post__in_count = count( $post__in ) : '';

		// If $post__in exists, set $bootstrap_grid_col to $post__in_count, otherwise set it to 3.
		$bootstrap_grid_col = ( $post__in ) ? $post__in_count : POSTS_PER_PAGE;

		// If 'posts_per_page' is not set, default 3.
		$posts_per_page = ( $post__in_count ) ? $post__in_count : POSTS_PER_PAGE;

		// If 'post_type' is not set, default 'post'.
		$post_type = ( $instance['post_type'] ) ? $instance['post_type'] : POST_TYPE;

		// Set bootstrap grid, divide 12 ( max bootstrap col size ) by the value of $bootstrap_grid_col.
		$class = 'col-sm-' . ( BOOTSTRAP_GRID_COL_MAX / $bootstrap_grid_col );

		// Create arguments array for query.
		$args                   = array();
		$args['post_type']      = $post_type;
		$args['posts_per_page'] = $posts_per_page;
		$args['post__in']       = $post__in;

		// Initialize query.
		$query = new WP_Query( $args ); ?>

		<div id="news-and-updates" class="custom-widget full-width">
			<?php if ( $query->have_posts() ) : ?>
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>
					<?php $title = ( get_post_meta( $post->ID, 'shorthand_title', true ) ) ? get_post_meta( $post->ID, 'shorthand_title', true ) : $post->post_title; ?>
					<?php $image = vincentragosta_com\Twenty_Sixteen\Helpers\vr_get_featured_image( $post->ID ); ?>
					<div class="col-xs-12 <?php echo esc_attr( $class ); ?>">
						<div class="featured-image aspect-ratio-1x1">
							<div class="overlay flex-center not-visible">
								<span class="sub-title padding-left-right"><?php echo ( $instance['post_type'] === 'project' ) ? 'Wordpress Site' : get_the_date(); ?></span>
								<span class="title padding-left-right"><?php echo esc_html( $title ); ?></span>
								<a href="<?php echo get_the_permalink( $post->ID ); ?>">View <?php echo esc_html( $instance['post_type'] ); ?></a>
							</div>
							<div class="post-type normalize-image" style="background-image: url( '<?php echo esc_attr( $image ); ?>' );"></div>
						</div>
					</div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php endif;?>
			<div class="full-width flex-center">
				<a href="<?php echo home_url( '/portfolio/' ) ?>">View more <?php echo esc_html( $instance['post_type'] ); ?>s</a>
			</div>
		</div>

		<!-- If the 'after_widget' field is set, display it. -->
		<?php echo $args['after_widget'];
	}
}
