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
			'name'               => __( 'Projects', 'vincentragosta_com' ),
			'singular_name'      => __( 'Project', 'vincentragosta_com' ),
			'menu_name'          => __( 'Projects', 'vincentragosta_com' ),
			'parent_item_colon'  => __( 'Parent Project:', 'vincentragosta_com' ),
			'all_items'          => __( 'All Projects', 'vincentragosta_com' ),
			'view_item'          => __( 'View Project', 'vincentragosta_com' ),
			'add_new_item'       => __( 'Add New Project', 'vincentragosta_com' ),
			'add_new'            => __( 'Add New', 'vincentragosta_com' ),
			'edit_item'          => __( 'Edit Project', 'vincentragosta_com' ),
			'update_item'        => __( 'Update Project', 'vincentragosta_com' ),
			'search_items'       => __( 'Search Projects', 'vincentragosta_com' ),
			'not_found'          => __( 'Not found', 'vincentragosta_com' ),
			'not_found_in_trash' => __( 'Not found in Trash', 'vincentragosta_com' )
		);
	}

	public function get_options() {
		return array(
			'labels'              => $this->get_labels(),
			'supports'            => $this->get_editor_support(),
			'hierarchical'        => false,
			'rewrite'             => array( 'slug' => 'projects', 'with_front' => false),
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
