<?php
/**
 * Template for displaying the single page.
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since 0.1.0
 * @uses get_partial()
 */

namespace VincentRagosta;

get_partial(
	'template-parts/project-details',
	array(
		'technology' => get_project_technology( $post->ID ),
		'testimony' => get_project_testimony( $post->ID ),
		'link' => get_project_link( $post->ID ),
		'text' => get_project_text( $post->ID ),
	)
);
