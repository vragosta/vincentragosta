<?php
/**
 * Template for displaying the featured projects page.
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since 0.1.0
 */

namespace VincentRagosta;

get_partial(
	'template-parts/project/list-projects',
	array(
		'projects' => get_projects(),
	)
);
