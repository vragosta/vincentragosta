<?php

namespace VincentRagosta;

// use StoryCorps\PostTypes\PostTypeFactory;
// use StoryCorps\Admin\MetaBoxes\ProjectMetaBox;
// use StoryCorps\Admin\MetaBoxes\PostMetaFieldsMetaBox;
// use StoryCorps\Admin\MetaBoxes\UserMetaBox;

/**
 * Plugin is the main entry point into the StoryCorps Archive plugin
 * architecture. This class does not strictly enforce singleton pattern
 * for easier testing. But should be used as a singleton elsewhere.
 *
 * Usage:
 *
 * $plugin = Plugin::get_instance();
 * $plugin->enable();
 *
 * The plugin object holds various objects and dependencies instance of
 * global variables.
 */
class Plugin {
	static public $instance;

	static public function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new Plugin();
		}
		return self::$instance;
	}

	public $post_type_factory;
	public $project_finder;

	public function enable() {
		add_action( 'init', array( $this, 'init' ) );
		add_action( 'admin_init', array( $this, 'init_admin' ) );
		add_filter( 'mime_types', array( $this, 'update_mime_types' ) );

		# Add json endpoint register endpoints here.
	}

	/**
	 * Instantiates objects and activates various parts of the
	 * StoryCorps archive plugin.
	 *
	 * There is an implicit order of declaration here. For instance
	 * Taxonomies must be registered before the Post Types etc.
	 */
	function init() {
		$this->post_type_factory = new PostTypeFactory();
		$this->post_type_factory->build_all();
	}

	/**
	 * Sets up the various metaboxes and admin customizations.
	 */
	function init_admin() {
		$project_meta_box = new ProjectMetaBox();
		$project_meta_box->register();

		$postmeta_meta_box = new PostMetaFieldsMetaBox();
		$postmeta_meta_box->register();

		$user_meta_box = new UserMetaBox();
		$user_meta_box->register();
	}
}
