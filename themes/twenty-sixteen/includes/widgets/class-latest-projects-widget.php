<?php
/**
 * Builds custom Latest Projects Widget
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
class Latest_Projects_Widget extends WP_Widget {
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'latest_projects',
			__( 'Latest Projects', 'vincentragosta' ),
			array( 'description' => __( 'A custom widget for Vincent Ragosta latest projects.', 'vincentragosta' ), )
		);
	}
	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
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

		$args = array(
			'post_type'      => array( 'projects' ),
			'posts_per_page' => 3
		);

		// $args['post_type'] = array( 'projects' );
		// $args['post__not_in'] = array( $post->ID );

		// if ( $instance['ids'] ) {
		// 	$ids = explode( ',', $instance['ids'] );
		// 	$ids = array_map( 'trim', $ids );
		// 	$args['post__in'] = $ids;
		// } elseif ( $instance['categories'] ) {
		// 	$args['tax_query'] = array();
		// 	$categories        = array();
		// 	foreach ( $instance['categories'] as $term ) {
		// 		$term = explode( '-', $term );
		// 		$categories[ $term[0] ][] = $term[1];
		// 	}

			// if ( $categories ) {
			// 	foreach ( $categories as $taxonomy => $term_id ) {
			// 		$args['tax_query'][] = array(
			// 			'taxonomy' => $taxonomy,
			// 			'field'    => 'term_id',
			// 			'terms'    => $term_id,
			// 		);
			// 	}
			// }
		// }

		// $args['posts_per_page'] = 3;

		// $args['posts_per_page'] = $instance['posts_per_page'] ? absint( $instance['posts_per_page'] ) : 3;

		$query = new WP_Query( $args );

		if ( $query->have_posts() ) :
			while ( $query->have_posts() ) : $query->the_post();

			echo $post->post_title;

			endwhile;
			wp_reset_postdata();
		endif;

		echo ( isset( $args['after_widget'] ) ) ? $args['after_widget'] : '';
	}



	// 	if ( $query->have_posts() ) :
	// 		echo '<ul class="widget-content">';
	// 		while ( $query->have_posts() ) : $query->the_post();
	// 			echo sprintf( '<li class="%s">', implode( ' ', get_post_class( $post->ID ) ) );
	// 				if ( has_post_thumbnail() && get_post_meta($post->ID,'widget_featured_image',true)=='Landscape' && get_post_meta($post->ID,'widget_featured_image',true)!='None') {
	// 					echo sprintf( '<a href="%1$s" title="%2$s">', esc_url( get_the_permalink( $post->ID ) ), esc_attr( get_the_title( $post->ID ) ) );
	// 					the_post_thumbnail();
	// 					echo '</a>';
	// 				} else if ( storycorps_get_portrait_image( $post->ID ) && get_post_meta($post->ID,'widget_featured_image',true)=='Portrait'  && get_post_meta($post->ID,'widget_featured_image',true)!='None') {
	// 					echo sprintf( '<a href="%1$s" title="%2$s">', esc_url( get_the_permalink( $post->ID ) ), esc_attr( get_the_title( $post->ID ) ) );
	// 					echo sprintf( '<img src="%1$s" title="%2$s" style="height:auto">', esc_url( storycorps_get_portrait_image( $post->ID ) ), esc_url( get_the_title( $post->ID ) ) );
	// 					echo '</a>';
	// 				}
	// 			echo sprintf( '<div data-event ="Sidebar" data-label="entry content %1$s" class="entry-content">', esc_url( get_the_permalink( $post->ID ) ) );
	// 				the_title( sprintf( '<h2><a href="%1$s" >', esc_url( get_the_permalink( $post->ID ) ) ), '</a></h2>' );
	// 				the_excerpt();
	// 				$terms = get_the_terms( $post->ID, 'category' );
	// 				if ( ! empty( $terms ) ) {
	// 					$term = array_pop( $terms );
	// 					$term_link = get_term_link( $term->term_id, 'category' );
	// 					if ( $term_link ) {
	// 						echo sprintf( '<a href="%1$s" title="%2$s">%2$s <i class="fa fa-chevron-right"></i></a>', esc_url( $term_link ), esc_html( $term->name ) );
	// 					}
	// 				}
	// 			echo '</div>';
	// 			echo '</li>';
	// 		endwhile;
	// 		echo '</ul>';
	// 	endif;
	// 	wp_reset_postdata();
	// 	$after_widget = isset( $args['after_widget'] ) ? $args['after_widget'] : '';
	// 	echo $after_widget;
	// }

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ( ! empty( $instance['title'] ) )          ? $instance['title']          : '';
		// $posts_per_page = ( ! empty( $instance['posts_per_page'] ) ) ? $instance['posts_per_page'] : 3; ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html( __( 'Title:', 'vincentragosta' ) ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<!-- <p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'posts_per_page' ) ); ?>"><?php echo esc_html( __( 'Posts per page:', 'vincentragosta' ) ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'posts_per_page' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'posts_per_page' ) ); ?>" type="text" value="<?php echo esc_attr( $posts_per_page ); ?>">
		</p> -->
		<?php
	}
	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance          = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) )          ? strip_tags( $new_instance['title'] )      : '';
		// $instance['posts_per_page'] = ( ! empty( $new_instance['posts_per_page'] ) ) ? absint( $new_instance['posts_per_page'] ) : '';
		return $instance;
	}
}
