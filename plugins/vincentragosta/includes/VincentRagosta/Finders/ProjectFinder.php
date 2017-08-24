<?php

namespace VincentRagosta\Finders;

/**
 * ProjectFinder is a central place to find and filter projects in the theme.
 * API Helpers are provider in the \VincentRagosta namespace to commonly
 * used methods below.
 *
 * Usage:
 *
 * $finder = new ProjectFinder();
 * $finder->get_foo();
 */
class ProjectFinder {

	public $post_id;
	public $post;

	public function __construct( $post_id ) {
		$this->post_id = $post_id;
	}

	public function get_post_id() {
		return $this->post_id;
	}

	public function get_post() {
		if ( is_null( $this->post ) ) {
			$this->post = get_post( $this->post_id );
		}

		return $this->post;
	}

	public function get_technology() {
		return get_post_meta( $this->post_id, '_technology', true );
	}

	public function get_testimony() {
		return get_post_meta( $this->post_id, '_testimony', true );
	}

	public function get_link() {
		return get_post_meta( $this->post_id, '_project_link', true );
	}

	public function get_text() {
		return get_post_meta( $this->post_id, '_project_text', true );
	}

}
