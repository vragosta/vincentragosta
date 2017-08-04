<?php
/**
 * Template for displaying the front page.
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since 0.1.0
 * @uses get_template_part()
 */

namespace VincentRagosta;

get_header();

get_template_part( 'partials/aside-front-page-cta', 'A' );

get_template_part( 'partials/aside-front-page-cta', 'B' );

get_template_part( 'partials/aside-front-page-cta', 'C' );

# get_template_part( 'partials/aside-front-page-cta', 'D' );

get_template_part( 'partials/aside-front-page-cta', 'E' );

# get_template_part( 'partials/aside-front-page-cta', 'F' );

get_footer();
