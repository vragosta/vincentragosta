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
		$title          = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
		$post_type      = ( ! empty( $instance['post_type'] ) ) ? $instance['post_type'] : '';
		$posts_per_page = ( ! empty( $instance['posts_per_page'] ) ) ? $instance['posts_per_page'] : '';
		$ids            = ( ! empty( $instance['ids'] ) ) ? $instance['ids'] : ''; ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html( __( 'Title:', 'vincentragosta' ) ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'post_type' ) ); ?>"><?php echo esc_html( __( 'Post Type:', 'vincentragosta' ) ); ?></label>
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'post_type' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_type' ) ); ?>">
				<option value="0">--</option>
				<option value="post" <?php echo ( $post_type === 'post' ) ? 'selected' : ''; ?>>Post</option>
				<option value="project" <?php echo ( $post_type === 'project' ) ? 'selected' : ''; ?>>Project</option>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'posts_per_page' ) ); ?>"><?php echo esc_html( __( 'Posts To Display', 'vincentragosta' ) ); ?></label>
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'posts_per_page' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'posts_per_page' ) ); ?>">
				<option value="0">--</option>
				<option value="2" <?php echo ( $posts_per_page === '2' ) ? 'selected' : ''; ?>>Two</option>
				<option value="3" <?php echo ( $posts_per_page === '3' ) ? 'selected' : ''; ?>>Three</option>
				<option value="4" <?php echo ( $posts_per_page === '4' ) ? 'selected' : ''; ?>>Four</option>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'ids' ) ); ?>"><?php echo esc_html( __( 'Enter ID\'s:', 'vincentragosta' ) ); ?></label><br />
			<label class="vr-widget-description" for="<?php echo esc_attr( $this->get_field_id( 'ids' ) ); ?>">Please separate with a comma.</label><br />
			<label class="vr-widget-description" for="<?php echo esc_attr( $this->get_field_id( 'ids' ) ); ?>">NOTE: The number of IDs entered will overwrite the 'Posts To Display' value entered.</label>
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
		$instance                   = array();
		$instance['title']          = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['post_type']      = ( ! empty( $new_instance['post_type'] ) ) ? $new_instance['post_type'] : '';
		$instance['posts_per_page'] = ( ! empty( $new_instance['posts_per_page'] ) ) ? $new_instance['posts_per_page'] : '';
		$instance['ids']            = ( ! empty( $new_instance['ids'] ) ) ? $new_instance['ids'] : '';

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

		// Define global constants.
		define( 'POSTS_PER_PAGE_DEFAULT', 4 );
		define( 'POST_TYPE_DEFAULT',      'post' );
		define( 'BOOTSTRAP_GRID_COL_MAX', 12 );

		// Define global variables.
		global $post;

		// If the 'before_widget' field is set, display it.
		echo ( isset( $args['before_widget'] ) ) ? $args['before_widget'] : '';

		// If the 'title' field of the widget is not empty, display it.
		if ( ! empty( $instance['title'] ) ) {
			echo ( ( isset( $args['before_title'] ) ) ? $args['before_title'] : '' ) .
				apply_filters( 'widget_title', $instance['title'] ) .
					( ( isset( $args['after_title'] ) ) ? $args['after_title'] : '' );
		}

		// If 'ids' exists, remove all spaces from the string.
		$post__in = ( $instance['ids'] ) ? str_replace( ' ', '', $instance['ids'] ) : '';

		// If 'ids' exists, explode the string by the delimeter ','.
		$post__in = ( $instance['ids'] ) ? explode( ',', $instance['ids'] ) : '';

		// If $post__in exists, create the $post__in_count based off the size of the exploded 'ids' array.
		( $post__in ) ? $post__in_count = count( $post__in ) : '';

		// If $post__in exists, set $bootstrap_grid_col to $post__in_count, otherwise set it to 'posts_per_page'.
		$bootstrap_grid_col = ( $post__in ) ? $post__in_count : $instance['posts_per_page'];

		// If 'posts_per_page' is not set, default 4.
		$posts_per_page = ( $post__in_count ) ? $post__in_count : ( ( $instance['posts_per_page'] ) ? $instance['posts_per_page'] : POSTS_PER_PAGE_DEFAULT );

		// If 'post_type' is not set, default 'post'.
		$post_type = ( $instance['post_type'] ) ? $instance['post_type'] : POST_TYPE_DEFAULT;

		// Set bootstrap grid, divide 12 ( max bootstrap col size ) by 'posts_per_page'.
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
					<?php $image = vincentragosta_com\Twenty_Sixteen\Helpers\vr_get_featured_image( $post->ID ); ?>
					<div class="col-xs-12 <?php echo esc_attr( $class ); ?>">
						<div class="featured-image aspect-ratio-1x1">
							<div class="overlay flex-center">
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

		<!-- If the 'after_widget' field is set, display it. -->
		<?php echo ( isset( $args['after_widget'] ) ) ? $args['after_widget'] : '';
	}
}
