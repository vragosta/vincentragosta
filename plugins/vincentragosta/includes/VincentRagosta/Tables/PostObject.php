<?php

namespace VincentRagosta\Tables;

/**
 * The PostObject custom table (wp_post_objects) is used to store post to object
 * relationships. The object here is a custom post type. The
 * only requirement is that the combination of post_id, object_id and
 * rel_type must be unique.
 *
 * A Unique Index is created to enforce this.
 *
 * This table also contains a few additional indices that help speed up
 * specific queries.
 */
class PostObject extends BaseTable {

	function get_schema_version() {
		return '0.1.0';
	}

	function get_table_name() {
		return 'post_objects';
	}

	function get_schema() {
		$table_name = $this->get_full_table_name();

		$sql = <<<SQL
			CREATE TABLE {$table_name} (
				post_id       bigint(20)   unsigned not null,
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
			 * Eg:- Check if post is a part of a community.
			 *
			 * post_id=1 and object_id=5 and type=community
			 */
			'object_with_type' => 'UNIQUE KEY object_with_type (post_id, object_id, rel_type)',

			/*
			 * Find by post & type
			 *
			 * Eg:- Find all communities of a post
			 *
			 * post_id=1 and type=community
			 */
			'by_object_and_type' => 'KEY by_post_and_type (user_id, rel_type)',
		);
	}

}
