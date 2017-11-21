<?php
/**
 * Builds 'News & Updates' Widget.
 *
 * @package Image Captions - Twenty Sixteen
 * @since 0.1.0
 */

# Blocking direct access to this file.
defined( 'ABSPATH' ) || exit;

# Set widget specific defines.
define( 'BOOTSTRAP_GRID_COL_MAX', 12 );
define( 'POSTS_PER_PAGE', 3 );
define( 'POST_TYPE', 'post' );

/**
 * Returns the latest three posts of the custom post type entered.
 *
 * @since 0.1.0
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
	 * @param array $instance previously saved values from database.
	 * @uses empty(), __(), get_field_id(), esc_attr()
	 * @return void
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$post_type = ! empty( $instance['post_type'] ) ? $instance['post_type'] : '';
		$ids = ! empty( $instance['ids'] ) ? $instance['ids'] : ''; ?>

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
			<label class="description" for="<?php echo esc_attr( $this->get_field_id( 'ids' ) ); ?>">Please separate with a comma.</label><br />
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'ids' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'ids' ) ); ?>" type="text" value="<?php echo esc_attr( $ids ); ?>">
		</p><?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @param array $new_instance values just sent to be saved.
	 * @param array $old_instance previously saved values from database.
	 * @uses empty(), explode(), str_replace(), count(), do_shortcode(), wp_reset_postdata()
	 * @return array $instance updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['post_type'] = ( ! empty( $new_instance['post_type'] ) ) ? sanitize_text_field( $new_instance['post_type'] ) : '';
		$instance['ids'] = ( ! empty( $new_instance['ids'] ) ) ? sanitize_text_field( $new_instance['ids'] ) : '';

		return $instance;
	}

	/**
	 * Front-end display of widget.
	 * NOTE: Styles associated with this function go in vincentragosta---twenty-sixteen.css.
	 *
	 * @param array $args widget arguments.
	 * @param array $instance saved values from database.
	 * @return void
	 */
	public function widget( $args, $instance ) {

		# Define global variables.
		global $post;

		# If the 'before_widget' field is set, display it.
		echo $args['before_widget'];

		# If the 'title' field of the widget is not empty, display it.
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		# If 'ids' exists, remove all spaces from the string, and explode the string by the delimeter ','.
		if ( $instance['ids'] ) {
			$post__in = explode( ',', str_replace( ' ', '', $instance['ids'] ) );
		}

		# If $post__in exists, create the $post__in_count based off the size of the exploded 'ids' array.
		if ( $post__in ) {
			$post__in_count = count( $post__in );
		}

		# If $post__in exists, set $bootstrap_grid_col to $post__in_count, otherwise set it to 3.
		$bootstrap_grid_col = ( $post__in_count ) ? $post__in_count : POSTS_PER_PAGE;

		# If 'posts_per_page' is not set, default 3.
		$posts_per_page = ( $post__in_count ) ? $post__in_count : POSTS_PER_PAGE;

		# If 'post_type' is not set, default 'post'.
		$post_type = ( $instance['post_type'] ) ? $instance['post_type'] : POST_TYPE;

		# Set bootstrap grid, divide 12 ( max bootstrap col size ) by the value of $bootstrap_grid_col.
		$bootstrap_class = 'col-sm-' . ( BOOTSTRAP_GRID_COL_MAX / $bootstrap_grid_col );

		# Set the href for the button.
		$button_href = ( $instance['post_type'] !== 'post' ) ? home_url( '/projects/' ) : home_url( '/blog/' ) ;

		# Create arguments array for query.
		$args = array(
			'post_type' => $post_type,
			'posts_per_page' => $posts_per_page,
			'post__in' => $post__in
		);

		# Initialize query.
		$query = new WP_Query( $args ); ?>

		<div id="news-and-updates" class="custom-widget">
			<div class="row">
				<?php if ( $query->have_posts() ) { ?>
					<?php while ( $query->have_posts() ) { ?>
						<?php $query->the_post(); ?>
						<div class="col-xs-12 <?php echo esc_attr( $bootstrap_class ); ?> <?php echo $query->post_count === 1 ? 'marginally-center' : ''; ?>">

							<!-- Featured image overlay -->
							<?php do_shortcode( '[image-caption id="' . $post->ID . '"]' ); ?>

						</div>
					<?php } ?>
					<?php wp_reset_postdata(); ?>
				<?php } ?>
			</div>

			<div>
				<a href="<?php echo $button_href; ?>">View more <?php echo esc_html( $instance['post_type'] ); ?>s</a>
			</div>
		</div>

		<!-- If the 'after_widget' field is set, display it. -->
		<?php echo $args['after_widget'];
	}
}
