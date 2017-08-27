<?php

namespace VincentRagosta;

class PartialTest extends \WP_UnitTestCase {

	function setUp() {
		parent::setUp();
	}

	function test_it_can_get_partial_opts() {
		$found_opts = array();

		$opts = array(
			'a' => 1,
			'b' => 2,
		);

		add_action( 'get_template_part_foo', function( $slug, $name = null ) use ( &$found_opts ) {
			$found_opts = get_partial_opts();
		} );

		get_partial( 'foo', $opts );
		$this->assertEquals( $opts, $found_opts );
	}
}
