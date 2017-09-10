<?php

namespace VincentRagosta\Tables;

/**
 * The UserRelationship custom table is used for store user to user
 * relationship associations. The user to follower relationship is
 * unique and is enforce with a Unique Key.
 *
 * This table also has a few extra indices for speeding up specific
 * queries.
 */
class UserRelationship extends BaseTable {

	function get_schema_version() {
		return '0.4.0';
	}

	function get_table_name() {
		return 'user_relationships';
	}

	function get_schema() {
		$table_name = $this->get_full_table_name();

		$sql = <<<SQL
			CREATE TABLE {$table_name} (
				user_id       bigint(20)   unsigned not null,
				follower_id   bigint(20)   unsigned not null,
				created_on    datetime     not null,
				updated_on    datetime     not null,
				meta          text         null
			);
SQL;

		return $sql;
	}

	/*
	 * 1) Find unique
	 *
	 * Eg:- Find if user A follows user B
	 *
	 * where user_id=B and follower_id=A
	 *
	 * 2) Find all followers of a single user
	 *
	 * where user_id=<user_id>
	 *
	 * 3) Find all users that a single user is following
	 *
	 * where follower_id=<user_id>
	 */
	// function get_index_schema() {
	// 	return array(
	// 		'users_followers' => 'UNIQUE KEY users_followers (user_id, follower_id)',
	// 		'by_user'         => 'KEY by_user (user_id)',
	// 		'by_follower'     => 'KEY by_follower (follower_id)',
	// 	);
	// }

}
