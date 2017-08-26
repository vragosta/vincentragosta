<?php

namespace VincentRagosta;

function get_project_finder( $post_id ) {
	return get_plugin()->get_project_finder( $post_id );
}

function get_project_technology( $post_id ) {
	return get_project_finder( $post_id )->get_technology();
}

function get_project_testimony( $post_id ) {
	return get_project_finder( $post_id )->get_testimony();
}

function get_project_link( $post_id ) {
	return get_project_finder( $post_id )->get_link();
}

function get_project_text( $post_id ) {
	return get_project_finder( $post_id )->get_text();
}

function get_projects() {
	$paged = get_query_var( 'paged' );

	$args = array(
		'post_type' => 'project',
		'paged'     => $paged
	);

	return new \WP_Query( $args );
}
