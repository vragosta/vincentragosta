<?php

namespace VincentRagosta\PostTypes;

class PostPostTypeTest extends \WP_UnitTestCase {

	public $post_type;

	function setUp() {
		parent::setUp();
		$this->post_type = new PostPostType();
	}

	function test_it_has_a_name() {
		$actual = $this->post_type->get_name();
		$this->assertEquals( 'post', $actual );
	}

	function test_it_has_supported_taxonomies() {
		$actual = $this->post_type->get_supported_taxonomies();
		$this->assertContains( CATEGORY_TAXONOMY, $actual );
	}
}
