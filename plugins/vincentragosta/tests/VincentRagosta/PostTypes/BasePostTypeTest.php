<?php

namespace VincentRagosta\PostTypes;

class BasePostTypeTest extends \WP_UnitTestCase {

	public $post_type;

	function setUp() {
		parent::setUp();
		$this->post_type = new BasePostType();
	}

	function test_it_has_a_name() {
		$actual = $this->post_type->get_name();
		$this->assertEquals( 'base_post_type', $actual );
	}

	function test_it_has_post_type_options() {
		$actual = $this->post_type->get_options();
		$this->assertNotNull( $actual );
	}

	function test_it_has_list_of_supported_taxonomies() {
		$actual = $this->post_type->get_supported_taxonomies();
		$this->assertContains( CATEGORY_TAXONOMY, $actual );
	}

	function test_it_allows_overriding_supported_taxonomies() {
		add_filter( 'base_post_type_taxonomies', function( $taxonomies ) {
			$taxonomies[] = 'foo';
			return $taxonomies;
		} );

		$actual = $this->post_type->get_taxonomies();
		$this->assertContains( CATEGORY_TAXONOMY, $actual );
		$this->assertContains( 'foo', $actual );
	}

	function test_it_can_register_post_type() {
		$this->post_type = new BaseOnePostType();
		$this->post_type->register();
		$this->assertTrue( post_type_exists( 'base_one' ) );
		$taxonomies = get_object_taxonomies( 'base_one' );
		$this->assertEquals( array( 'post_tag' ), $taxonomies );
	}
}

class BaseOnePostType extends BasePostType {
	public function get_name() {
		return 'base_one';
	}

	public function get_supported_taxonomies() {
		return array(
			'post_tag'
		);
	}
}
