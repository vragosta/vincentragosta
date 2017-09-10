<?php

namespace VincentRagosta\Tables;

/**
 * The UserObject custom table(wp_user_objects) is used to store user to object
 * relationships. The object here can be a post type or a taxonomy. The
 * only requirement is that the combination of user_id, object_id and
 * rel_type must be unique.
 *
 * A Unique Index is created to enforce this.
 *
 * This table also contains a few additional indices that help speed up
 * specific queries.
 */
class UserObject extends BaseTable {

	function get_schema_version() {
		return '0.3.0';
	}

	function get_table_name() {
		return 'user_objects';
	}

	function get_schema() {
		$table_name = $this->get_full_table_name();

		$sql = <<<SQL
			CREATE TABLE {$table_name} (
				user_id       bigint(20)   unsigned not null,
				object_id       bigint(20)   unsigned not null,
				rel_type      varchar(20)  not null,
				created_on    datetime     not null,
				updated_on    datetime     not null,
				meta          text         null
			);
SQL;

		return $sql;
	}

	function get_index_schema() {
		return array(
			/*
			 * Find unique object
			 *
			 * Eg:- Check if user has favorited an interview
			 *
			 * user_id=1 and object_id=5 and type=favorite
			 */
			'user_object_with_type' => 'UNIQUE KEY user_object_with_type (user_id, object_id, rel_type)',

			/*
			 * Find by user & type
			 *
			 * Eg:- Find all favorites of a user
			 *
			 * user_id=1 and type=favorite
			 */
			'by_user_and_type' => 'KEY by_user_and_type (user_id, rel_type)',

			/*
			 * Find by post & type
			 *
			 * Eg:- Find all Users who have favorited an interview
			 *
			 * object_id=1 and type=favorite
			 */
			'by_object_and_type' => 'KEY by_post_and_type (object_id, rel_type)',
		);
	}

}
