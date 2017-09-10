<?php

namespace VincentRagosta\Tables;

/**
 * TableFactory is used to manage custom tables for StoryCorps Archive.
 * The table objects are created an cached here.
 */
class TableFactory {

	public $tables;

	/**
	 * Conditionally auto-upgrades tables using dbDelta. If the index
	 * option is specified it will attempt to index the custom tables as
	 * well.
	 *
	 * Note: You will need to drop the MySQL indexes if already present.
	 */
	public function upgrade( $table, $opts = array() ) {
		$table = $this->build( $table );
		$table->upgrade();

		if ( ! empty( $opts['index'] ) ) {
			$table->index();
		}
	}

	public function upgrade_all( $opts = array() ) {
		foreach ( $this->get_tables() as $table ) {
			$this->upgrade( $table, $opts );
		}
	}

	public function build ( $name ) {
		switch ( $name ) {
			case 'user_relationships':
				return new UserRelationship();

			case 'user_objects':
				return new UserObject();

			case 'post_objects':
				return new PostObject();
		}
	}

	function get_tables() {
		return array(
			'user_relationships',
			'user_objects',
			'post_objects',
		);
	}

}
