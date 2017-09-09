<?php

namespace VincentRagosta;

use VincentRagosta\Admin\MetaBoxes\ProjectMetaBox;
use VincentRagosta\Admin\MetaBoxes\PostMetaFieldsMetaBox;
use VincentRagosta\Admin\MetaBoxes\UserMetaBox;
use VincentRagosta\Endpoints\Contact;
use VincentRagosta\Finders\ProjectFinder;
use VincentRagosta\PostTypes\PostTypeFactory;
use VincentRagosta\Taxonomies\TaxonomyFactory;

/**
 * Plugin is the main entry point into the Vincent Ragosta plugin
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

	public function enable() {
		add_action( 'init', array( $this, 'init' ) );
		add_action( 'admin_init', array( $this, 'init_admin' ) );
	}

	/**
	 * Instantiates objects and activates various parts of the
	 * Vincent Ragosta plugin.
	 *
	 * There is an implicit order of declaration here. For instance
	 * Taxonomies must be registered before the Post Types etc.
	 */
	function init() {
		$this->taxonomy_factory = new TaxonomyFactory();
		$this->taxonomy_factory->build_all();

		$this->post_type_factory = new PostTypeFactory();
		$this->post_type_factory->build_all();

		# Add json endpoint register endpoints here.
		$contact_api = new Contact();
		$contact_api->register();
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

	function get_project_finder( $post_id ) {
		return new ProjectFinder( $post_id );
	}
}
