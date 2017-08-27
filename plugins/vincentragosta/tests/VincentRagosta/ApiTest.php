<?php

namespace VincentRagosta;

class ApiTest extends \WP_UnitTestCase {

	function setUp() {
		parent::setUp();
	}

	function test_it_has_a_plugin() {
		$actual = get_plugin();
		$this->assertInstanceOf(
			'VincentRagosta\Plugin',
			$actual
		);
	}
}
