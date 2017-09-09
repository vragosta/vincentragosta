<?php

namespace VincentRagosta\Admin;
use VincentRagosta\Finders\ProjectFinder;

class ProjectColumnsSupport {

	public function register() {
		add_filter( 'manage_project_posts_columns', array( $this, 'project_table_head' ) );
		add_action( 'manage_project_posts_custom_column', array( $this, 'project_table_content' ), 10, 2 );
	}

	function project_table_head( $defaults ) {
		unset( $defaults['categories'] );
		unset( $defaults['comments'] );

		$defaults['project_id']  = __( 'Project ID', 'vincentragosta_com' );

		return $defaults;
	}

	function project_table_content( $column_name, $post_id ) {
		$finder = new ProjectFinder( $post_id );

		switch ( $column_name ) {
			case 'project_id':
				$project_id = $finder->get_post_id();

				if ( $project_id ) {
					printf( '<a href="%s">%s</a><br>', get_edit_post_link( intval( $project_id ) ), $project_id );
				} else {
					echo 'None';
				}
				break;
		}
	}
}
