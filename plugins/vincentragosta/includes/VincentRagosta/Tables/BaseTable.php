<?php

namespace VincentRagosta\Tables;

/**
 * BaseTable is the base class for all VincentRagosta Custom Tables. It
 * provides a way to declare the table schema and automatically upgrade
 * it in WordPress.
 *
 * The auto-upgrade is tied to the schema version. Whenever any changes
 * are made to the schema in the get_schema method, the version number
 * in get_schema_version should be bumped. This will auto-upgrade the
 * Table in MySQL.
 *
 * Helper functions are provided to declaratively build the SQL but are
 * optional.
 *
 * This functionality is powered by the dbDelta Core function. All
 * limitations of this function should be kept in mind while adding
 * columns to the schema.
 *
 * The dbDelta function has a limitation with indexing Tables without a
 * auto incrementing primary key. For tables with such composite keys
 * the index must be specified outside the main table schema.
 *
 * Usage: To add a custom table, wp_foo use,
 *
 * class FooTable extends BaseTable {
 *
 *    public function get_version() {
 *        return '0.1.0';
 *    }
 *
 *    public function get_table_name() {
 *        return 'foo';
 *    }
 *
 *    public function get_schema() {
 *        return 'sql here';
 *    }
 *
 * }
 *
 * $table = new FooTable();
 * $table->upgrade();
 */
class BaseTable {

	public $columns          = array();
	public $keys             = array();
	public $primary_key_name = null;
	public $unique_key_name  = null;
	public $did_schema       = false;

	/**
	 * The default schema version. This must be bumped to force an
	 * auto-upgrade.
	 */
	function get_schema_version() {
		return '0.1.0';
	}

	/**
	 * Returns the SQL Schema for the custom table. Should be overriden
	 * by sub classes.
	 */
	function get_schema() {
		$table_name = $this->get_table_name();
		$sql  = "CREATE TABLE $table_name (\n";
		$sql .= $this->col( 'table_id', 'int', 'not null' );
		$sql .= $this->col( 'a', 'varchar(10)', 'not null' );
		$sql .= $this->col( 'b', 'decimal(2)', 'not null' );
		$sql .= $this->col( 'c', 'text', 'not null' );
		$sql .= $this->primary_key( 'table_id' );
		$sql .= ");\n";

		return $sql;
	}

	/**
	 * Return the name of the table without the prefix.
	 */
	function get_table_name() {
		return 'base_table';
	}

	function get_installed_schema_version() {
		return get_option( $this->get_schema_option_name() );
	}

	function get_schema_option_name() {
		return $this->get_table_name() . '_schema_version';
	}

	function can_upgrade() {
		return version_compare(
			$this->get_schema_version(),
			$this->get_installed_schema_version(),
			'>'
		);
	}

	/**
	 * Upgrades the Table using dbDelta.
	 */
	function upgrade( $fresh = false ) {
		if ( $this->can_upgrade() || $fresh ) {
			$sql = $this->get_schema();

			require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
			$this->db_delta( $sql );

			update_option(
				$this->get_schema_option_name(),
				$this->get_schema_version()
			);

			//error_log( 'Updated Table: ' . $this->get_table_name() );
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Indexes the Table based on the schema provided.
	 */
	function index() {
		$table_name = $this->get_full_table_name();
		$schema     = $this->get_index_schema();

		if ( ! empty( $schema ) ) {
			foreach ( $schema as $name => $sql ) {
				if ( ! $this->has_index( $name ) ) {
					$sql = "ALTER TABLE $table_name ADD $sql;";
					$db = $this->get_db();
					$db->query( $sql );
				}
			}
		}
	}

	function has_index( $index_name ) {
		$table_name = $this->get_full_table_name();
		$db = $this->get_db();
		$sql = <<<SQL
			SELECT count(*) FROM information_schema.statistics
			WHERE table_schema = %s
			AND table_name = %s
			AND index_name = %s
SQL;

		$sql = $db->prepare(
			$sql, DB_NAME, $table_name, $index_name
		);

		$result = $db->get_var( $sql );

		return ! empty( $result );
	}

	function db_delta( $sql ) {
		global $wpdb;

		$old_db = $wpdb;
		$wpdb   = $this->get_db();
		dbDelta( $sql );

		$wpdb   = $old_db;
	}

	function drop() {
		$db         = $this->get_db();
		$table_name = $this->get_table_name();
		$sql        = "Drop Table If Exists $table_name;";

		$db->query( $sql );

		delete_option( $this->get_schema_option_name() );
	}

	function parse_type( $type ) {
		$index = strpos( $type, '(' );

		if ( $index !== false ) {
			$main_type = substr( $type, 0, $index );
		} else {
			$main_type = $type;
		}

		switch ( $main_type ) {
			case 'int':
			case 'mediumint':
			case 'longint':
			case 'tinyint':
			case 'smallint':
				return 'integer';

			case 'decimal':
			case 'float':
				return 'float';

			case 'varchar':
			case 'tinytext':
			case 'text':
				return 'string';

			default:
				return $main_type;
		}
	}

	function has_column( $name ) {
		$this->build();
		return array_key_exists( $name, $this->columns );
	}

	function get_column_type( $name, $native = false ) {
		$this->build();

		if ( array_key_exists( $name, $this->columns ) ) {
			$column = $this->columns[ $name ];

			if ( $native ) {
				return $column['type'];
			} else {
				return $column['php_type'];
			}
		} else {
			throw new \Exception(
				"Unknown Column $name in Table " . $this->get_table_name()
			);
		}
	}

	function build() {
		if ( ! $this->did_schema ) {
			$this->get_schema();
			$this->did_schema = true;
		}
	}

	function get_db() {
		global $wpdb;
		return $wpdb;
	}

	function get_table_prefix() {
		$db = $this->get_db();
		return $db->prefix;
	}

	function get_full_table_name() {
		return $this->get_table_prefix() . $this->get_table_name();
	}

}
