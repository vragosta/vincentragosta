<?php

namespace VincentRagosta\PostTypes;

/**
 * ProjectPostType is a custom post type object for storing projects
 * in WordPress.
 */
class ProjectPostType extends BasePostType {

	public function get_name() {
		return PROJECT_POST_TYPE;
	}

	public function get_labels() {
		return array(
			'name'               => __( 'Projects', 'listen' ),
			'singular_name'      => __( 'Project', 'listen' ),
			'menu_name'          => __( 'Projects', 'listen' ),
			'parent_item_colon'  => __( 'Parent Project:', 'listen' ),
			'all_items'          => __( 'All Projects', 'listen' ),
			'view_item'          => __( 'View Project', 'listen' ),
			'add_new_item'       => __( 'Add New Project', 'listen' ),
			'add_new'            => __( 'Add New', 'listen' ),
			'edit_item'          => __( 'Edit Project', 'listen' ),
			'update_item'        => __( 'Update Project', 'listen' ),
			'search_items'       => __( 'Search Projects', 'listen' ),
			'not_found'          => __( 'Not found', 'listen' ),
			'not_found_in_trash' => __( 'Not found in Trash', 'listen' )
		);
	}

	public function get_options() {
		return array(
			'labels'              => $this->get_labels(),
			'supports'            => $this->get_editor_support(),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_icon'           => 'dashicons-feedback',
			'menu_position'       => 26,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'map_meta_cap'        => true,
		);
	}

	public function get_editor_support() {
		return array(
			'title',
			'editor',
			'author',
			'thumbnail',
			'excerpt',
			'comments',
			'postmeta-fields',
		);
	}

	public function get_supported_taxonomies() {
		return array(
			CATEGORY_TAXONOMY,
		);
	}
}
