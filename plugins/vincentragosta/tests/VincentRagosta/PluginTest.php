<?php

namespace VincentRagosta;

class PluginTest extends \WP_UnitTestCase {

	public $plugin;

	function setUp() {
		$this->plugin = new Plugin();
	}

	function test_it_can_be_created() {
		$this->assertInstanceOf(
			'VincentRagosta\Plugin', $this->plugin
		);
	}

	function test_it_is_a_singleton() {
		$instance1 = Plugin::get_instance();
		$instance2 = Plugin::get_instance();
		$this->assertSame( $instance1, $instance2 );
	}
}
