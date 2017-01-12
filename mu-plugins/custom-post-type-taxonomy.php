<?php
/**
 * Plugin Name: Custom Post Type/Taxonomy
 * Description: Enables custom post types and taxonomies
 * Version: 0.1.0
 * Author: Vincent Ragosta
 * Author URI: http://www.vincentragosta.com
 */

/* Projects Post Type */
function register_post_type_project() {
	register_post_type( 'project', array(
			'label' => 'Project',
			'description' => '',
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'capability_type' => 'post',
			'map_meta_cap' => true,
			'hierarchical' => false,
			'rewrite' => array( 'slug' => 'projects', 'with_front' => false),
			'query_var' => true,
			'has_archive' => true,
			'menu_position' => 41,
			'menu_icon' => 'dashicons-feedback',
			'supports' => array( 'title', 'editor', 'excerpt', 'custom-fields', 'revisions', 'thumbnail', 'author' ),
			'labels' => array (
					'name' => 'Projects',
					'singular_name' => 'Project',
					'menu_name' => 'Projects',
					'add_new' => 'Add Project',
					'add_new_item' => 'Add New Project',
					'edit' => 'Edit',
					'edit_item' => 'Edit Project',
					'new_item' => 'New Project',
					'view' => 'View Project',
					'view_item' => 'View Project',
					'search_items' => 'Search Projects',
					'not_found' => 'No Projects Found',
					'not_found_in_trash' => 'No Projects Found in Trash',
					'parent' => 'Parent Project',
			)
		)
	);
}
add_action( 'init', 'register_post_type_project' );
