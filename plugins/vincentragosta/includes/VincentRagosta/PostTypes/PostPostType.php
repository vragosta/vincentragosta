<?php

namespace VincentRagosta\PostTypes;

/**
 * CorePostType overrides the 'post' post type. Currently set to
 * defaults but could be used to add custom taxonomies.
 */
class PostPostType extends BasePostType {

	public function get_name() {
		return 'post';
	}

	public function get_supported_taxonomies() {
		return array(
			CATEGORY_TAXONOMY
		);
	}

	# override parent - since this is a Core Post Type
	public function register_post_type() {
		add_post_type_support( 'post', 'postmeta-fields' );
		remove_post_type_support( 'post', 'custom-fields' );
		// $post_type = get_post_type_object( $this->get_name() );
		// $post_type->show_ui = current_user_can( 'manage_posts' );
		// register_post_type(
		// 	$this->get_name(), (array) $post_type
		// );
	}
}
