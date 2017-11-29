<?php

namespace VincentRagosta\Admin;

class AdminSupport {

	function register() {
		$this->show_admin_bar();
	}

	function show_admin_bar() {
		if ( defined( 'SHOW_ADMIN_BAR' ) && ! SHOW_ADMIN_BAR ) {
			show_admin_bar( false );
		}
	}

}
