<?php

namespace VincentRagosta\PostTypes;

class ProjectPostTypeTest extends \WP_UnitTestCase {

	public $post_type;

	function setUp() {
		parent::setUp();
		$this->post_type = new ProjectPostType();
	}

	function test_it_has_a_name() {
		$actual = $this->post_type->get_name();
		$this->assertEquals( PROJECT_POST_TYPE, $actual );
	}

	function test_it_has_supported_taxonomies() {
		$actual = $this->post_type->get_supported_taxonomies();
		$this->assertNotEmpty( $actual );
	}
}
