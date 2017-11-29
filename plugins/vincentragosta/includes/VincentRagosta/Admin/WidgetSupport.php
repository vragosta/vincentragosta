<?php

namespace VincentRagosta\Admin;

class WidgetSupport {

	function register() {
		$this->remove_auto_p();
	}

	function remove_auto_p() {
		remove_filter( 'widget_text_content', 'wpautop' );
	}

}
